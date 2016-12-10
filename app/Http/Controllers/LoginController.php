<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Contracts\Auth\Factory as Auth;

use App\Http\Controllers\Controller as BaseController;

class LoginController extends BaseController
{
    /*
     * 登录表单
     */
    public function index(Response $response) {
        // 发送 cookie
        $with_cookie = new Cookie('locale', $this->locale);
        // 返回 view
        return $this->view('login_index')->withCookie($with_cookie);
    }

    /*
     * 提交登录
     */
    public function signIn(Request $request, Response $response) {
        // 是否记住
        $rember = !empty($request->input("rember"));
        // 账号
        $account = $request->input("account");
        // 密码
        $password = $request->input("password");

        // 登录
        $manager = app('db')->table('manager')->where('account', $account)->first();
        // 管理员存在
        if (!empty($manager) && $manager->is_action=="on") {
            // 加密后的密码
            $hash_password = md5(sprintf(config("app")['password_hash_prefix'], $password));
            // 密码正确
            if ($manager->password==$hash_password) {
                // 更新登录时间
                app('db')->table('manager')->where([ 'id'=>$manager->id ])->update([ 'updated_at'=>time() ]);
                // 登录成功
                return response()->json(['action'=>'redirect', 'url'=>config("app")['default_portal']], 200)
                                ->withCookie(new Cookie('auth_user', $account));
            }
            // 密码错误
            return response()->json(['action'=>'showMessage', 'message'=>'password is wrond'], 404);
        }
        // 管理员不存在
        return response()->json(['action'=>'showMessage', 'message'=>'account not found'], 405);
    }

    /*
     * 退出登录
     */
    public function signout() {
        // 退出登陆
        return response()->json(['action'=>'redirect', 'url'=>'/login'], 200)->withCookie(new Cookie('auth_user', null));
    }
}
