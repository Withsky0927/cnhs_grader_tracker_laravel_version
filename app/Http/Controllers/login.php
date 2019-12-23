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

        $userRole = Session::get('user_role');

        if ($userRole == 'superadmin' || $userRole == 'admin') {
            return redirect('admin/dashboard');
        } elseif ($userRole == 'student') {
            return redirect('student/home');
        }
    }
}
