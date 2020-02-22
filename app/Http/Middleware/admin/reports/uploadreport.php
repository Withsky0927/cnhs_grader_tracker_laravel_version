<?php

namespace App\Http\Middleware\admin\reports;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class uploadreport
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

        $report = $request->file('Document');
        $reportsData = Session::get('reports_sanitized_data');

        $reportID = $reportsData['data']['report_id'];


        $reportRealPath = $report->getRealPath();
        $toBlob = file_get_contents($reportRealPath);

        $fullFileName = $report->getClientOriginalName();
        $encodeToBase64 = base64_encode($toBlob);

        $getOriginalFileName = pathinfo($fullFileName, PATHINFO_FILENAME);
        $extension = pathinfo($fullFileName, PATHINFO_EXTENSION);

        $fileNameToDB = $getOriginalFileName . '-' . time() . '.' . $extension;

        $mimeType = $report->getClientMimeType();

        DB::table('report_documents')->insert([
            'report_document_id' => $reportID,
            'report_document' => $encodeToBase64,
            'report_document_name' => $fileNameToDB,
            'report_mime' => $mimeType,
        ]);


        return $next($request);
    }
}
