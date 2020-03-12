<?php

namespace App\Http\Controllers\admin\profileinfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class profileInfoController extends Controller
{

    public function loadProfileInfoData(Request $request)
    {
        $profileID = $request->query('id');

        $profileData = DB::table('admins')
            ->select('username', 'profile_pic', 'email', 'phone')
            ->where('admin_id', $profileID)
            ->get();

        return response()->json(['profile_data' => $profileData]);
    }

    public function getProfile()
    {
        //$this->loadProfileInfoData();
        return view('admin.profile.profileinfo');
    }

    public function editProfile(Request $request, $id)
    {
        $editUserID = $id;
        return response()->json(['status' => $editUserID]);
    }
}
