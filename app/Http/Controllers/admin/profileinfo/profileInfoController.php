<?php

namespace App\Http\Controllers\admin\profileinfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class profileInfoController extends Controller
{

    /*
    
      
    */

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

        $profileInfoData = Session::get('profile_updated_data');
        $profilePicData = Session::get('admin_profile_image');


        if ($profileInfoData['username'][0]) {

            DB::table('accounts')
                ->where('account_id', $editUserID)
                ->update(['username' => $profileInfoData['username'][0]]);
            DB::table('admins')
                ->where('admin_id', $editUserID)
                ->update(['username' => $profileInfoData['username'][0]]);
        }


        if ($profileInfoData['phone'][0]) {


            DB::table('admins')
                ->where('admin_id', $editUserID)
                ->update(['phone' => $profileInfoData['phone'][0]]);
        }


        if ($profileInfoData['email'][0]) {

            DB::table('admins')
                ->where('admin_id', $editUserID)
                ->update(['email' => $profileInfoData['email'][0]]);
        }


        if ($profilePicData) {
            DB::table('admins')
                ->where('admin_id', $editUserID)
                ->update(['profile_pic' => $profilePicData]);
        }

        Session::forget('profile_updated_data');
        Session::forget('admin_profile_image');

        return response()->json(['status' => $editUserID]);
    }
}
