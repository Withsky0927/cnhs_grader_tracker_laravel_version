<?php

namespace App\Http\Middleware\admin\reports;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class sanitizeReportsData
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

        $loginusername = Session::get('login_username');



        Session::put('reports_sanitized_data', ['data' => [
            'report_id' => Str::uuid()->toString(),
            'report_name' => htmlspecialchars(trim($toBeSanitized['add_reports_name'])),
            'report_type' => htmlspecialchars(trim($toBeSanitized['add_reports_type'])),
            'report_description' => htmlspecialchars(trim($toBeSanitized['add_reports_description'])),
            'uploaded_by' => $loginusername,
        ]]);
        return $next($request);
    }
}
