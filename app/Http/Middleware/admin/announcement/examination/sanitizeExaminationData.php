<?php

namespace App\Http\Middleware\admin\announcement\examination;

use Closure;
use Illuminate\Support\Facades\Session;

class sanitizeExaminationData
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

        /*
            $table->uuid('exam_id');
            $table->primary('exam_id');
            $table->string('school', 100);
            $table->text('exam_description');
            $table->date('examination_date');

        */
        Session::put('exam_sanitized_data', ['data' => [
            'school' => htmlspecialchars(trim($toBeSanitized['school'])),
            'exam_description' => htmlspecialchars(trim($toBeSanitized['examDescription'])),
            'examination_date' => htmlspecialchars(trim($toBeSanitized['examinationDate'])),
        ]]);
        return $next($request);
    }
}
