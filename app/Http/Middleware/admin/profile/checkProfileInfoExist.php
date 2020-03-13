<?php

namespace App\Http\Middleware\admin\profile;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;

class checkProfileInfoExist
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
        $profileInfo = $request->all();

        $username = $profileInfo['username'];
        $email = $profileInfo['email'];
        $phone = $profileInfo['phone'];

        $errors = [];

        $checkUsername = DB::table('guests')->where('username', $username)->value('username');
        $checkUsername = DB::table('admins')->where('username', $username)->value('username');


        $checkEmail = DB::table('guests')->where('email', $email)->value('email');
        $checkEmail = DB::table('admins')->where('email', $email)->value('email');

        $checkPhone = DB::table('guests')->where('phone', $phone)->value('phone');
        $checkPhone = DB::table('admins')->where('phone', $phone)->value('phone');




        if ($checkUsername) {
            array_push($errors, 'Username is already Exist, Use another');
        }

        if ($checkEmail) {
            array_push($errors, 'Email is already Exist, Use another');
        }

        if ($checkPhone) {
            array_push($errors, 'Phone is already Exist, Use another');
        }

        if (count($errors) > 0) {
            return response()->json(['errors' => $errors]);
        }

        return $next($request);
    }
}
