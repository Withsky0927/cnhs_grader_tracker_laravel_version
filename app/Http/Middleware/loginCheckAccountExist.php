<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Closure;
use Illuminate\Support\Facades\Hash;

class loginCheckAccountExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    private function checkAccount($username, $password)
    {
        $checkUsername = DB::table('accounts')->where('username', $username)->value('username');
        $hashedPassword = DB::table('accounts')->where('username', $username)->value('password');
        $error  = NULL;
        if ($checkUsername) {
            // check password 
            if (Hash::check($password, $hashedPassword)) {
                return true;
            } else {
                $error = "Password Mismatch";
            }
        } elseif (!$checkUsername) {
            $error = "Username Does not Exist";
        }


        // if account does not exist or password mismatch
        if ($error) {
            return $error;
        }
    }
    public function handle($request, Closure $next)
    {
        $errors = [];
        $username = $request->username;
        $password = $request->password;
        $accountExist = $this->checkAccount($username, $password);


        if ($accountExist == true) {
            return next($request);
        } elseif ($accountExist == false) {
            return back()->with('notification',  $accountExist);
        }
    }
}
