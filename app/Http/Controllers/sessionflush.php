<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sessionflush extends Controller
{
    public function flushSession(Request $request)
    {

        $request->session()->flush();
        return "success";
    }
}
