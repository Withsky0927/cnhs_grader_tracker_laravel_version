<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class confirmation extends Controller
{

    private function FlushRegisterDataInSession()
    {
        Session::forget('guests_confirmation');
        Session::forget('imagepath');
        Session::forget('confirmation_code');
        Session::forget('confirmation_stay');
    }
    public function addNewUser()
    {

        $RegistrationData = Session::get('guests_confirmation');
        $NewGuestUserId = Str::uuid()->toString();
        $imagePath = Session::get('imagepath');
        DB::table('guests')
            ->insert([
                'guest_id' => $NewGuestUserId,
                'profile_pic' => $imagePath,
                'username' => $RegistrationData['guest']['username'],
                'password' => $RegistrationData['guest']['hashedPassword'],
                'email' => $RegistrationData['guest']['email'],
                'phone' => $RegistrationData['guest']['phone'],
                'lrn' => $RegistrationData['guest']['lrn'],
                'strand' => $RegistrationData['guest']['strand'],
                'firstname' => $RegistrationData['guest']['firstname'],
                'middlename' => $RegistrationData['guest']['middlename'],
                'lastname' => $RegistrationData['guest']['lastname'],
                'address' => $RegistrationData['guest']['address'],
                'birthday' => $RegistrationData['guest']['birthday'],
                'age' => $RegistrationData['guest']['age'],
                'gender' => $RegistrationData['guest']['gender'],
                'civil_status' => $RegistrationData['guest']['civilStatus'],
                'status' => $RegistrationData['guest']['status'],
                'role' => $RegistrationData['guest']['role'],
                'createdAt' => date('Y-m-d')
            ]);

        DB::table('accounts')
            ->insert([
                'account_id' => $NewGuestUserId,
                'username' => $RegistrationData['guest']['username'],
                'password' => $RegistrationData['guest']['hashedPassword'],
                'role' => $RegistrationData['guest']['role'],
                'account_status' => 'approved'
            ]);


        $notification = 'Account Succcesfully Created, check your email if this account frequently if the administrator approved all the information of this account.';

        $this->FlushRegisterDataInSession();

        return redirect('/')->with('register_success', $notification);
    }

    public function resendConfirmation(Request $request)
    {
        $RegistrationData = Session::get('guests_confirmation');
        $GenerateConfirmationCode = mt_rand(100000, 999999);
        $toName = $RegistrationData['guest']['lastname'] . ", " . $RegistrationData['guest']['firstname'];
        $toEmail = $RegistrationData['guest']['email'];
        $data = ['name' => $toName, 'body' => $GenerateConfirmationCode];
        Mail::send('guestconfirmationemail', $data, function ($message) use ($toName, $toEmail) {
            $message->to($toEmail)->subject('CNHS - Senior High Graduate Tracer Confirmation Code');
            $message->from('davidwithmore422@gmail.com', 'Confirmation Code');
        });


        $notification = "New Confirmation Code has been sent to your email.";
        $request->session()->put('confirmation_code', $GenerateConfirmationCode);
        Session::save();
        return redirect('confirmation')->with('new_confirmation_code', $notification);
    }



    public function getConfirmation()
    {

        if (!Session::has('confirmation_stay')) {
            return redirect('/');
        }

        return view('confirmation');
    }

    public function submitConfirmation(Request $request)
    {
        $confirmationCode = $request->session()->get('confirmation_code');
        $confirmationCodeInput = $request->input('confirmation');
        if ($confirmationCode == $confirmationCodeInput) {
            return $this->addNewUser();
        } elseif ($confirmationCode != $confirmationCodeInput) {
            $notification = "Invalid Confirmation Code, Please Try Again";
            return back()->with('invalid_confirmation_code', $notification);
        }
    }
}
