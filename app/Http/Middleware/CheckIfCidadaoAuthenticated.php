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
        // dd("teste");
        $auth=Auth::guard('cidadao');

        if (!$auth->check()) {
            // dd("teste");
            return redirect('/cidadao/login');
        }
        // dd("teste");
        return $next($request);
    }
}
