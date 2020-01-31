<?php

namespace App\Http\Middleware\admin\announcement\scholarship;

use Closure;
use Illuminate\Support\Facades\Session;

class sanitizeScholarshipData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    /*
     $table->uuid('scholarship_id');
        $table->primary('scholarship_id');
        $table->string('school_name', 30);
        $table->longText('scholarship_desc');
        $table->longText('scholarship_req');
        $table->integer('grade');
        $table->string('school_link', 50);  
     
     
     */
    public function handle($request, Closure $next)
    {
        $toBeSanitized = $request->all();

        Session::put('scholarships_sanitized_data', ['data' => [
            'school_name' => htmlspecialchars(trim($toBeSanitized['school'])),
            'scholarship_desc' => htmlspecialchars(trim($toBeSanitized['scholarshipDescription'])),
            'scholarship_req' => htmlspecialchars(trim($toBeSanitized['scholarshipRequirements'])),
            'grade' => htmlspecialchars(trim($toBeSanitized['grade'])),
            'school_link' => htmlspecialchars(trim($toBeSanitized['schoolLink'])),
        ]]);

        return $next($request);
    }
}
