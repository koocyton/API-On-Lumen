<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;
use Laravel\Lumen\Application;
use App\Http\Controllers\ApiController;

class UserController extends ApiController
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
	        $hash_password = md5(sprintf(env("APP_ENCRYPT_SALT"), $password));
            // 密码正确
            if ($user->password==$hash_password) {
                // 更新最近登录时间
                $update_param = [ 'updated_at'=>time() ];
                // 如果 user token 为空
                if (empty($user->token)) {
                    $user->token = $this->randomToken();
                    $update_param['token'] = $user->token;
                }
                // 如果 user token_secret 为空
                if (empty($user->token_secret)) {
                    $user->token_secret = $this->randomToken();
                    $update_param['token_secret'] = $user->token_secret;
                }
                // 更新登录时间 和 token
                app('db')->table( 'user' )->where([ 'id'=>$user->id ] )->update($update_param);

                // 登录成功
                return response()->json([ "user" => $user, "token" => $user->token, "token_secret" => $user->token_secret ]);
            }
            // 密码错误
            return response()->json(['action'=>'showMessage', 'message'=>'password is wrond'], 404);
        }
        // 管理员不存在
        return response()->json(['action'=>'showMessage', 'message'=>'account not found'], 405);
    }

    // 获取一个随机的字符串
    private function randomToken($length = 32){
        if(!isset($length) || intval($length) <= 8 ){
          $length = 32;
        }
        if (function_exists('random_bytes')) {
            return bin2hex(random_bytes($length));
        }
        if (function_exists('mcrypt_create_iv')) {
            return bin2hex(mcrypt_create_iv($length, MCRYPT_DEV_URANDOM));
        }
        if (function_exists('openssl_random_pseudo_bytes')) {
            return bin2hex(openssl_random_pseudo_bytes($length));
        }
    }

    /*
     * authorization
     */
    public function authorization(Request $request) {
    	// get config
    	$auth_config = config("auth");
    	// 定义
		$consumer_key = env('API_APP_ID');
		$consumer_secret = env('API_APP_KEY');
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