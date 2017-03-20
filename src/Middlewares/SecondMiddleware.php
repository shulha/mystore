<?php

namespace Mystore\Middlewares;

use Closure;
use Shulha\Framework\Middleware\Middleware;
use Shulha\Framework\Request\Request;

class SecondMiddleware implements Middleware
{
    public function handle(Request $request, Closure $next) {
        return ' second ';
//        return $next($request);
    }
}