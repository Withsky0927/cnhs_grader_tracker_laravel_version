<?php

namespace App\Http\Controllers\admin\graduates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class graduatesController extends Controller
{
    //

    public function searchStudentData(Request $request)
    {
        $searchValue = $request->query('val');
        $strandName = DB::table('graduates')
            ->where('lrn', 'like', '%' . $searchValue . '%')
            ->orWhere('strand', 'like', '%' . $searchValue . '%')
            ->orWhere('firstname', 'like', '%' . $searchValue . '%')
            ->orWhere('middlename', 'like', '%' . $searchValue . '%')
            ->orWhere('lastname', 'like', '%' . $searchValue . '%')
            ->orWhere('address', 'like', '%' . $searchValue . '%')
            ->orWhere('birthday', 'like', '%' . $searchValue . '%')
            ->orWhere('age', 'like', '%' . $searchValue . '%')
            ->orWhere('gender', 'like', '%' . $searchValue . '%')
            ->orWhere('civil_status', 'like', '%' . $searchValue . '%')
            ->orWhere('status', 'like', '%' . $searchValue . '%')
            ->paginate(10);

        if (!$strandName) {
            $strandName = null;
        }

        return response()->json(['search_data' => $strandName]);
    }

    public function selectStudentStrand(Request $request)
    {
        $strandValue = $request->query('select');
        $strandData = null;

        $strandOptions = DB::table('strands')
            ->where('strand_name', $strandValue)
            ->value('strand_name');



        if ($strandOptions) {
            $strandData = DB::table('graduates')->where('strand', $strandOptions)
                ->orderBy('lrn', 'ASC')
                ->paginate(10);
            return response()->json(['selected_strand' => $strandData]);
        } elseif (!$strandOptions) {
            return response()->json(['selected_strand' => $strandData]);
        }
    }

    public function getGraduateStudent(Request $request)
    {
        $lrn = $request->query('lrn');
        $viewStudent = DB::table('graduates')->where('lrn', $lrn)->first();

        return response()->json(['view_graduate' => $viewStudent]);
    }

    public function getGraduatePages(Request $request)
    {
        $page = $request->query('page');
        $graduates = DB::table('graduates')->select('profile_pic', 'lrn', 'strand', 'firstname', 'middlename', 'lastname', 'address', 'birthday', 'age', 'gender', 'gender', 'civil_status', 'status')->orderBy('lrn', 'ASC')->paginate(10);
        return response()->json(['page_url' => $graduates]);
    }

    public function getGraduates()
    {

        $Strands = DB::table('strands')->select('strand_name')->get();
        return view('admin.graduates.graduates', compact('Strands'));
    }
    public function addGraduates(Request $request)
    {
    }
}
