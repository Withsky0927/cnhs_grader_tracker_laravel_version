<?php

namespace App\Http\Controllers\admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class dashboardController extends Controller
{
    public function getUsersNumber()
    {
        $getUsersCount = DB::table('accounts')->where('account_status', 'approved')->count();

        return response()->json(['userscount' => $getUsersCount]);
    }

    public function getGraduatesGraphData(Request $request)
    {

        $stemStudents = DB::table('graduates')->where('strand', 'STEM')->count();
        $gasStudents = DB::table('graduates')->where('strand', 'GAS')->count();
        $abmStudents = DB::table('graduates')->where('strand', 'ABM')->count();
        $tvlStudents = DB::table('graduates')->where('strand', 'TVL')->count();
        $artsScienceStudents = DB::table('graduates')->where('strand', 'ARTS AND SCIENCE')->count();
        $humssStudents = DB::table('graduates')->where('strand', 'HUMSS')->count();



        return response()->json(['studentCounts' => [
            'stem' => $stemStudents,
            'gas' => $gasStudents,
            'abm' => $abmStudents,
            'humss' => $humssStudents,
            'tvl' => $tvlStudents,
            'arts_science' => $artsScienceStudents
        ]]);
    }

    public function getEmploymentStatusData(Request $request)
    {

        $waiting = DB::table('graduates')->where('status', 'Waiting')->count();
        $unemployed =  DB::table('graduates')->where('status', 'Unemployed')->count();
        $employed = DB::table('graduates')->where('status', 'Employed')->count();

        return response()->json(['status' => [
            'waiting' => $waiting,
            'unemployed' => $unemployed,
            'employed' => $employed
        ]]);
    }

    public function getDashboard()
    {
        return view("admin.dashboard.dashboard");
    }

    public function submitDashboard(Request $request)
    {
    }
}
