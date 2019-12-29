<?php

namespace App\Http\Controllers\admin\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class restoreController extends Controller
{
    //
    public function getRestore()
    {
        return view('admin.settings.restore');
    }

    public function addRestore(Request $request)
    {
    }
}
