<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Helper\SecurityHelper;
use App\Model\User;

use App\Http\Controllers\Controller as BaseController;

class ProjectController extends BaseController
{
    /*
     * 接口调试界面
     */
    public function apiDebug($key) {
        $assign = [ "key" => $key ];
        // 
        if ($key=="channel-menu") {
            $user = User::where('account', 'koocyton@gmail.com')->first();
            $token = $user->token;
            $token_secret = $user->token_secret;
            $request_url = "http://be.doopp.com/channel-menu";
            $request_method = "GET";
            $assign["authorization"] = SecurityHelper::authorization($token, $token_secret, $request_url, $request_method);
        }
        // 返回 view
        return $this->view('project_api_debug', $assign);
    }

    /*
     * 接口文档
     */
    public function apiDoc() {
    }
}