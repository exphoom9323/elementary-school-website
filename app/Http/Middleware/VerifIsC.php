<?php

namespace App\Http\Middleware;

use Closure;

class VerifIsC
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
        if(!auth()->user()->isT() && !auth()->user()->isA()){
            return redirect(route('welcome'));
        }
        return $next($request);
    }
}
