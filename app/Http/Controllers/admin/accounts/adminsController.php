<?php

namespace App\Http\Controllers\admin\accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminsController extends Controller
{
    //

    public function getAdmins()
    {
        return view('admin.accounts.admins');
    }

    public function addAdmins(Request $request)
    {
    }
}
