<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Artisan;

class logoutController extends Controller
{
    public function logout(Request $request)
    {

        if (!Session::has('isLogin')) {
            return back();
        } elseif (Session::has('isLogin')) {
            Session::flush();
            Cookie::clearResolvedInstances();
            return redirect('/');
        }
    }
}
