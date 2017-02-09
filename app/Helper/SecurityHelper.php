<?php
namespace App\Helper;

class SecurityHelper
{
    // 设置 token 长度
    const TOKEN_LENGTH = 10;

    // 设置 security 长度
    const SECURITY_LENGTH = 18;

    /**
     * 获取一个随机的字符串
     */
    public static function randomToken($length = 32)
    {
        if (!isset($length) || intval($length) <= 8) {
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
     * set auth
     */
    public static function setOAuth($token, $token_secret)
    {
        // get config
        $oauth_config = config("auth");
        // 定义
        $consumer_key = env('API_APP_ID');
        $consumer_secret = env('API_APP_KEY');
        // auth
        $oauth = new \OAuth($consumer_key, $consumer_secret, OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_AUTHORIZATION);
        $oauth->setToken($token, $token_secret);
    }

    /**
     * auth request token
     */
    public static function getRequestToken($token, $token_secret, $request_uri, $request_method)
    {
        $request_url = $request_uri;
        if (!preg_match("/^http.+/", $request_uri)) {
            $request_url = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . $request_uri;
        }
        $oauth = self::setOAuth($token, $token_secret);
        return $oauth->getRequestHeader($request_method, $request_url);
    }

    /**
     * authorization
     */
    public static function getRequestHeader($token, $token_secret, $request_uri, $request_method)
    {
        $request_url = $request_uri;
        if (!preg_match("/^http.+/", $request_uri)) {
            $request_url = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . $request_uri;
        }
        $oauth = self::setOAuth($token, $token_secret);
        return $oauth->getRequestHeader($request_method, $request_url);
    }
}
