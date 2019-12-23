<?php

namespace App\Http\Controllers\admin\accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class studentsController extends Controller
{
    
    public function getStudents()
    {
        return view('admin.accounts.students');
    }

    public function addStudents(Request $request)
    {
    }
}
