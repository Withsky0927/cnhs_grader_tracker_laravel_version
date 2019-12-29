<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class login extends Controller
{

    public function getLoginForm()
    {
        return view('index');
    }

    public function submitLoginForm(Request $request)
    {

        $userRole = $request->session()->get('user_role');

        Session::forget('isLogin');
        Session::put('isLogin', true);
        if ($userRole == 'superadmin' || $userRole == 'admin') {
            return redirect('admin/dashboard');
        } elseif ($userRole == 'student') {
            return redirect('student/home');
        }
    }
}
