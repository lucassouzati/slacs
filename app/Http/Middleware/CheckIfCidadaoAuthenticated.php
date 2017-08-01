<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfCidadaoAuthenticated
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
        $auth=Auth::guard('cidadao');
        if (!$auth->check() && !Auth::check()) {
            return redirect('/cidadao/login');
        }

        return $next($request);
    }
}
