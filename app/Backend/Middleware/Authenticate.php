<?php

namespace App\Backend\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate
{
  /**
   * The authentication guard factory instance.
   *
   * @var \Illuminate\Contracts\Auth\Factory
   */
  protected $auth;

  /**
   * Create a new middleware instance.
   *
   * @param  \Illuminate\Contracts\Auth\Factory $auth
   */
  public function __construct(Auth $auth)
  {
    $this->auth = $auth;
  }

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @param  string|null $guard
   * @return mixed
   */
  public function handle($request, Closure $next, $guard = null)
  {
    // 未登录
    if ($this->auth->guard($guard)->guest()) {
      // return response('Unauthorized.', 401);
      // ajax 请求的跳转
      if ($request->ajax()) {
        return response()->json(['action' => 'redirect', 'url' => '/login']);
      }
      // 正常的跳转
      return redirect("/login");
    }
    // Ajax ，显示页面
    if ($request->ajax()) {
      return $next($request);
    }
    // 不是 ajax ，显示 portal
    return response(view("backend/portal"));
  }
}
