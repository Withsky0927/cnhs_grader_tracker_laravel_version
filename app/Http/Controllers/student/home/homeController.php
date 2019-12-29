<?php

namespace App\Http\Controllers\student\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeController extends Controller
{
    //

    public function getHomepage()
    {

        return view('student.home');
    }

    public function submitHomepage(Request $request)
    {
    }
}
