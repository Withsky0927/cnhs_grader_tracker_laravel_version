<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class forgotPasswordConfirmationController extends Controller
{
    private function ChangePassword()
    {
        $credentials = Session::get('forgotPasswordCredential');


        $role = $credentials['forgotpassword_credential']['accountType'];
        $username  = $credentials['forgotpassword_credential']['username'];
        $newPassword = $credentials['forgotpassword_credential']['newPassword'];

        if ($role == 'admin') {
            DB::table('admins')->where('username', $username)->update(['password' => $newPassword]);
            DB::table('accounts')->where('username', $username)->update(['password' => $newPassword]);
        } elseif ($role == 'student') {
            DB::table('guests')->where('username', $username)->update(['password' => $newPassword]);
            DB::table('accounts')->where('username', $username)->update(['password' => $newPassword]);
        }

        Session::forget('forgotPasswordCredential');
        Session::forget('confirmationcode');
    }

    public function resendConfirmation()
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
        return back()->with('new_forgot_password_confirmation_code', 'A new confirmation code has been sent');
    }

    public function getConfirmation()
    {
        return view('forgotconfirmation');
    }

    public function submitConfirmation(Request $request)
    {
        $confirmationCodeFromInput = $request->input('forgotconfirm');
        $confirmationCode = Session::get('confirmationcode');
        if ($confirmationCodeFromInput == $confirmationCode) {
            $this->ChangePassword();
            return redirect('/')->with('forgot_password_success', 'Account password has been updated');
        } elseif ($confirmationCodeFromInput != $confirmationCode) {
            $error = 'Invalid Confirmation Code, Please Try again';
            return back()->with('invalid_forgotpassword_code', $error);
        }
    }
}
