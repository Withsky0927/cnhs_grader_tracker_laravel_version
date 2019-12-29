<?php

namespace App\Http\Controllers\admin\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function getHome()
    {
        return view('admin.admin.home');
    }

    public function submitHome(Request $request)
    {
    }
}
