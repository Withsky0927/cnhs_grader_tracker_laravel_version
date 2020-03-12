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

        $username = $request->input('username');
        $role = DB::table('accounts')->where('username', $username)->value('role');
        $userid = DB::table('accounts')->where('username', $username)->value('account_id');
        $request->session()->put('user_role', $role);

        $request->session()->put('login_username', $username);

        Session::put('user_id', $userid);

        return $next($request);
    }
}
