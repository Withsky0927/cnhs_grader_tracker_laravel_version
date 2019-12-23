<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class register extends Controller
{
    public function getRegisterForm(Request $request)
    {
        return view('register');
    }

    public function submitRegisterForm(Request $request)
    {
        if ($request->session()->has('guests_confirmation')) {
            $notification = "Account has been created!";
            Session::put('confirmation_stay', true);
            return redirect('confirmation')->with('notification', $notification);
        } else {
            return back();
        }
    }
}
