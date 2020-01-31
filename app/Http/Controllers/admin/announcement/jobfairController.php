<?php

namespace App\Http\Controllers\admin\announcement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\JobName;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;



class jobfairController extends Controller
{
    //

    public function searchJobFairData(Request $request)
    {
        $searchValue = $request->query('val');
        if (!$searchValue) {
            $searchValue = "";
        }
        $strandName = DB::table('jobfairs')
            ->where('job', 'like', '%' . $searchValue . '%')
            ->orWhere('strand', 'like', '%' . $searchValue . '%')
            ->orWhere('company', 'like', '%' . $searchValue . '%')
            ->orWhere('address', 'like', '%' . $searchValue . '%')
            ->orWhere('job_description', 'like', '%' . $searchValue . '%')
            ->orWhere('job_qualification', 'like', '%' . $searchValue . '%')
            ->orWhere('job_posted', 'like', '%' . $searchValue . '%')
            ->orWhere('job_avail', 'like', '%' . $searchValue . '%')
            ->paginate(500);

        if (!$strandName) {
            $strandName = null;
        }

        return response()->json(['search_data' => $strandName]);
    }
    public function selectJobFairStrand(Request $request)
    {
        $strandValue = $request->query('select');
        $strandData = null;

        $strandOptions = DB::table('strands')
            ->where('strand_name', $strandValue)
            ->value('strand_name');

        if ($strandOptions) {
            $strandData = DB::table('jobfairs')->where('strand', $strandOptions)
                ->orderBy('strand', 'DESC')
                ->paginate(500);
            return response()->json(['selected_strand' => $strandData]);
        } elseif (!$strandOptions) {
            return response(500)->json(['selected_strand' => $strandData]);
        }
    }


    public function getJobFairPages(Request $request)
    {
        $page = $request->query('page');
        $jobfairs = DB::table('jobfairs')->select('jobfair_id', 'job', 'strand', 'company', 'address', 'job_description', 'job_qualification', 'job_posted', 'job_avail')->orderBy('job', 'DESC')->paginate(10);
        return response()->json(['page_url' => $jobfairs]);
    }


    public function viewJobFairModal(Request $request)
    {
        $jobfairid = $request->query('id');
        $viewJobFair = DB::table('jobfairs')->where('jobfair_id', $jobfairid)->first();

        return response()->json(['view_jobfair' => $viewJobFair]);
    }

    public function editJobFairModal(Request $request, $id)
    {
        $jobfairid = $id;
        $sanitizedData = Session::get('jobfair_sanitized_data');
        $editDataReponse = DB::table('jobfairs')
            ->where('jobfair_id', $jobfairid)
            ->update([
                'jobfair_id' => Str::uuid()->toString(),
                'job' => $sanitizedData['data']['job_name'],
                'strand' => $sanitizedData['data']['job_strand'],
                'company' => $sanitizedData['data']['job_company'],
                'address' => $sanitizedData['data']['job_address'],
                'job_description' => $sanitizedData['data']['job_description'],
                'job_qualification' => $sanitizedData['data']['job_qualification'],
                'job_posted' => $sanitizedData['data']['job_posted'],
                'job_avail' => $sanitizedData['data']['job_availability']
            ]);
        Session::forget('sanitized_data');
        return response()->json(['status' => 'ok']);
    }

    public function deleteJobFairModal(Request $request, $id)
    {
        $jobfairid = $id;
        $deleteDataResponse = DB::table('jobfairs')->where('jobfair_id', $jobfairid)->delete();
        return response()->json(['status' => $deleteDataResponse]);
    }

    public function getJobFair()
    {

        $Strands = DB::table('strands')->get()->values('strand_name');

        return view('admin.announcement.jobjair', compact('Strands'));
    }
    public function addJobFair(Request $request)
    {
        $sanitizedData = Session::get('jobfair_sanitized_data');

        DB::table('jobfairs')->insert([
            'jobfair_id' => Str::uuid()->toString(),
            'job' => $sanitizedData['data']['job_name'],
            'strand' => $sanitizedData['data']['job_strand'],
            'company' => $sanitizedData['data']['job_company'],
            'address' => $sanitizedData['data']['job_address'],
            'job_description' => $sanitizedData['data']['job_description'],
            'job_qualification' => $sanitizedData['data']['job_qualification'],
            'job_posted' => $sanitizedData['data']['job_posted'],
            'job_avail' => $sanitizedData['data']['job_availability']
        ]);
        Session::forget('sanitized_data');
        return response()->json(['status' => 'ok']);
    }
}
