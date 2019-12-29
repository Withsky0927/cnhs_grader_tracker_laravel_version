<?php

namespace App\Http\Middleware\student\profile;

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
        return $next($request);
    }
}
