<?php

namespace App\Backend\Controllers;

use App\Exceptions\Handler;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function index(Request $request)
  {
    $h = app(Handler::class);
    $b = $h->render($request, new \Exception("abc"));
    print_r($b);exit();
    return $this->render("index");
  }

  public function login()
  {
    print_r(app("handler"));
    return $this->render("index");
  }

  public function logout()
  {
    return $this->render("index");
  }
}
