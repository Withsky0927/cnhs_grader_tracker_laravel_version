<?php

namespace App\Http\Middleware\admin\profile;

use Closure;
use Illuminate\Support\Facades\Session;

class checkProfileRole
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
        $checkAdminRole = Session::get('user_role');
        if ($checkAdminRole == 'student') {
            return response()
                ->json(['message' => 'Insufficient Priviledge', 'status_code' => 403]);
        } elseif ($checkAdminRole == 'superadmin' || $checkAdminRole == 'admin') {
            return $next($request);
        }
    }
}
