<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;

class validateForGotPassConfirmation
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
        $errors = Validator::make($request->all(), [
            'forgotconfirmation' => 'required|numeric|digits:6',
        ]);
        if ($errors->fails()) {
            return redirect('forgotconfirmation')
                ->with('errors', $errors)
                ->withInput();
        }
        return $next($request);
    }
}
