<?php

namespace Mystore\Middlewares;

use Closure;
use Shulha\Framework\Middleware\Middleware;
use Shulha\Framework\Request\Request;

class IsAdminMiddleware implements Middleware
{
    public function handle(Request $request, Closure $next)
    {
        if($request->getRequestVariable('foo') == 'bar'){
            return ' bla-bla-bla=admin ';
        }
    }
}