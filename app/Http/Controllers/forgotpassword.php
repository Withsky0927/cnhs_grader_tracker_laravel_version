<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class forgotpassword extends Controller
{
    public function getForgotPasswordForm()
    {
        return view('forgotpassword');
    }

    public function submitForgotPasswordForm(Request $request)
    {
        return view('register', ['data' => $request->all()]);
    }
}
