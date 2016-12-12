<?php
namespace App\Helper;

class SecurityHelper
{
    /*
     * 获取一个随机的字符串
     */
    public static function randomToken($length = 32){
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
    public static function authorization($token, $token_secret, $request_url, $request_method) {
        // get config
        $auth_config = config("auth");
        // 定义
        $consumer_key = env('API_APP_ID');
        $consumer_secret = env('API_APP_KEY');
        // auth
        $auth = new \OAuth($consumer_key, $consumer_secret, OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_AUTHORIZATION);
        $auth->setToken($token, $token_secret);
        return $auth->getRequestHeader($request_method, $request_url);
    }
}