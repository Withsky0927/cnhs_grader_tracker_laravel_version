<?php

namespace App\Http\Middleware\admin;

use Closure;
use Illuminate\Support\Facades\Session;

class checkIfSuperadmin
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
        $checkIfSuperAdmin = Session::get('user_role');
        if ($checkIfSuperAdmin != 'superadmin') {
            return response()->json(['message' => 'Insufficient Priviledge', 'status_code' => 403]);
        } elseif ($checkIfSuperAdmin == 'superadmin') {
            return $next($request);
        }
    }
}
