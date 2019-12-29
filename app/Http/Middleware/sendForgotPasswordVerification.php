<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class sendForgotPasswordVerification
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

        $confirmationCred = Session::get('forgotPasswordCredential');

        $email = $confirmationCred['forgotpassword_credential']['email'];
        $username = $confirmationCred['forgotpassword_credential']['username'];

        $digit = mt_rand(100000, 999999);
        $data = ['name' => $username, 'body' => $digit];

        Mail::send('sendconfirmationforgotemail', $data, function ($message) use ($username, $email) {
            $message->to($email)->subject('CNHS - Senior High Graduate Tracer Confirmation Code');
        });

        Session::put('confirmationcode', $digit);

        return $next($request);
    }
}
