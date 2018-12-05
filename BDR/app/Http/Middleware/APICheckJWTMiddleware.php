<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Tymon\JWTAuthExceptions\JWTException;

class APICheckJWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (JWTAuth::getToken()) {
            return $next($request);
        }else{
            return response()->json(['error'=>'Você não esta logado no sistema!']);;   
        }
    }
}
