<?php

namespace App\Backend\Controllers;

use App\Model\Manager;
use App\Service\LoginService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

class LoginController extends Controller
{
  private $loginService;

  public function __construct()
  {
    /**@var LoginService $this->loginService **/
    $this->loginService = app(LoginService::class);
  }

  public function index()
  {
    Manager::where('account', 'koocyton@gmail.com')->first();
    return $this->render("index");
  }

  public function login(Request $request)
  {
    $account = $request->input("account", "");
    $password = $request->input("password", "");
    $remember = $request->input("remember", false);
    if ($this->loginService->login($account, $password)) {
      $cookieExpires = empty($remember) ? 0 : time() + 31536000;
      $this->loginService->sessionToken();
      return response()->json(['action' => 'redirect', 'url' => '/portal'], 200)
        ->withCookie(new Cookie('sess-token', "afafaafds", $cookieExpires));
    }
    return response()->json(['action'=>'redirect','url'=>'/login']);
  }

  public function logout(LoginService $loginService)
  {
    $loginService->logout();
    return redirect("/login");
  }
}
