<?php

namespace App\Http\Middleware\admin\reports;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class sanitizeUpdatedReport
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
        $toBeSanitized = $request->all();
        $reportID = Session::get('updated_report_id');

        Session::put('reports_sanitized_data', ['data' => [
            'report_id' => $reportID,
            'report_name' => htmlspecialchars(trim($toBeSanitized['edit_reports_name'])),
            'report_type' => htmlspecialchars(trim($toBeSanitized['edit_reports_type'])),
            'report_description' => htmlspecialchars(trim($toBeSanitized['edit_reports_description'])),
            'uploaded_by' => 'superadmin',
        ]]);
        return $next($request);
    }
}
