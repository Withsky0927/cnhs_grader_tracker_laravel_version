<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class checkStudentRole
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

        $checkIfStudent = $request->session()->get('user_role');
        if ($checkIfStudent == 'student') {
            return $next($request);
        } else {
            return back();
        }
    }
}
