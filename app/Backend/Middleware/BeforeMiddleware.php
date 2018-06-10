<?php

namespace App\Backend\Middleware;

use Closure;

class BeforeMiddleware
{
  public function handle($request, Closure $next)
  {
    // Perform action
    return $next($request);
  }
}