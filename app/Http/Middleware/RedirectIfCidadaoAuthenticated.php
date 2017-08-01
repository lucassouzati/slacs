<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfCidadaoAuthenticated
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
        //dd('teste');
        $auth=Auth::guard('cidadao');
        if ($auth->check()) {
            return redirect('cidadao/home');
        }

        return $next($request);
    }
}
