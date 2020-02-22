<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Session;

class checkIFLogin
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
        $url = "";
        if ($request->session()->has('isLogin')) {
            if (Session::get('user_role') == 'superadmin' || Session::get('user_role') == 'admin') {
                $url = $request->getPathInfo();
                if (
                    $url == '/forgotpassword' || $url == '/register'
                    || $url == '/confirmation' || $url == '/'
                    || $url == '/forgotconfirmation'
                ) {
                    return redirect('/admin/dashboard');
                } else {
                    return back();
                }
            } elseif (Session::get('user_role') == 'student') {
                $url = $request->getPathInfo();
                if (
                    $url == '/forgotpassword' || $url == '/register'
                    || $url == '/confirmation' || $url == '/'
                    || $url == '/forgotconfirmation'
                ) {
                    return redirect('/student/home');
                } else {
                    return back();
                }
            }
        } elseif (!$request->session()->has('isLogin')) {
            return $next($request);
        }
    }
}
