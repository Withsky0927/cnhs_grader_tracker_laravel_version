<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login extends Controller
{
    public function getLoginForm()
    {
        return view('index');
    }

    public function submitLoginForm(Request $request)
    {
        return view('register', ['data' => $request->all()]);
    }
}
