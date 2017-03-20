<?php

namespace Mystore\Middlewares;

use Closure;
use Shulha\Framework\Middleware\Middleware;
use Shulha\Framework\Request\Request;

class ThirdMiddleware implements Middleware
{
    public function handle(Request $request, Closure $next) {
        return ' third ';
//        return $next($request);
    }
}