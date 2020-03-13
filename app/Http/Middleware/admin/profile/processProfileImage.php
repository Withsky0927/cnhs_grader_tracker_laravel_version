<?php

namespace App\Http\Middleware\admin\profile;

use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

use Closure;

class processProfileImage
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

        if (!$image) {
            Session::put('admin_profile_image', NULL);
        } elseif ($image) {
            $img = Image::make($image->getRealPath())->resize(170, 170, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('data-url');

            Session::put('admin_profile_image', $img);
        }

        return $next($request);
    }
}
