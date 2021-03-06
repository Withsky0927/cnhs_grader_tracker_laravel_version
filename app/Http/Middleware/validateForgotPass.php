<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;

class validateForgotPass
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
        $notification = Validator::make($request->all(), [
            'username' => [
                'required',
                'between:5,50',
                'string',
                function ($attribute, $value, $fail) {
                    $regex = '/^\d|^[@.#!#$%^&*()|;:<>\/{}\-\+]|\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Username: Numeric, Special character as first entry and space is not allowed');
                    }
                }
            ],
            'new_password' => [
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
            'confirm_old_password' => [
                'required',
                'between:8,150',
                'string',
                function ($attribute, $value, $fail) {
                    $regex = '/^\d|^[@.#!#$%^&*()|;:<>\/{}\-\+]|\s/';
                    if (preg_match_all($regex, $value)) {
                        $fail('Invalid Password: Numeric, Special character as first entry and space is not allowed');
                    }
                }
            ]
        ]);

        if ($notification->fails()) {

            return back()
                ->withErrors($notification)
                ->withInput();
        }
        return $next($request);
    }
}
