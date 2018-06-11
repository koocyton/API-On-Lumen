<?php

namespace App\Backend\Controllers;

use App\Model\Manager;
use App\Service\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function index()
  {
    Manager::where('account', 'koocyton@gmail.com')->first();
    return $this->render("index");
  }

  public function login(Request $request, LoginService $loginService)
  {
    $account = $request->input("account", "");
    $password = $request->input("password", "");
    if ($loginService->login($account, $password)) {
      return response()->json(['action'=>'redirect','url'=>'/portal']);
    }
    return response()->json(['action'=>'redirect','url'=>'/login']);
  }

  public function logout(LoginService $loginService)
  {
    $loginService->logout();
    return redirect("/login");
  }
}
