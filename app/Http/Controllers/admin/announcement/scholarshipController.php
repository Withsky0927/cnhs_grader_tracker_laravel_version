<?php

namespace App\Http\Controllers\admin\announcement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class scholarshipController extends Controller
{
    //

    public function getScholarship()
    {
        return view('admin.announcement.scholarship');
    }

    public function addScholarship(Request $request)
    {
    }
}
