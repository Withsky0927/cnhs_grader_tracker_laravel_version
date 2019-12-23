<?php

namespace App\Http\Controllers\admin\profileinfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class profileInfoController extends Controller
{
    public function getProfileInfo()
    {
        return view('admin.profileinfo.profileinfo');
    }

    public function editProfileInfo(Request $request)
    {
    }
}
