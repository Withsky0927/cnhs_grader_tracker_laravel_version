<?php

namespace App\Http\Middleware\admin\reports;

use Closure;
use Illuminate\Support\Facades\Session;

class checkIfReportsIsAdmin
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
        $checkRole = Session::get('user_role');
        if ($checkRole == 'superadmin') {
            Session::put('report_status', 'approved');
        } elseif ($checkRole == 'admin') {
            Session::put('report_status', 'pending');
        }
        return $next($request);
    }
}
