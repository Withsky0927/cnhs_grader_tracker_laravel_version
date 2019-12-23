<?php

namespace App\Http\Controllers\admin\announcement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class examinationController extends Controller
{
    //
    public function getExamination()
    {
        return view('admin.announcement.examination');
    }
    public function addExamination(Request $request)
    {
    }
}
