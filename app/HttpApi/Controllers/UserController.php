<?php
namespace App\HttpApi\Controllers;

use Illuminate\Http\Request;
use App\HttpApi\Controllers\ApiController;
use App\Helper\SecurityHelper;

use App\Model\User;

class UserController extends ApiController
{
    /*
     * 获取 access token
     */
    public function accessToken(Request $request) {
    	return $this->clientAccessToken($request);
    }

    /*
     * 用户注册
     */
    public function regist(Request $request) {
        // 账号
        $account = $request->input("account");
        // 密码
        $password = $request->input("password");
        // 查询用户
        $user = User::where('account', $account)->first();
        // 用户不存在
        if (!empty($user)) {
            // 插入的数据
            $user = [
                'account' => 'koocyton@gmail.com',
                'password' => md5(sprintf(env("APP_ENCRYPT_SALT"), $password)),
                'is_action' => 'on',
                'created_at' => time(),
                'updated_at' => time(),
                'privileges' => ''
            ];
            User::insert($opteration);
            // 返回 access token
            return $this->clientAccessToken($request);
        }
        // 用户已存在
        return response()->json([
                'error' => 1,
                'action' => 'showMessage',
                'message'=>'account exist'], 405);
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
        $user = User::where('account', $account)->first();
        // 用户存在
        if (!empty($user)) {
	        // 加密后的密码
	        $hash_password = md5(sprintf(env("APP_ENCRYPT_SALT"), $password));
            // 密码正确
            if ($user->password==$hash_password) {
                // 更新最近登录时间
                $update_param = [ 'updated_at'=>time() ];
                // 如果 user token 为空
                if (empty($user->token)) {
                    $user->token = SecurityHelper::randomToken(SecurityHelper::TOKEN_LENGTH);
                    $update_param['token'] = $user->token;
                }
                // 如果 user token_secret 为空
                if (empty($user->token_secret)) {
                    $user->token_secret = SecurityHelper::randomToken(SecurityHelper::SECURITY_LENGTH);
                    $update_param['token_secret'] = $user->token_secret;
                }
                // 更新登录时间 和 token
                User::where([ 'id'=>$user->id ] )->update($update_param);

                // 登录成功
                return response()->json([ "user" => $user, "token" => $user->token, "token_secret" => $user->token_secret ]);
            }
            // 密码错误
            return response()->json([
                'error' => 1,
                'action' => 'showMessage',
                'message' => 'password is wrond'], 404);
        }
        // 管理员不存在
        return response()->json([
                'error' => 1,
                'action' => 'showMessage',
                'message'=>'account not found'], 405);
    }
}