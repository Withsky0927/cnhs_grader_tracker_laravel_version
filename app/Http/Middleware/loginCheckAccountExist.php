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
        $errors  = "";
        if ($checkUsername) {
            // check password 
            if (Hash::check($password, $hashedPassword)) {
                return true;
            } elseif (!Hash::check($password, $hashedPassword)) {
                $errors = "Password Mismatch";
            }
        } elseif (!$checkUsername) {
            $errors = "Username Does not Exist";
        }


        // if account does not exist or password mismatch
        if ($errors) {
            return $errors;
        }
    }
    public function handle($request, Closure $next)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $accountExist = $this->checkAccount($username, $password);

        if (gettype($accountExist) !== "string" && gettype($accountExist) == "boolean") {
            return $next($request);
        } elseif (gettype($accountExist) == "string") {
            return back()->with('login_errors',  $accountExist);
        }
    }
}
