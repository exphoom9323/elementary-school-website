<?php

namespace App\Http\Middleware;

use Closure;

class VerifIsT
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
        if(!auth()->user()->isT()){
            return redirect(route('welcome'));
        }
        return $next($request);
    }
}
