<?php

namespace App\Http\Middleware;

use Closure;
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
        $imagNameWithExtension = $image->getClientOriginalExtension();


        //get image without extension
        $imagename = pathinfo($imagNameWithExtension, PATHINFO_FILENAME);
        //get image extension

        $extension = $image->getClientOriginalExtension();

        //set image to store
        $imagenametostore = $imagename . '-' . time() . '.' . $extension;

        //Resize image here
        $profile_pic_path = storage_path('app/uploads/guests/images/profile_pic/' . $imagenametostore);
        $img = Image::make($image->getRealPath())->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($profile_pic_path);

        $profilePicPath =  'app/uploads/guests/images/profile_pic/' . $imagenametostore;


        $request->session()->put('imagepath', $profilePicPath);
        return $next($request);
    }
}
