<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Contracts\Auth\Factory as Auth;

use App\Http\Controllers\Controller as BaseController;

class LoginController extends BaseController
{
    // 密码加密 key
    private static $password_key = 'S*D-#%+0$2#^AFA7=SD2/sf_';

    /*
     * 登录表单
     */
    public function index(Response $response) {
        // cookie
        $response->withCookie(new Cookie('locale', $this->locale));
        // 返回 view
        return $response->setContent(view('login_index'));
    }

    /*
     * 提交登录
     */
    public function signIn(Request $request, Response $response)
    {
        // 是否记住
        $rember = !empty($request->input("rember"));
        // 账号
        $account = $request->input("account");
        // 密码
        $password = $request->input("password");
        // 加密后的密码
        $hash_password = md5(self::$password_key . '_' . $password);

        // 登录
        $manager = app('db')->table('manager')->where('account', $account)->first();
        // 管理员存在
        if ($manager) {
            // 密码正确
            if ($manager->password==$hash_password) {
                // set cookie
                $response->withCookie(new Cookie('auth_user', $account));
                // 登录成功
                return $response->setContent(json_encode([]));
            }
            // 密码错误
            return $response->setContent('2');
        }
        // 管理员不存在
        return $response->setContent('3');
    }

    /*
     * 退出登录
     */
    public function signout()
    {
        // set cookie
        $response->withCookie(new Cookie('auth_user', null));
    }
}
