<?php

namespace App\Http\Controllers\admin\graduates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class graduatesController extends Controller
{
    //

    public function getGraduates()
    {
        return view('admin.graduates.graduates');
    }
    public function addGraduates(Request $request)
    {
    }
}
