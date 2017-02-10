<?php
namespace App\Http\Controllers;

use App\Helper\SecurityHelper;
use App\Http\Controllers\Controller as BaseController;
use App\Model\Manager;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

class LoginController extends BaseController
{
    // 覆盖父类 beforeFielter
    protected function beforeFilter($request)
    {
    }

    /*
     * 登录表单
     */
    public function index(Request $request)
    {
        // 如果 Authorization Cookie 存在，校验 Authorization
        if (!empty($request->cookie('Authorization'))) {
            if ($this->checkAuthorization($request)) {
                echo "<script>window.location='/task/list';</script>";
                exit();
            }
        }

        // 发送 cookie
        $with_cookie = new Cookie('locale', $this->locale);
        // 返回 view
        return $this->display('login_index2')->withCookie($with_cookie);
    }

    /*
     * 提交登录
     */
    public function signIn(Request $request)
    {
        // 是否记住
        $rember = !empty($request->input("rember"));
        // 账号
        $account = $request->input("_account");
        // 密码
        $password = $request->input("_password");
        // 记住我
        $remberme = $request->input("_remberme");
        // 登录
        $manager = Manager::where('account', $account)->first();
        // 管理员存在
        if (!empty($manager) && empty($manager->deleted_at)) {
            // 加密后的密码
            $hash_password = md5(sprintf(env("APP_ENCRYPT_SALT"), $password));
            // 密码正确
            if ($manager->password == $hash_password) {
                // 获取 token 和 token_secret consumer_key consumer_secret
                $token = empty($manager->token) ? SecurityHelper::randomBytes(SecurityHelper::TOKEN_LENGTH) : $manager->token;
                $token_secret = empty($manager->token_secret) ? SecurityHelper::randomBytes(SecurityHelper::SECURITY_LENGTH) : $manager->token_secret;
                $consumer_key = env('BND_APP_ID');
                $consumer_secret = env('BND_APP_ID');
                // 得到会话
                $authorization = SecurityHelper::getAuthorization($token, $token_secret, $consumer_key, $consumer_secret, "/.*", 'GET POST');
                // 更新登录时间 , token, token_secret
                Manager::where(['id' => $manager->id])->update(['updated_at' => time(), 'token' => $token, 'token_secret' => $token_secret]);
                // 如果有选择记住我，给 Cookie 标注一个时间
                $cookie_expires = empty($remberme) ? 0 : time() + 31536000;
                // 登录成功
                return response()->json(['action' => 'redirect', 'url' => '/task/list'], 200)
                    ->withCookie(new Cookie('Authorization', $authorization, $cookie_expires));
            }
            // 密码错误
            return response()->json(['action' => 'showMessage', 'message' => 'password is wrond'], 404);
        }
        // 管理员不存在
        return response()->json(['action' => 'showMessage', 'message' => 'account not found'], 405);
    }

    /*
     * 退出登录
     */
    public function signOut(Request $request)
    {
        // 如果不是 Ajax 请求, 输出完整页面
        if (empty($request->header('X-Requested-With'))) {
            return response("<script>window.location='/login';</script>")->withCookie(new Cookie('Authorization', null));
        }

        // 退出登陆
        return response()->json(['action' => 'redirect', 'url' => '/login'], 200)->withCookie(new Cookie('Authorization', null));
    }
}
