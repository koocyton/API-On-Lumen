<?php

namespace App\Http\Controllers;

use App\Helper\SecurityHelper;
use App\Model\Manager;
use App\Model\OperationRecord;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $locale = "cn";

    public $trans = null;

    public $auth = null;

    public $filter = null;

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
            echo view('__portal2', ['trans' => $this->trans])->render();
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
        $manager = Manager::withTrashed()->where(['token' => $token])->first();
        if (empty($manager) || empty($manager->token_secret)) {
            echo "<script>window.location='/login/signout';</script>";
            exit();
        }
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
                'manager_id' => 1,
                'manager_name' => 'koocyton@gmail.com',
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
