<?php

namespace App\Http\Middleware\admin\reports;

use Closure;
use Illuminate\Support\Facades\Validator;

class validateUpdatedReport
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        /*
            spreadsheet:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
            spreedsheet: application/excel

            odp: application/vnd.oasis.opendocument.presentation
            ods: application/vnd.oasis.opendocument.spreadsheet
            odf: application/vnd.oasis.opendocument.formula

            kwd: application/x-kword
            ksp: application/x-kspread
            chrt: application/x-kchart
            doc: application/msword
            docx: application/vnd.openxmlformats-officedocument.wordprocessingml.document
            pdf: application/pdf

            powerpoint: application/powerpoint
            powerpoint: application/vnd.openxmlformats-officedocument.presentationml.presentation
        */
        $messages =  [
            'edit_reports_name.required' => 'Report Name is Required!',
            'edit_reports_name.string' => 'Report Name needs to be string',
            'add_reports_name.between:2,50' => 'Report Name length needs to be between 2 to 50 characters',

            'edit_reports_type.required' => 'Report Type is Required!',
            'edit_reports_type.string' => 'Report Type needs to be string',
            'edit_reports_type.between:2,50' => 'Report Type length needs to be between 2 to 50 characters',

            'edit_reports_description.required' => 'Report Description is Required!',
            'edit_reports_description.string' => 'Report Description needs to be string',
            'edit_reports_description.between:2,1024' => 'Report Description length needs to be between 2 to 1024 characters',

            'Document.mimes:pdf,docx,doc,ods,odp,xlsx,ppt,xlsx,xls,docm' => 'Document must be a file type of pdf,docx,doc,ods,odp,xlsx,ppt,xlsx,xls,docm!',
            'Document.max:10240' => 'Document must not be greater than 10MB!'
        ];
        $rules = [
            'edit_reports_name' => [
                'required',
                'string',
                'between:2,50',
                function ($attribute, $value, $fail) {
                    $regex = '/^\d|^[@.#!#$%^&*()|;:<>\/{}\-\+]|^\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Report Name: Numeric, Special character and space as first entry is not allowed');
                    }
                }
            ],
            'edit_reports_type' => [
                'required',
                'string',
                'between:2,50',
                function ($attribute, $value, $fail) {
                    $regex = '/^\d|^[@.#!#$%^&*()|;:<>\/{}\-\+]|^\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Report type: Numeric, Special character and space as first entry is not allowed');
                    }
                }
            ],
            'edit_reports_description' => [
                'required',
                'string',
                'between:2,1024',
                function ($attribute, $value, $fail) {
                    $regex = '/^[@#!#$%^&*()|;:\/{}\-\+]|^\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Report Description: Numeric, Special character and space as first entry is not allowed');
                    }
                }
            ],
            'edit_reports_document' => 'mimes:pdf,docx,doc,ods,odp,xlsx,ppt,xlsx,xls,docm|max:10240'
        ];


        $validateReports = Validator::make($request->all(), $rules, $messages);


        if ($validateReports->fails()) {
            return response()->json(['errors' => $validateReports->errors()->all()]);
        } else {
            return $next($request);
        }
    }
}
