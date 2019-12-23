<?php

namespace App\Http\Controllers\admin\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class backupController extends Controller
{
    public function getBackup()
    {
        return view('admin.settings.backup');
    }


    public function addBackup(Request $request)
    {
    }
}
