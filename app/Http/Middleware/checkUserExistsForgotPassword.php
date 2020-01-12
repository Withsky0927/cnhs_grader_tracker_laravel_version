<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class checkUserExistsForgotPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private $errors = NULL;
    public function checkIfPasswordMatch($new, $confirmnew)
    {
        if ($new == $confirmnew) {
            return true;
        } elseif ($new != $confirmnew) {
            return false;
        }
    }

    private function hashPassword($hashPassword)
    {
        $hash = Hash::make($hashPassword, [
            'memory' => 1024,
            'time' => 2,
            'threads' => 2,
        ]);

        return $hash;
    }
    private function checkAccountRole($account, $newPassword, $newConfirmPassword)
    {
        $checkIfAdmin = DB::table('admins')->where('username', $account)->value('username');
        $checkIfGuest = DB::table('guests')->where('username', $account)->value('username');

        $checkIfPasswordMatch = $this->checkIfPasswordMatch($newPassword, $newConfirmPassword);



        if (!$checkIfAdmin && $checkIfGuest) {
            // student account


            if ($checkIfPasswordMatch == true) {
                $email = DB::table('guests')->where('username', $checkIfGuest)->value('email');
                Session::put('forgotPasswordCredential', ['forgotpassword_credential' => [
                    'username' => $checkIfGuest,
                    'email' => $email,
                    'newPassword' => $this->hashPassword($newConfirmPassword),
                    'accountType' => 'student'
                ]]);
            } elseif ($checkIfPasswordMatch == false) {
                $this->errors = 'Password Mismatch';
            }
        } elseif ($checkIfAdmin && !$checkIfGuest) {
            // admin account
            if ($checkIfPasswordMatch == true) {
                $email  = DB::table('admins')->where('username', $checkIfAdmin)->value('email');
                Session::put('forgotPasswordCredential', ['forgotpassword_credential' => [
                    'username' => $checkIfAdmin,
                    'email' => $email,
                    'newPassword' => $this->hashPassword($newConfirmPassword),
                    'accountType' => 'admin'
                ]]);
            } elseif ($checkIfPasswordMatch == false) {
                $this->errors = 'Password Mismatch';
            }
        }
    }
    public function handle($request, Closure $next)
    {
        $username = $request->input('username');
        $newPassword = $request->input('new_password');
        $confirmNewPassword = $request->input('confirm_old_password');

        $checkUsernameExist = DB::table('accounts')->where('username', $username)->value('username');

        if ($checkUsernameExist) {
            $this->checkAccountRole($checkUsernameExist, $newPassword, $confirmNewPassword);
        } elseif (!$checkUsernameExist) {
            $this->errors = 'Account Does not exist';
        }

        if ($this->errors) {
            return back()->with('notification', $this->errors);
        }
        return $next($request);
    }
}
