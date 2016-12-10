<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController
{
    /*
     * 获取 access token
     */
    public function accessToken(Request $request) {
    	
    	return $this->clientAccessToken($request);
    }

    /*
     * client access token
     */
    private function clientAccessToken($request) {
    	// 账号
        $account = $request->input("account");
        // 密码
        $password = $request->input("password");
        // 登录
        $user = app('db')->table('user')->where('account', $account)->first();
        // 管理员存在
        if (!empty($user) && $user->is_action=="on") {
	        // 加密后的密码
	        $hash_password = md5(sprintf(config("app")['password_hash_prefix'], $password));
            // 密码正确
            if ($user->password==$hash_password) {
                // 更新登录时间
                app('db')->table('user')->where([ 'id'=>$user->id ])->update([ 'updated_at'=>time() ]);
                // 登录成功
                return response()->json([ "user" => $user, "token" => 'token', "token_secret" => 'token_secret' ]);
            }
            return null;
        }
        return null;
    }

    /*
     * authorization
     */
    public function authorization(Request $request) {
    	// get config
    	$auth_config = config("auth");
    	// 定义
		$consumer_key = $auth_config['app_id'];
		$consumer_secret = $auth_config['app_key'];
		// get input value
		$token = $request->input($token);
		$token_secret = $request->input($token_secret);
		$request_url = $request->input($request_url);
		$request_method = $request->input($request_method);;
		// auth
		$auth = new \OAuth($consumer_key, $consumer_secret, OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_AUTHORIZATION);
		$auth->setToken($token, $token_secret);
		$authorization = $auth->getRequestHeader($request_method, $request_url);
        // 
        return response()->json(["authorization"=>$authorization]);
    }
}