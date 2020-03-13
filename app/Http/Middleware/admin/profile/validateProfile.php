<?php

namespace App\Http\Middleware\admin\profile;

use Closure;
use Illuminate\Support\Facades\Validator;

class validateProfile
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


        $rules = [
            'username' => [
                'nullable',
                'string',
                'between:2,50',
                function ($attribute, $value, $fail) {
                    $regex = '/^\d|^[@.#!#$%^&*()|;:<>\/{}\-\+]|^\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Username: Numeric, Special character and space as first entry is not allowed');
                    }
                }
            ],
            'phone' => [
                'nullable',
                'numeric',
                'digits_between:10,20',
                function ($attribute, $value, $fail) {
                    $regex = '/^\s/';
                    if (preg_match($regex, $value)) {
                        $fail('Invalid Phone: Space as first entry and space is not allowed');
                    }
                }
            ],
            'profile_pic' => 'required_without:mimes:jpeg,png,image,between:1,5000,string',
            'email' => 'nullable|email|max:150',
        ];

        $profileData = $request->all();

        $validationResult = Validator::make($profileData, $rules);


        if ($validationResult->fails()) {
            return response()->json(['errors' => $validationResult->errors()->all()]);
        } else {
            return $next($request);
        }
    }
}
