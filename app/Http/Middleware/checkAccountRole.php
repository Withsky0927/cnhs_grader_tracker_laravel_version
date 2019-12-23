<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Closure;

class checkAccountRole
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

        $username = $request->username;

        $role = DB::table('accounts')->where('username', $username)->value('role');

        Session::put('user_role', $role);
        Session::put('login_username', $username);
        Session::save();

        return $next($request);
    }
}
