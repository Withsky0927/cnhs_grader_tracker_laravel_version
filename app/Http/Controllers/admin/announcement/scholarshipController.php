<?php

namespace App\Http\Controllers\admin\announcement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class scholarshipController extends Controller
{

    /*
        $table->uuid('scholarship_id');
        $table->primary('scholarship_id');
        $table->string('school_name', 30);
        $table->longText('scholarship_desc');
        $table->longText('scholarship_req');
        $table->integer('grade');
        $table->string('school_link', 50);
    */

    public function searchScholarshipData(Request $request)
    {
        $searchValue = $request->query('val');
        if (!$searchValue) {
            $searchValue = "";
        }
        $ScholarshipsName = DB::table('scholarships')
            ->where('school_name', 'like', '%' . $searchValue . '%')
            ->orWhere('scholarship_desc', 'like', '%' . $searchValue . '%')
            ->orWhere('scholarship_req', 'like', '%' . $searchValue . '%')
            ->orWhere('grade', 'like', '%' . $searchValue . '%')
            ->orWhere('school_link', 'like', '%' . $searchValue . '%')
            ->paginate(500);

        if (!$ScholarshipsName) {
            $ScholarshipsName = null;
        }

        return response()->json(['search_data' => $ScholarshipsName]);
    }
    public function selectScholarshipName(Request $request)
    {
        $scholarvalue = $request->query('select');
        $scholarData = null;

        $scholarOptions = DB::table('scholarship_programs')
            ->where('school_name', $scholarvalue)
            ->value('school_name');

        if ($scholarOptions) {
            $scholarData = DB::table('scholarships')->where('school_name', $scholarOptions)
                ->orderBy('school_name', 'DESC')
                ->paginate(500);
            return response()->json(['selected_scholarships' => $scholarData]);
        } elseif (!$scholarOptions) {
            return response(500)->json(['selected_scholarships' => $scholarData]);
        }
    }


    public function getScholarshipPages(Request $request)
    {
        $page = $request->query('page');
        $scholarships = DB::table('scholarships')->select('scholarship_id', 'school_name', 'scholarship_desc', 'scholarship_req', 'grade', 'school_link')->orderBy('school_name', 'DESC')->paginate(10);
        return response()->json(['page_url' => $scholarships]);
    }


    public function viewScholarshipModal(Request $request)
    {
        $scholarid = $request->query('id');
        $viewScholar = DB::table('scholarships')->where('scholarship_id', $scholarid)->first();

        return response()->json(['view_scholarships' => $viewScholar]);
    }

    public function editScholarshipModal(Request $request, $id)
    {
        $scholarid = $id;
        $sanitizedData = Session::get('scholarships_sanitized_data');
        $editDataReponse = DB::table('scholarships')
            ->where('scholarship_id', $scholarid)
            ->update([
                'scholarship_id' => Str::uuid()->toString(),
                'school_name' => $sanitizedData['data']['school_name'],
                'scholarship_desc' => $sanitizedData['data']['scholarship_desc'],
                'scholarship_req' => $sanitizedData['data']['scholarship_req'],
                'grade' => $sanitizedData['data']['grade'],
                'school_link' => $sanitizedData['data']['school_link'],

            ]);
        Session::forget('scholarships_sanitized_data');
        return response()->json(['status' => 'ok']);
    }

    public function deleteScholarshipModal(Request $request, $id)
    {
        $scholarid = $id;
        $deleteDataResponse = DB::table('scholarships')->where('scholarship_id', $scholarid)->delete();
        return response()->json(['status' => $deleteDataResponse]);
    }


    public function getScholarship()
    {
        $scholarshipData = DB::table('scholarship_programs')->get()->values('school_name');
        return view('admin.announcement.scholarship', compact('scholarshipData'));
    }

    public function addScholarship(Request $request)
    {
        $sanitizedData = Session::get('scholarships_sanitized_data');

        DB::table('scholarships')->insert([
            'scholarship_id' => Str::uuid()->toString(),
            'school_name' => $sanitizedData['data']['school_name'],
            'scholarship_desc' => $sanitizedData['data']['scholarship_desc'],
            'scholarship_req' => $sanitizedData['data']['scholarship_req'],
            'grade' => $sanitizedData['data']['grade'],
            'school_link' => $sanitizedData['data']['school_link'],
        ]);
        Session::forget('sanitized_data');
        return response()->json(['status' => 'ok']);
    }
}
