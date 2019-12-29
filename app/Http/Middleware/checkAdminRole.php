<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;


class checkAdminRole
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

        $checkIfAdmin = $request->session()->get('user_role');
        if ($checkIfAdmin == 'admin' || $checkIfAdmin == 'superadmin') {
            return $next($request);
        } else {
            return back();
        }
    }
}
