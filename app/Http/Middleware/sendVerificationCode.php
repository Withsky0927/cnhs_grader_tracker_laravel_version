<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class sendVerificationCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private function SendEmail($firstname, $lastname, $emailAddress, $digit)
    {
        $toEmail = $emailAddress;
        $toName = $lastname . ', ' . $firstname;

        $data = ['name' => $toName, 'body' => $digit];
        Mail::send('guestconfirmationemail', $data, function ($message) use ($toName, $toEmail) {
            $message->to($toEmail)->subject('CNHS - Senior High Graduate Tracer Confirmation Code');
        });
    }
    private function HashPassword($Password)
    {
        $hash = Hash::make($Password, [
            'memory' => 1024,
            'time' => 2,
            'threads' => 2,
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
        $role = "student";
        $birthday = $year . '-' . $month . '-' . $day;


        Session::put('guests_confirmation', ['guest' => [
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
            'role' => $role,
            'birthday' => $birthday
        ]]);

        $randomNumber = mt_rand(100000, 999999);

        $this->SendEmail($firstname, $lastname, $email, $randomNumber);

        Session::put('confirmation-' . $username, $username);
        Session::put('confirmation_code', $randomNumber);
        Session::save();
        return $next($request);
    }
}
