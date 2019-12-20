<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class register extends Controller
{
    private function isLogin(Request $request)
    {
        if ($request->session()->has('login')) {
            $role = $request->session()->get('role');
            if ($role == "admin" || $role == "superadmin") {
                return redirect('admin/dashboard');
            } elseif ($role) {
                return redirect();
            }
        }
    }
    public function getRegisterForm(Request $request)
    {

        $data = '';
        return view('register', compact('data'));
    }

    private function HashPassword($Password)
    {
        $hash = Hash::make($Password, [
            'rounds' => 12
        ]);

        return $hash;
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
