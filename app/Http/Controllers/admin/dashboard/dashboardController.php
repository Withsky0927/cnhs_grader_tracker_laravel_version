<?php

namespace App\Http\Controllers\admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class dashboardController extends Controller
{

    /*
     *  get all notification icon numbers
     */
    public function getUsersNumber()
    {
        $getUsersCount = DB::table('accounts')->where('account_status', 'approved')->count();

        return response()->json(['userscount' => $getUsersCount]);
    }


    public function getPendingsNumber()
    {
        $pendingAccounts = DB::table('accounts')->where('account_status', 'pending')->count();
        //$pendingReports = DB::table('reports')->where('report_status' ,'pending')->count();

        $PendintNumbers = $pendingAccounts +  0;



        return response()->json(['pending_count' => $PendintNumbers]);
    }

    public function getNotifyNumber()
    {
    }

    /*
     *  get all data for graphs
    */

    public function getGraduatesGraphData(Request $request)
    {
        $currentYear = (date('Y') - 1) . '-' . date('Y');

        $stemStudents = DB::table('graduates')
            ->where('strand', '=', 'STEM')
            ->where('batch', '=', $currentYear)
            ->count();

        $gasStudents = DB::table('graduates')
            ->where('strand', '=', 'GAS')
            ->where('batch', '=', $currentYear)
            ->count();

        $abmStudents = DB::table('graduates')
            ->where('strand', '=', 'ABM')
            ->where('batch', '=', $currentYear)
            ->count();
        $tvlStudents = DB::table('graduates')
            ->where('strand', '=', 'TVL')
            ->where('batch', '=', $currentYear)
            ->count();
        $artsScienceStudents = DB::table('graduates')
            ->where('strand', '=', 'ARTS AND SCIENCE')
            ->where('batch', '=', $currentYear)
            ->count();
        $humssStudents = DB::table('graduates')
            ->where('strand', '=', 'HUMSS')
            ->where('batch', '=', $currentYear)
            ->count();

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
        $currentYear = (date('Y') - 1) . '-' . date('Y');
        $waiting = DB::table('graduates')
            ->where('status', '=', 'Waiting')
            ->where('batch', '=', $currentYear)
            ->count();
        $unemployed =  DB::table('graduates')
            ->where('status', '=', 'Unemployed')
            ->where('batch', '=', $currentYear)
            ->count();
        $employed = DB::table('graduates')
            ->where('status', '=', 'Employed')
            ->where('batch', '=', $currentYear)
            ->count();

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
