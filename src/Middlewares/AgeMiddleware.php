<?php

namespace Mystore\Middlewares;

use Closure;
use Shulha\Framework\Middleware\Middleware;
use Shulha\Framework\Request\Request;

class AgeMiddleware implements Middleware
{
    public function handle(Request $request, Closure $next)
    {
//        debug( $request );
        if($request->getRequestVariable('age') >= 16){
            return ' age ';
        }

        var_dump($next($request));
    }
}