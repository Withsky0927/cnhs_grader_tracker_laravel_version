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
        $getUsersCount = DB::table('accounts')
            ->where('account_status', 'approved')
            ->count();

        return response()->json(['userscount' => $getUsersCount]);
    }


    /* get pending data */
    public function getPendingsNumber()
    {
        $pendingAccounts = DB::table('accounts')
            ->where('account_status', 'pending')
            ->count();

        $pendingReports = DB::table('reports')
            ->where('report_status', 'pending')
            ->count();

        $pendingNumbers = 0;

        if (!$pendingAccounts && !$pendingReports) {
            $pendingNumbers  = 0;
        } elseif (!$pendingAccounts && $pendingReports) {
            $pendingNumbers = $pendingReports;
        } elseif ($pendingAccounts && !$pendingReports) {
            $pendingNumbers = $pendingAccounts;
        } elseif ($pendingAccounts && $pendingReports) {
            $pendingNumbers = $pendingAccounts + $pendingReports;
        }


        return response()->json(['pending_count' => $pendingNumbers]);
    }

    public function getPendingAccounts(Request $request)
    {
        $pendingAccounts = DB::table('accounts')
            ->select('account_id', 'username', 'role', 'account_status')
            ->where('account_status', 'pending')
            ->orderBy('username', 'DESC')
            ->paginate(10);

        return response()->json(['pending_accounts' => $pendingAccounts]);
    }

    public function getPendingAccountsPages(Request $request)
    {
        $page = $request->query('page');
        $acccounts = DB::table('accounts')
            ->select('account_id', 'username', 'role', 'account_status')
            ->where('account_status', 'pending')
            ->orderBy('username', 'DESC')
            ->paginate(10);

        return response()->json(['page_url' => $acccounts]);
    }


    public function approveAccount(Request $request, $id)
    {

        $disapprovedID = $id;

        DB::table('accounts')
            ->where('account_id', $disapprovedID)
            ->update([
                'account_status' => 'approved'
            ]);


        return response()->json(['status' => 'ok']);
    }

    public function disapproveAccount(Request $request, $id)
    {
        $disapprovedID = $id;

        $checkTableRole = DB::table('accounts')
            ->where('account_id', $disapprovedID)
            ->value('role');

        if ($checkTableRole == 'superadmin' || $checkTableRole == 'admin') {
            DB::table('accounts')
                ->where('account_id', $disapprovedID)
                ->delete();
            DB::table('admins')
                ->where('admin_id', $disapprovedID)
                ->delete();
        } elseif ($checkTableRole == 'student') {
            DB::table('accounts')
                ->where('account_id', $disapprovedID)
                ->delete();
            DB::table('admins')
                ->where('guest_id', $disapprovedID)
                ->delete();
        }

        return response()->json(['status' => 'ok']);
    }

    public function getPendingReports(Request $request)
    {
        $pendingReports = DB::table('reports')
            ->select(
                'report_id',
                'report_type',
                'report_name',
                'report_description',
                'uploaded_by',
                'uploaded_date'
            )
            ->where('report_status', 'pending')
            ->orderBy('report_type', 'DESC')
            ->paginate(10);

        return response()->json(['pending_reports' => $pendingReports]);
    }

    public function getPendingReportsPages(Request $request)
    {
        $page = $request->query('page');
        $acccounts = DB::table('accounts')
            ->select('account_id', 'username', 'role', 'account_status')
            ->where('username', 'pending')->orderBy('username', 'DESC')
            ->paginate(10);
        return response()->json(['page_url' => $acccounts]);
    }

    public function approveReport(Request $request, $id)
    {
        $approveId = $id;

        DB::table('reports')->where('report_id', $approveId)->update([
            'report_status' => 'approved'
        ]);

        return response()->json(['status' => 'ok']);
    }

    public function disapproveReport(Request $request, $id)
    {
        $disapprovedID = $id;

        DB::table('reports')
            ->where('report_id', $disapprovedID)
            ->delete();

        DB::table('reports_document')
            ->where('report_document_id', $disapprovedID)
            ->delete();
        return response()->json(['status' => 'ok']);
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
}
