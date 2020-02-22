<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class forgotpassword extends Controller
{

    public function getForgotPasswordForm()
    {
        return view('forgotpassword');
    }

    public function submitForgotPasswordForm(Request $request)
    {
        $message = 'please open the email that has been used on this account for confirmation code';
        return redirect('/forgotconfirmation')->with('confirmation_code', $message);
    }
}
