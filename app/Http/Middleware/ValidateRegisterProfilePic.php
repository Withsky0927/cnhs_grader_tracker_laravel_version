<?php

namespace App\Http\Middleware;

use Closure;

class ValidateRegisterProfilePic
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
        $size = 1024 * 1024 * 5;
        $mimeTypeRegex = '/(jpg|png|jpeg)/';
        $extensionRegex = '/\.(jpg|JPEG|JPEG|jpeg|PNG|png)$/';

        $ProfilePic = $request->file('profile_pic');

        $ProfilePicName = $ProfilePic->getFilename();
        $ProfilePicSize = $ProfilePic->getSize();
        $profilePicMime = $ProfilePic->getMimeType();
        $ProfilePicExtension = $ProfilePic->getExtension();

        // check for mimeType
        if (preg_match($mimeTypeRegex, $profilePicMime, $matches, PREG_OFFSET_CAPTURE)) {
            // check extension type
            if (count($matches) > 0) {
                if (preg_match($extensionRegex, $ProfilePicExtension, $matches, PREG_OFFSET_CAPTURE)) {
                    if (count($matches) > 0) {
                        $errors = ['profile_pic' => 'only .jpg and .png extension is allowed'];
                        return view('register', compact('error'));
                    }
                }
                $error = ['profile_pic' => 'Invalid mime type'];
                return view('register', compact('error'));
            }
        }


        if ($ProfilePicSize > $size) {
            $error = ['profile_pic' => 'Maximum allowed file size is  5MB'];
            return view('register', $error);
        }

        return $next($request);
    }
}
