<?php

namespace App\Http\Middleware\admin\announcement\jobfair;

use Closure;
use Illuminate\Support\Facades\Validator;

class validateJobFairData
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
            'jobName' => [
                'required',
                'string',
                'between:2,30',
                function ($attribute, $value, $fail) {
                    $regex = '/^\d|^[@.#!#$%^&*()|;:<>\/{}\-\+]|^\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Job Name: Numeric, Special character and space as first entry is not allowed');
                    }
                }
            ],
            'jobStrand' => [
                'required',
                'string',
                'between:2,30',
                function ($attribute, $value, $fail) {
                    $regex = '/^[@.#!#$%^&*()|;:<>\/{}\-\+]|^\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Strand: Numeric, Special character and space as first entry is not allowed');
                    }
                }
            ],
            'jobCompany' => [
                'required',
                'string',
                'between:2,30',
                function ($attribute, $value, $fail) {
                    $regex = '/^[@.#!#$%^&*()|;:<>\/{}\-\+]|^\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Company: Special character and space as first entry is not allowed');
                    }
                }
            ],
            'jobAddress' => [
                'required',
                'string',
                'between:5,500',
                function ($attribute, $value, $fail) {
                    $regex = '/^[@.#!#$%^&*()|;:<>\/{}\-\+]|^\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Address: Special character and space as first entry is not allowed');
                    }
                }
            ],
            'jobDescription' => [
                'required',
                'string',
                'between:10,1024',
                function ($attribute, $value, $fail) {
                    $regex = '/^[@.#!#$%^&*()|;:<>\/{}\-\+]|^\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Job Description: Special character and space as first entry is not allowed');
                    }
                }
            ],
            'jobQualification' => [
                'required',
                'string',
                'between:10,1024',
                function ($attribute, $value, $fail) {
                    $regex = '/^[@.#!#$%^&*()|;:<>\/{}\-\+]|^\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Job Qualication: Special character and space as first entry is not allowed');
                    }
                }
            ],
            'jobPosted' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $regex = '/^[@.#!#$%^&*()|;:<>\/{}\+]|\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Job Posted: Special character and space as first entry is not allowed');
                    }
                }

            ],
            'jobAvailability' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $regex = '/^[@.#!#$%^&*()|;:<>\/{}\+]|\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Job Availability: Special character and space as first entry is not allowed');
                    }
                }
            ]
        ]);

        if ($Check->fails()) {
            return response()->json(['errors' => $Check->errors()->all()]);
        } else {
            return $next($request);
        }
    }
}
