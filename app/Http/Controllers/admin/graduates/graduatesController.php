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


    public function getGraduateStudent(Request $request)
    {
        $lrn = $request->query('lrn');
        $viewStudent = DB::table('graduates')->where('lrn', $lrn)->first();

        return response()->json(['view_graduate' => $viewStudent]);
    }

    public function getGraduatePages(Request $request)
    {
        $page = $request->query('page');
        $lrn = $request->query('lrn');
        $graduates = DB::table('graduates')->select('profile_pic', 'lrn', 'strand', 'firstname', 'middlename', 'lastname', 'address', 'birthday', 'age', 'gender', 'gender', 'civil_status', 'status')->orderBy('lrn')->paginate(10);
        return response()->json(['page_url' => $graduates]);
    }

    public function getGraduates()
    {
        return view('admin.graduates.graduates');
    }
    public function addGraduates(Request $request)
    {
    }
}
