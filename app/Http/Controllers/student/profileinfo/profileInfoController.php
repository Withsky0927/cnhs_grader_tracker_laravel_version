<?php

namespace App\Http\Controllers\student\profileinfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class profileInfoController extends Controller
{
    public function loadProfileInfoData()
    {
        $loginAccount = Session::get('login_username');
        $data = DB::table('guests')->where('username', $loginAccount)->first();


        $password = $data->password;
        $phone = $data->phone;
        $email = $data->email;
        $profilepic = $data->profile_pic;

        Session::put('login_password', $password);
        Session::put('login_phone', $phone);
        Session::put('login_email', $email);
        Session::put('login_profilepic', $profilepic);
    }

    public function getProfile()
    {
        return view('student.profile');
    }

    public function editProfile(Request $request, $id)
    {
    }
}
