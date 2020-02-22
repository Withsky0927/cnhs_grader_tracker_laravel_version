<?php

namespace App\Http\Middleware\admin\announcement\examination;

use Closure;
use Illuminate\Support\Facades\Validator;

class validateExaminationData
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
                        $fail('Invalid School Name: Numeric, Special character and space as first entry is not allowed');
                    }
                }
            ],
            'examDescription' => [
                'required',
                'string',
                'between:10,1024',
                function ($attribute, $value, $fail) {
                    $regex = '/^[@.#!#$%^&*()|;:<>\/{}\-\+]|^\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Examination Description: Special character and space as first entry is not allowed');
                    }
                }
            ],
            'examinationDate' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $regex = '/^[@.#!#$%^&*()|;:<>\/{}\+]|\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Examination Date: Special character and space as first entry is not allowed');
                    }
                }
            ],

        ]);

        if ($Check->fails()) {
            return response()->json(['errors' => $Check->errors()->all()]);
        } else {
            return $next($request);
        }
    }
}
