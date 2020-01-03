<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [

        // for student Registration Middleware
        'ResizeGuestProfilePic' => \App\Http\Middleware\ResizeGuestProfilePic::class,
        'ValidateRegisterInputs' => \App\Http\Middleware\ValidateRegisterInputs::class,
        'CheckForRegisterUserExist' => \App\Http\Middleware\CheckForRegisterUserExist::class,
        'sendVerificationCode' => \App\Http\Middleware\sendVerificationCode::class,


        // for Student confirmation Code Middleware
        'validateConfirmationCode' => \App\Http\Middleware\validateConfirmationCode::class,
        'checkRegisterConfirmationCodeExist' => \App\Http\Middleware\checkRegisterConfirmationCodeExist::class,


        // for login middleware
        'validateLoginInputs' => \App\Http\Middleware\validateLoginInputs::class,
        'loginCheckAccountExist' => \App\Http\Middleware\loginCheckAccountExist::class,
        'checkAccountRole' => \App\Http\Middleware\checkAccountRole::class,
        'checkIFLogin' => \App\Http\Middleware\checkIFLogin::class,
        'checkAccountStatus' => \App\Http\Middleware\checkAccountStatus::class,


        //forgot password middleware
        'validateForgotPass' => \App\Http\Middleware\validateForgotPass::class,
        'checkUserExistsForgotPassword' => \App\Http\Middleware\checkUserExistsForgotPassword::class,
        'sendForgotPasswordVerification' => \App\Http\Middleware\sendForgotPasswordVerification::class,
        'validateForGotPassConfirmation' => \App\Http\Middleware\validateForGotPassConfirmation::class,
        'checkForgotConfirmationCodeExist' => \App\Http\Middleware\checkForgotConfirmationCodeExist::class,

        // for authorizatin middleware
        'checkAdminRole' => \App\Http\Middleware\checkAdminRole::class,
        'checkStudentRole' => \App\Http\Middleware\checkStudentRole::class,

        // for Security Prevention Middlewares
        'IPBlock' => \App\Http\Middleware\IPBlock::class,


        // for loginCheckin Middleware
        'checkIfLogout' => \App\Http\Middleware\checkIfLogout::class,

        // provided by laravel 
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];

    /**
     * The priority-sorted list of middleware.
     *
     * This forces non-global middleware to always be in the given order.
     *
     * @var array
     */
    protected $middlewarePriority = [
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\Authenticate::class,
        \Illuminate\Routing\Middleware\ThrottleRequests::class,
        \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \Illuminate\Auth\Middleware\Authorize::class,
    ];
}
