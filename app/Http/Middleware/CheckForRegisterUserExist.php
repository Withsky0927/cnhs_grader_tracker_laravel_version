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

        /*
        $checkUsername = DB::table('guests')
            ->where('username')
            ->get('username', $username);

        $checkLRN = DB::table('guests')
            ->where('lrn')
            ->get('lrn', $lrn);


        $checkEmail = DB::table('guests')
            ->where('email')
            ->get('email', $email);


        $checkPhone = DB::table('guests')
            ->where('phone')
            ->get('phone', $phone);


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

        return redirect('register')->with($errors);
        */
        return $next($request);
    }
}
