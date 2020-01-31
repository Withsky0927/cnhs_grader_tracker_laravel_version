<?php

namespace App\Http\Middleware\admin\announcement\scholarship;

use Closure;
use Illuminate\Support\Facades\Validator;

class validateScholarshipData
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

        $Check = Validator::make($request->all(), [
            'school' => [
                'required',
                'string',
                'between:2,50',
                function ($attribute, $value, $fail) {
                    $regex = '/^\d|^[@.#!#$%^&*()|;:<>\/{}\-\+]|^\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid school name: Numeric, Special character and space as first entry is not allowed');
                    }
                }
            ],

            'scholarshipDescription' => [
                'required',
                'string',
                'between:10,1024',
                function ($attribute, $value, $fail) {
                    $regex = '/^[@.#!#$%^&*()|;:<>\/{}\-\+]|^\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid scholarship Description: Special character and space as first entry is not allowed');
                    }
                }
            ],
            'scholarshipRequirements' => [
                'required',
                'string',
                'between:10,1024',
                function ($attribute, $value, $fail) {
                    $regex = '/^[@.#!#$%^&*()|;:<>\/{}\-\+]|^\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid scholarship Requirements: Special character and space as first entry is not allowed');
                    }
                }
            ],
            'grade' => 'required|numeric|digits_between:2,7',
            'schoolLink' => 'nullable|url|between:5,150',

        ]);

        if ($Check->fails()) {
            return response()->json(['errors' => $Check->errors()->all()]);
        } else {
            return $next($request);
        }
    }
}
