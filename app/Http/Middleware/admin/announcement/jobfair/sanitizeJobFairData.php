<?php

namespace App\Http\Middleware\admin\announcement\jobfair;

use Closure;
use Illuminate\Support\Facades\Session;

class sanitizeJobFairData
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


        Session::put('sanitized_data', ['data' => [
            'job_name' => htmlspecialchars(trim($toBeSanitized['jobName'])),
            'job_strand' => htmlspecialchars(trim($toBeSanitized['jobStrand'])),
            'job_company' => htmlspecialchars(trim($toBeSanitized['jobCompany'])),
            'job_address' => htmlspecialchars(trim($toBeSanitized['jobAddress'])),
            'job_description' => htmlspecialchars(trim($toBeSanitized['jobDescription'])),
            'job_qualification' => htmlspecialchars(trim($toBeSanitized['jobQualification'])),
            'job_posted' => trim($toBeSanitized['jobPosted']),
            'job_availability' => trim($toBeSanitized['jobAvailability'])
        ]]);

        return $next($request);
    }
}
