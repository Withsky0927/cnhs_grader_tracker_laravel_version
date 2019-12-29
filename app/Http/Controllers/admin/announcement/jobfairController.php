<?php

namespace App\Http\Controllers\admin\announcement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class jobfairController extends Controller
{
    //

    public function getJobFair()
    {
        return view('admin.announcement.jobjair');
    }
    public function addJobFair(Request $request)
    {
    }
}
