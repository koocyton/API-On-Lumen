<?php
namespace App\Service;

use App\Model\Manager;

class LoginService
{
  public function login(String $account, String $password) {
    $manager = Manager::where('account', $account)->first();
    if ($manager!=null) {
      return true;
    }
    return false;
  }

  public function logout() {
    return true;
  }
}
