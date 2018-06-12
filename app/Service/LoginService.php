<?php
namespace App\Service;

use App\Define\ErrorCode;
use App\Model\Manager;

class LoginService
{
  public function login(String $account, String $password) {
    /**@var Manager $manager **/
    $manager = Manager::where('account', $account)->first();
    if ($manager!=null) {
      $encryptPassword = $manager->encryptPassword($password);
      if ($encryptPassword==$manager->password) {
        return true;
      }
      throw new \Exception("password is error", ErrorCode::EXECUTE_ERROR);
    }
    throw new \Exception("can not found this account", ErrorCode::EXECUTE_ERROR);
  }

  /**
   * 创建 Auth Token
   *
   * @param Manager $manager
   * @return Manager
   */
  public function createAuthToken($manager) {
    $manager->setAttribute("token", $manager->encryptPassword(time()));
    $manager->save();
    return $manager->getAttribute("token");
  }

  public function logout() {
    return true;
  }
}
