<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class EmbeddedApiAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // return $request;
        // $credentials = request(['email', 'password']);
        // if (!Auth::attempt($credentials)) {
        //     return response()->json(['error' => 'Embedded Unauthorized'], 401);
        // }
        if(Auth::onceBasic()){
            return response()->json(['error' => 'Embedded Unauthorized'], 401);
        }else{
            return $next($request);
        }
    }
}
