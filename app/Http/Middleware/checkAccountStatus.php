<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class checkAccountStatus
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

        $checkAccountStatus = DB::table('accounts')->where('username', $username)->value('account_status');

        if ($checkAccountStatus == 'pending' || $checkAccountStatus == 'disabled') {
            $error = 'The Account don\'t have a Permission to access the site';
            return back()->with('notification', $error);
        } elseif ($checkAccountStatus == 'approved') {
            return $next($request);
        }
    }
}
