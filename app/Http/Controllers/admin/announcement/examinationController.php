<?php

namespace App\Http\Controllers\admin\announcement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;




class examinationController extends Controller
{
    /*

            $table->uuid('exam_id');
            $table->primary('exam_id');
            $table->string('school', 100);
            $table->text('exam_description');
            $table->date('examination_date');
    */

    public function searchExaminationData(Request $request)
    {
        $searchValue = $request->query('val');
        if (!$searchValue) {
            $searchValue = "";
        }
        $examinationName = DB::table('exams')
            ->where('school', 'like', '%' . $searchValue . '%')
            ->orWhere('exam_description', 'like', '%' . $searchValue . '%')
            ->orWhere('examination_date', 'like', '%' . $searchValue . '%')
            ->paginate(500);

        if (!$examinationName) {
            $examinationName = null;
        }

        return response()->json(['search_data' => $examinationName]);
    }
    public function selectSchoolName(Request $request)
    {
        $examValue = $request->query('select');
        $examData = null;

        $schoolOptions = DB::table('schools')
            ->where('school_name', $examValue)
            ->value('school_name');

        if ($schoolOptions) {
            $examData = DB::table('exams')->where('school', $schoolOptions)
                ->orderBy('school', 'DESC')
                ->paginate(500);
            return response()->json(['selected_school' => $examData]);
        } elseif (!$schoolOptions) {
            return response(500)->json(['selected_school' => $examData]);
        }
    }


    public function getExaminationPages(Request $request)
    {
        $page = $request->query('page');
        $examinations = DB::table('exams')->select('exam_id', 'school', 'exam_description', 'examination_date')->orderBy('school', 'DESC')->paginate(10);
        return response()->json(['page_url' => $examinations]);
    }


    public function viewExaminationModal(Request $request)
    {
        $examid = $request->query('id');
        $viewExam = DB::table('exams')->where('exam_id', $examid)->first();

        return response()->json(['view_examinations' => $viewExam]);
    }

    public function editExaminationModal(Request $request, $id)
    {
        $examid = $id;
        $sanitizedData = Session::get('exam_sanitized_data');
        $editDataReponse = DB::table('exams')
            ->where('exam_id', $examid)
            ->update([
                'exam_id' => Str::uuid()->toString(),
                'school' => $sanitizedData['data']['school'],
                'exam_description' => $sanitizedData['data']['exam_description'],
                'examination_date' => $sanitizedData['data']['examination_date'],

            ]);
        Session::forget('exam_sanitized_data');
        return response()->json(['status' => 'ok']);
    }

    public function deleteExaminationModal(Request $request, $id)
    {
        $examid = $id;
        $deleteDataResponse = DB::table('exams')->where('exam_id', $examid)->delete();
        return response()->json(['status' => $deleteDataResponse]);
    }
    public function getExamination()
    {
        $examinationData = DB::table('schools')->get()->values('school_name');

        return view('admin.announcement.examination', compact('examinationData'));
    }

    public function addExamination(Request $request)
    {
        $sanitizedData = Session::get('exam_sanitized_data');

        DB::table('exams')->insert([
            'exam_id' => Str::uuid()->toString(),
            'school' => $sanitizedData['data']['school'],
            'exam_description' => $sanitizedData['data']['exam_description'],
            'examination_date' => $sanitizedData['data']['examination_date'],
        ]);
        Session::forget('sanitized_data');
        return response()->json(['status' => 'ok']);
    }
}
