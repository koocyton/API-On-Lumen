<?php

namespace App\Backend\Controllers;

use App\Model\Manager;
use App\Service\LoginService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

class LoginController extends Controller
{
  /**
   * @var LoginService $loginService
   **/
  private $loginService;

  public function __construct()
  {
    $this->loginService = app(LoginService::class);
  }

  public function index()
  {
    return $this->render("index");
  }

  public function login(Request $request)
  {
    $account  = $request->input("account", "");
    $password = $request->input("password", "");
    $remember = (boolean) $request->input("remember", false);
    // 如果登陆成功
    if ($this->loginService->login($account, $password)) {
      return response()->json(['action' => 'redirect', 'url' => '/portal'], 200)->withCookie(
          new Cookie(
            'sess-token',
            $this->loginService->createAuthToken(Manager::where('account', $account)->first()),
            $remember ? 0 : time() + 31536000
          )
        );
    }
    return response()->json(['action'=>'redirect','url'=>'/login']);
  }

  public function logout(LoginService $loginService)
  {
    $loginService->logout();
    return redirect("/login");
  }
}
