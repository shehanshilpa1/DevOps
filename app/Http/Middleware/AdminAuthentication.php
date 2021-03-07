<?php

namespace App\Http\Middleware;

use Redirect;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->status=='active') {
            return $next($request);
        } else {
            return Redirect::route('auth.sign-out-get');
        }
    }
}
