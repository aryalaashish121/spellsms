<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class activeuser
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
        if(auth()->user()->status){
            return $next($request);
        }else{
            return "Your account is suspended";
        }
    }
}
