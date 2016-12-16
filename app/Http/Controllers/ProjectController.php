<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Helper\SecurityHelper;

use App\Model\User;
use App\Model\Channel;
use App\Model\News;

use App\Http\Controllers\Controller as BaseController;

class ProjectController extends BaseController
{
    /*
     * 接口调试界面
     */
    public function apiDebug($key) {
        $assign = [ "key" => $key ];
        $user = User::where('account', 'koocyton@gmail.com')->first();
        // channel-menu
        if ($key=="channel-menu") {
            $token = $user->token;
            $token_secret = $user->token_secret;
            $request_url = "http://be.doopp.com/channel-menu";
            $request_method = "GET";
            $assign["authorization"] = SecurityHelper::authorization($token, $token_secret, $request_url, $request_method);
        }
        // channel-detail
        if ($key=="channel-detail") {
            $token = $user->token;
            $token_secret = $user->token_secret;
            $request_url = "http://be.doopp.com/channel-detail";
            $request_method = "GET";
            $assign["authorization"] = SecurityHelper::authorization($token, $token_secret, $request_url, $request_method);
        }
        // 返回 view
        return $this->view('project_api_debug', $assign);
    }

    /*
     * 接口文档
     */
    public function dataManage($key) {
        // 预定义变量
        $assign = [];

        // 获取数据
        if (in_array($key, ['channel', 'news', 'user'])) {
            $skip = empty($_GET['po']) ? 0 : $_GET['po']-1;
            $class_name = "App\\Model\\".ucfirst($key);
            $model = new $class_name();
            $assign['fields'] = $model->getFields();
            $assign['data'] = $model->skip($skip)->take(30)->orderBy('id', 'desc')->get();
        }

        // 分页信息
        $assign['paging'] = [
            // 当前页的起始数
            'current' => empty($_GET['po']) ? 1 : $_GET['po'],
            // 总数 
            'total' => $model->count(), 
            // 每页显示多少条记录
            'limit' => 30
        ];

        // 返回 view
        return $this->view('project_data_manage', $assign);
    }
}