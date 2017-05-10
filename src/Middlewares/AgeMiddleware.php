<?php

namespace Mystore\Middlewares;

use Closure;
use Shulha\Framework\Middleware\MiddlewareInterface;
use Shulha\Framework\Request\Request;

class AgeMiddleware implements MiddlewareInterface
{
    public function handle(Request $request, Closure $next=null)
    {
        echo 'CheckAge<br>';
        if ($request->getRequestVariable('age') < 18) {
            throw new \Exception('AGE');
        }

        return $next($request);
    }
}