<?php

namespace App\Http\Controllers\admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function getDashboard()
    {
        return view("admin.dashboard.dashboard");
    }

    public function submitDashboard(Request $request)
    {
    }
}
