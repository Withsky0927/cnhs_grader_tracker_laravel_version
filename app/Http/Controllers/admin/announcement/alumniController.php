<?php

namespace App\Http\Controllers\admin\announcement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class alumniController extends Controller
{

    public function getAlumni()
    {
        return view('admin.announcement.alumni');
    }
    public function addAlumni(Request $request)
    {
    }
}
