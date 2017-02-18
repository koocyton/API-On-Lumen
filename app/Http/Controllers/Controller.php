<?php

namespace App\Http\Controllers;

use App\Helper\SecurityHelper;
use App\Model\Manager;
use App\Model\Task;
use App\Model\OperationRecord;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

define("NOW_TIME", time());

class Controller extends BaseController
{
    protected $locale = "cn";

    // i18n 类
    public $trans = null;

    // 定义用户信息
    public $login_user_id = null;
    public $login_user_name = null;
    public $login_account = null;

    // 構造函數
    public function __construct(Request $request)
    {
        // 设置本地语言
        $this->setLocale($request);
        // 生成重定向...
        $this->beforeFilter($request);
        // 保存操作记录
        // $this->saveOperationRecord($request);
    }

    // 自定义 beforeFielter
    protected function beforeFilter($request)
    {
        // 校验 Authorization
        $this->checkAuthorization($request);

        // 如果不是 Ajax 请求, 输出完整页面
        $ajax_request = $request->header('X-Requested-With');
        if (empty($ajax_request)) {
            $task_count = Task::count();
            echo view('__portal', ['trans' => $this->trans, 'user' => $this->login_user_name, 'task_count'=>$task_count])->render();
            exit();
        }
    }

    // 验证 Authorization
    protected function checkAuthorization($request)
    {
        // 如果 Cookie 不存在，跳转
        $authorization = $request->cookie('Authorization');
        if (empty($authorization)) {
            echo "<script>window.location='/login';</script>";
            exit();
        }
        // 获取 Token
        $token = SecurityHelper::getAuthorizationToken($authorization);
        if (empty($token)) {
            echo "<script>window.location='/login/signout';</script>";
            exit();
        }
        // 获取用户
        $manager = Manager::where(['token' => $token])->first();
        if (empty($manager) || empty($manager->token_secret)) {
            echo "<script>window.location='/login/signout';</script>";
            exit();
        }

        // 用户信息
        $this->login_user_id = $manager->id;
        $this->login_user_name = $manager->username;
        $this->login_account = $manager->account;

        // 校验 Authorization
        $consumer_secret = env('BND_APP_ID');
        $token_secret = $manager->token_secret;
        if (!SecurityHelper::checkAuthorization($authorization, $token_secret, $consumer_secret, "/.*", "GET POST")) {
            echo "<script>window.location='/login/signout';</script>";
            exit();
        }
        // 校验 Authorization 的时间，不能超一周
        if (SecurityHelper::getAuthorizationTime($authorization) < time() - 604800) {
            echo "<script>window.location='/login/signout';</script>";
            exit();
        }
        return true;
    }

    // 记录操作日志
    private function saveOperationRecord($request)
    {
        // 忽略查看日志的操作
        if ($request->path() != "manager/operation-list") {
            $opteration = [
                'manager_id' => $this->login_user_id,
                'manager_name' => $this->login_account,
                'created_at' => time(),
                'request_method' => $request->method(),
                'request_uri' => $request->path(),
                'post_data' => ($request->method() == "POST") ? json_encode($_POST) : "",
            ];
            OperationRecord::create($opteration);
        }
    }

    // 将多语言带入
    protected function display($template, array $assign = [])
    {
        // 多语言
        $assign['trans'] = $this->trans;
        // 输出模板
        return response(view($template, $assign));
    }

    // 设置本地语言
    protected function setLocale($request)
    {
        // 从 Cookie 获取本地化设置
        if (!empty($request->cookie('locale'))) {
            $this->locale = $request->cookie('locale');
        }
        // 从 Get 获取本地化设置
        if (!empty($_GET["locale"])) {
            $this->locale = $_GET["locale"];
        }
        // 修正
        $this->locale = in_array($this->locale, ["en", "jp", "kr", "tw", "cn"]) ? $this->locale : "cn";

        // 设置多语言
        $this->trans = app('translator');
        $this->trans->setLocale($this->locale);
    }
}
