<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminCheck
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
        if (Auth::guard($guard)->guest() || ! Auth::guard($guard)->user()->is_admin) {
            return redirect()->route('game');
        }

        return $next($request);
    }
}