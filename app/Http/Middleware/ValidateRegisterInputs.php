<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;

class ValidateRegisterInputs
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


        $ValidateCheck = Validator::make($request->all(), [
            'profile_pic' => 'mimes:jpeg,png|image|required|between:1,5000',
            'username' => [
                'required',
                'between:10,50',
                'string',
                function ($attribute, $value, $fail) {
                    $regex = '/^\d|^[@.#!#$%^&*()|;:<>\/{}\-\+]|\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Username: Numeric, Special character as first entry and space is not allowed');
                    }
                }
            ],
            'password' => [
                'required',
                'between:8,150',
                'string',
                function ($attribute, $value, $fail) {
                    $regex = '/^\d|^[@.#!#$%^&*()|;:<>\/{}\-\+]|\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Password: Numeric, Special character as first entry and space is not allowed');
                    }
                }
            ],
            'confirmPassword' => [
                'required',
                'between:8,150',
                'string',
                function ($attribute, $value, $fail) {
                    $regex = '/^\d|^[@.#!#$%^&*()|;:<>\/{}\-\+]|\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Confirm Password: Numeric, Special character as first entry and space is not allowed');
                    }
                }
            ],
            'lrn' => [
                'required',
                'numeric',
                'integer',
                'digits_between:7,15',
            ],
            'strand' => [
                'required',
                'string',
                'max:20',
                function ($attribute, $value, $fail) {
                    $regex = '/^\d|^[@.#!#$%^&*()|;:<>\/{}\-\+]|\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Password: Numeric, Special character as first entry and space is not allowed');
                    }
                }
            ],
            'email' => 'required|email|max:255',
            'phone' => [
                'required',
                'string',
                'between:10,20',
                function ($attribute, $value, $fail) {
                    $regex = '/^\s/';
                    if (preg_match($regex, $value)) {
                        $fail('Invalid Phone: Space as first entry and space is not allowed');
                    }
                }
            ],
            'firstname' => [
                'required',
                'string',
                'between:2,30',
                function ($attribute, $value, $fail) {
                    $regex = '/^\s|$\s|\d|[@.#!#$%^&*()|;:<>\/{}\-\+]/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid firstname: Space as first entry, Special Character, and Number is not allowed');
                    }
                }
            ],
            'middlename' => [
                'required',
                'string',
                'between:2,30',
                function ($attribute, $value, $fail) {
                    $regex = '/^\s|$\s|\d|[@.#!#$%^&*()|;:<>\/{}\-\+]/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid midddlename: Space as first entry, Special Character, and Number is not allowed');
                    }
                }
            ],
            'lastname' => [
                'required',
                'string',
                'between:2,30',
                function ($attribute, $value, $fail) {
                    $regex = '/^\s|$\s|\d|[@.#!#$%^&*()|;:<>\/{}\-\+]/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Lastname: Space as first entry, Special Character, and Number is not allowed');
                    }
                }

            ],
            'address' => [
                'required',
                'string',
                'max:200',
                function ($attribute, $value, $fail) {
                    $regex = '/^[@.#!#$%^&*()|;:<>\/{}\-\+]|^\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Address: Space, Special Character as first entry is not allowed');
                    }
                }
            ],
            'month' => 'required|numeric|digits:2',
            'day' => 'required|numeric|digits:2',
            'year' => 'required|numeric|digits:4',
            'age' => 'required|numeric|digits_between:2,3',
            'gender' => [
                'required',
                'string',
                'max:15',
                function ($attribute, $value, $fail) {
                    $regex = '/^\s|$\s|\d|[@.#!#$%^&*()|;:<>\/{}\-\+]/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Gender: Space as first entry, Special Character, and Number is not allowed');
                    }
                }
            ],
            'civilStatus' => [
                'required',
                'string',
                'max:20',
                function ($attribute, $value, $fail) {
                    $regex = '/^\s|$\s|\d|[@.#!#$%^&*()|;:<>\/{}\-\+]/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Civil status: Space as first entry, Special Character, and Number is not allowed');
                    }
                }
            ],
            'status' => [
                'required',
                'string',
                'max:15',
                function ($attribute, $value, $fail) {
                    $regex = '/^\s|$\s|\d|[@.#!#$%^&*()|;:<>\/{}\-\+]/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Status: Space as first entry, Special Character, and Number is not allowed');
                    }
                }
            ]
        ]);

        if ($ValidateCheck->fails()) {

            return redirect('register')
                ->withErrors($ValidateCheck)
                ->withInput();
        }

        return $next($request);
    }
}
