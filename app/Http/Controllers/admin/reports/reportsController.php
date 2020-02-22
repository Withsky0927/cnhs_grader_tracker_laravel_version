<?php

namespace App\Http\Controllers\admin\reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;



class reportsController extends Controller
{

    public function searchReportData(Request $request)
    {
        $searchValue = $request->query('val');
        if (!$searchValue) {
            $searchValue = "";
        }
        $reportName = DB::table('reports')
            ->where('report_name', 'like', '%' . $searchValue . '%')
            ->orWhere('report_type', 'like', '%' . $searchValue . '%')
            ->orWhere('report_description', 'like', '%' . $searchValue . '%')
            ->orWhere('uploaded_by', 'like', '%' . $searchValue . '%')
            ->orWhere('uploaded_date', 'like', '%' . $searchValue . '%')
            ->orWhere('updated_date', 'like', '%' . $searchValue . '%')
            ->paginate(500);

        if (!$reportName) {
            $reportName = null;
        }

        return response()->json(['search_data' => $reportName]);
    }

    public function selectReportType(Request $request)
    {
        $reportValue = $request->query('select');
        $reportData = null;

        $reportOptions = DB::table('reports_type')
            ->where('report_type', $reportValue)
            ->value('report_type');

        if ($reportOptions) {
            $reportData = DB::table('reports')->where('report_type', $reportOptions)
                ->orderBy('report_type', 'DESC')
                ->paginate(500);
            return response()->json(['selected_reports' => $reportData]);
        } elseif (!$reportOptions) {
            return response(500)->json(['selected_reports' => $reportData]);
        }
    }


    public function getReportPages(Request $request)
    {
        $page = $request->query('page');
        $reports = DB::table('reports')->select('report_id', 'report_name', 'report_type', 'report_description', 'uploaded_by', 'uploaded_date', 'updated_date')->where('report_status', 'approved')->orderBy('report_type', 'DESC')->paginate(10);
        return response()->json(['page_url' => $reports]);
    }


    public function downloadReport(Request $request)
    {

        $reportId = $request->query('id');
        $Document = DB::table('report_documents')->where('report_document_id', $reportId)->get();

        return response()->json(['document' => $Document]);
    }

    public function viewReportModal(Request $request)
    {
        $reportid = $request->query('id');
        Session::put('updated_report_id', $reportid);
        $viewReport = DB::table('reports')->where('report_id', $reportid)->first();
        $reportDocumentName = DB::table('report_documents')->where('report_document_id', $reportid)->first();

        return response()->json(['view_reports' => ['data' => [$viewReport, $reportDocumentName]]]);
    }

    public function editReportModal(Request $request, $id)
    {

        $reportsid = $id;
        $oldDate = DB::table('reports')->where('report_id', $reportsid)->values('uploaded_date');
        $sanitizedData = Session::get('reports_sanitized_data');
        $editDataReponse = DB::table('reports')
            ->where('report_id', $reportsid)
            ->update([
                'report_id' => Str::uuid()->toString(),
                'report_name' => $sanitizedData['data']['report_name'],
                'report_type' => $sanitizedData['data']['report_type'],
                'report_description' => $sanitizedData['data']['report_description'],
                'report_status' => 'approved',
                'uploaded_by' => $sanitizedData['data']['uploaded_by'],
                'uploaded_date' => $oldDate,
                'updated_date' => date('Y-m-d')
            ]);

        Session::forget('reports_sanitized_data');
        Session::forget('updated_report_id');
        return response()->json(['status' => 'ok']);
    }

    public function deleteReportModal(Request $request, $id)
    {
        $reportid = $id;
        DB::table('report_documents')->where('report_document_id', $reportid)->delete();
        $deleteDataResponse = DB::table('reports')->where('report_id', $reportid)->delete();
        return response()->json(['status' => $deleteDataResponse]);
    }

    public function getReport()
    {
        $reportsData = DB::table('reports_type')->get()->values('report_type');
        return view("admin.reports.reports", compact('reportsData'));
    }

    public function submitReport(Request $request)
    {
        $sanitizedData = Session::get('reports_sanitized_data');
        $reportStatus = Session::get('report_status');

        DB::table('reports')->insert([
            'report_id' => $sanitizedData['data']['report_id'],
            'report_name' => $sanitizedData['data']['report_name'],
            'report_type' => $sanitizedData['data']['report_type'],
            'report_description' => $sanitizedData['data']['report_description'],
            'report_status' => $reportStatus,
            'uploaded_by' => $sanitizedData['data']['uploaded_by'],
            'uploaded_date' => date('Y-m-d'),
        ]);

        Session::forget('reports_sanitized_data');
        Session::forget('report_status');


        return response()->json(['status' => 'ok']);
    }
}
