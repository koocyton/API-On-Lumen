<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Lang;
// Symfony\Component\HttpFoundation
use Illuminate\Translation\Translator;
use Symfony\Component\HttpFoundation\Cookie;
use App\Http\Controllers\Controller as BaseController;
// use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends BaseController
{
	/*
	 * 登录表单
	 */
    public function index(Response $response) {
		// 设置 cookie
		$response->withCookie(new Cookie("locale", $this->locale));
        echo Translator::get('login.Language');
        exit();
	}

    /*
     * 提交登录
     */
    public function signIn()
	{
        // 是否记住
        $rember = !empty($_POST["rember"]) ? false : true;
        // 登录
        if (Auth::attempt(['email' => $_POST["account"], 'password' => $_POST["password"]], $rember))
        {
            return KTAnchor::topLocation('/manager');
        }
        else {
            return KTAnchor::showSlidMessage(Lang::get('login.Failed'));
        }
	}

    /*
     * 退出登录
     */
    public function signout()
	{
        Auth::logout();
        return KTAnchor::topLocation('/login');
	}
}
