<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Hash;

class sendVerificationCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    private function HashPassword($Password)
    {
        $hash = Hash::make($Password, [
            'rounds' => 12
        ]);

        return $hash;
    }
    public function handle($request, Closure $next)
    {
        $username = $request->input('username');
        $confirmPassword = $request->input('confirmPassword');
        $hashedPassword = $this->HashPassword($confirmPassword);
        $email = $request->input('email');
        $phone = $request->input('phone');
        $lrn = $request->input('lrn');
        $strand = $request->input('strand');
        $firstname = $request->input('firstname');
        $middlename = $request->input('middlename');
        $lastname = $request->input('lastname');
        $address = $request->input('address');
        $month = $request->input('month');
        $day = $request->input('day');
        $year = $request->input('year');
        $age = $request->input('age');
        $gender = $request->input('gender');
        $civilStatus = $request->input('civilStatus');
        $status = $request->input('status');
        $accountStatus = "pending";
        $createdAt = $year . '-' . $month . '-' . $day;



        $request->session()->push('guests_confirmation', ['guest' . $username => [
            'username' => $username,
            'confirmPassword' => $confirmPassword,
            'hashedPassword' => $hashedPassword,
            'email' => $email,
            'phone' => $phone,
            'lrn' => $lrn,
            'strand' => $strand,
            'firstname' => $firstname,
            'middlename' => $middlename,
            'lastname' => $lastname,
            'address' => $address,
            'month' => $month,
            'day' => $day,
            'year' => $year,
            'age' => $age,
            'gender' => $gender,
            'civilStatus' => $civilStatus,
            'status' => $status,
            'accountStatus' => $accountStatus,
            'createdAt' => $createdAt
        ]]);
        $request->session()->put('confirmation-' . $username, $username);
        $sessionId = $request->session()->all();
        var_dump($sessionId);

        return $next($request);
    }
}
