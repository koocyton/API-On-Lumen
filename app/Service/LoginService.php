<?php
namespace App\Service;

use App\Model\Manager;

class LoginService
{
  public function login(String $account, String $password) {
    $manager = Manager::where('account', 'test@test.com')->first();
    print_r($manager);
    exit();
  }

  public function logout() {
    return true;
  }
}
