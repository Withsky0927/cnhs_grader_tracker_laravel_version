<?php

namespace App\Http\Controllers\admin\reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class reportsController extends Controller
{

    public function getReports()
    {
        return view("admin.reports.reports");
    }

    public function submitReports(Request $request)
    {
    }
}
