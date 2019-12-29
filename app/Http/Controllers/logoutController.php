<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class logoutController extends Controller
{
    public function logout(Request $request)
    {

        if (!Session::has('isLogin')) {
            return back();
        } elseif (Session::has('isLogin')) {
            Session::flush();
            return redirect('/');
        }
    }
}
