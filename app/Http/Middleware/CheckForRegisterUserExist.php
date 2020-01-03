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



        $checkAdminUsername = DB::table('admins')
            ->where('username', $username)
            ->value('username');

        $checkStudentUsername = DB::table('guests')
            ->where('username', $username)
            ->value('username');

        if ($checkAdminUsername || $checkStudentUsername) {
            $errors['username'] = 'Username already Exist!';
        }

        $checkLRN = DB::table('guests')
            ->where('lrn', $lrn)
            ->value('lrn');

        $checkEmail = DB::table('guests')
            ->where('email', $email)
            ->value('email');

        $checkPhone = DB::table('guests')
            ->where('phone', $phone)
            ->value('phone');

        if ($checkEmail) {
            $errors['email'] = 'Email already Exist! Please Contact Administrator for Assistance';
        }

        if ($checkLRN) {
            $errors['lrn'] = 'LRN is already Exist! Please Contact Administrator for Assistance';
        }

        if ($checkPhone) {
            $errors['phone'] = 'Phone already Exist!';
        }


        if ($errors != null) {
            return redirect('register')->with('userexist', $errors);
        } else {
            return $next($request);
        }
    }
}
