<?php
namespace App\Service;

use App\Define\ErrorCode;
use App\Model\Manager;

class LoginService
{
  public function login(String $account, String $password) {
    $manager = Manager::where('account', $account)->first();
    if ($manager!=null) {
      $encryptPassword = Manager::encryptPassword($manager, $password);
      if ($encryptPassword==$manager->password) {
        return true;
      }
      throw new \Exception("password is error", ErrorCode::EXECUTE_ERROR);
    }
    throw new \Exception("can not found this account", ErrorCode::EXECUTE_ERROR);
  }

  public function logout() {
    return true;
  }
}
