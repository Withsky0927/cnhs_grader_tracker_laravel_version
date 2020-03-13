<?php

namespace App\Http\Middleware\admin\profile;

use Closure;
use Illuminate\Support\Facades\Session;


class sanitizeProfile
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
        $tobeSanitizedData = $request->all();
        $usernameData = $tobeSanitizedData['username'];
        $emailData = $tobeSanitizedData['email'];
        $phoneData = $tobeSanitizedData['phone'];

        Session::forget('profile_updated_data');
        Session::put('profile_updated_data', []);

        if ($usernameData != 'undefined') {
            Session::push('profile_updated_data.username', htmlspecialchars($usernameData));
        } elseif ($usernameData == 'undefined') {
            Session::push('profile_updated_data.username', NULL);
        }

        if ($emailData != 'undefined') {
            Session::push('profile_updated_data.email', htmlspecialchars($emailData));
        } elseif ($emailData == 'undefined') {
            Session::push('profile_updated_data.email', NULL);
        }


        if ($phoneData != 'undefined') {
            Session::push('profile_updated_data.phone', htmlspecialchars($phoneData));
        } elseif ($phoneData == 'undefined') {
            Session::push('profile_updated_data.phone', htmlspecialchars($phoneData));
        }

        return $next($request);
    }
}
