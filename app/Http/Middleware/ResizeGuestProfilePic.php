<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;


class ResizeGuestProfilePic
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

        $image = $request->file('profile_pic');

        $img = Image::make($image->getRealPath())->resize(170, 170, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('data-url');


        $request->session()->put('image_data', $img);
        return $next($request);
    }
}
