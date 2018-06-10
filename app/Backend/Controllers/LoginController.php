<?php

namespace App\Backend\Controllers;

use App\Service\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function index()
  {
    return $this->render("index");
  }

  public function login(Request $request, LoginService $loginService)
  {
    $account = $request->input("account", "");
    $password = $request->input("password", "");
    if ($loginService->login($account, $password)) {
      return redirect("/portal");
    }
    return redirect("/login");
  }

  public function logout(LoginService $loginService)
  {
    $loginService->logout();
    return redirect("/login");
  }
}
