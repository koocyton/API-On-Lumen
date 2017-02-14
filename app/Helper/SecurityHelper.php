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
    public static function randomBytes($length = 32)
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
     *
     */
    public static function getAuthorizationTime($authorization)
    {
        if (preg_match('/^OAuth\s+(.*?)$/', $authorization, $matches)) {
            // 将值提取出来
            if (preg_match_all('/([^,]+)="([^,]+)"/', $matches[1], $parameters)) {
                foreach ($parameters[1] as $key => $idx) {
                    if ($idx == 'oauth_timestamp') {
                        return $parameters[2][$key];
                    }
                }
            }
        }
    }

    /*
     * get authorization token
     */
    public static function getAuthorizationToken($authorization)
    {
        if (preg_match('/^OAuth\s+(.*?)$/', $authorization, $matches)) {
            // 将值提取出来
            if (preg_match_all('/([^,]+)="([^,]+)"/', $matches[1], $parameters)) {
                foreach ($parameters[1] as $key => $idx) {
                    if ($idx == 'oauth_token') {
                        return $parameters[2][$key];
                    }
                }
            }
        }
        return false;
    }

    /**
     * check authorization
     */
    public static function checkAuthorization($authorization, $token_secret, $consumer_secret, $request_uri, $request_method)
    {
        $request_url = $request_uri;
        if (!preg_match("/^http.+/", $request_uri)) {
            $request_url = "http://" . $_SERVER["HTTP_HOST"] . $request_uri;
        }
        if (preg_match('/^OAuth\s+(.*?)$/', $authorization, $matches)) {
            // 将值提取出来
            if (preg_match_all('/([^,]+)="([^,]+)"/', $matches[1], $parameters)) {
                $param = [];
                foreach ($parameters[1] as $key => $idx) {
                    $param[$idx] = $parameters[2][$key];
                }

                // new oauth
                $oauth = new \OAuth($param['oauth_consumer_key'], $consumer_secret, $param['oauth_signature_method'], OAUTH_AUTH_TYPE_AUTHORIZATION);
                $oauth->setToken($param['oauth_token'], $token_secret);
                $oauth->setNonce($param['oauth_nonce']);
                $oauth->setTimestamp($param['oauth_timestamp']);
                $oauth->setVersion($param['oauth_version']);

                // return
                return $oauth->generateSignature($request_method, $request_url) == urldecode($param['oauth_signature']);
            }
        }
        return false;
    }

    /**
     * get authorization
     */
    public static function getAuthorization($token, $token_secret, $consumer_key, $consumer_secret, $request_uri, $request_method)
    {
        $request_url = $request_uri;
        if (!preg_match("/^http.+/", $request_uri)) {
            $request_url = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . $request_uri;
        }
        // new oauth
        $oauth = new \OAuth($consumer_key, $consumer_secret, OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_AUTHORIZATION);
        $oauth->setToken($token, $token_secret);
        return $oauth->getRequestHeader($request_method, $request_url);
    }
}
