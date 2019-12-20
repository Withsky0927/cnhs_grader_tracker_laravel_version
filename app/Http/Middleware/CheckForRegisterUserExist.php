<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class CheckForRegisterUserExist
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
        $errors = [];
        $username = $request->input('username');
        $lrn = $request->input('lrn');
        $email = $request->input('email');
        $phone = $request->input('phone');



        $checkUsername = DB::table('guests')
            ->where('username', $username)
            ->get()
            ->first();

        $checkLRN = DB::table('guests')
            ->where('lrn', $lrn)
            ->get()
            ->first();

        $checkEmail = DB::table('guests')
            ->where('email', $email)
            ->get()
            ->first();

        $checkPhone = DB::table('guests')
            ->where('phone', $phone)
            ->get()
            ->first();

        if ($checkUsername) {
            $errors['username'] = 'Username already Exist! Please Contact Administrator for Assistance';
        }

        if ($checkEmail) {
            $errors['email'] = 'Email already Exist! Please Contact Administrator for Assistance';
        }

        if ($checkLRN) {
            $errors['lrn'] = 'LRN is already Exist! Please Contact Administrator';
        }

        if ($checkPhone) {
            $errors['phone'] = 'Phone already Exist! Please use Another Number';
        }



        if ($errors != null) {
            return redirect('register')->with('userexist', $errors);
        } else {
            return $next($request);
        }
    }
}
