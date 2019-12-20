<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// for login form
Route::get('/', 'login@getLoginForm');
Route::post('/', 'login@submitLoginForm');


// for registration form
Route::get('/register', 'register@getRegisterForm');
Route::post('/register', 'register@submitRegisterForm')->middleware(
    'ValidateRegisterInputs',
    'CheckForRegisterUserExist',
    'ResizeGuestProfilePic',
    'sendVerificationCode'
);

// for confirmation code
Route::post('/resend', 'confirmation@resendConfirmation');

Route::get('/confirmation', 'confirmation@getConfirmation');
Route::post('/confirmation', 'confirmation@submitConfirmation')->middleware('validateConfirmationCode');

// for forgotPasswordForm
Route::get('/forgotpassword', 'forgotpassword@getForgotPasswordForm');
Route::post('/forgotpassword', 'forgotpassword@submitForgotPasswordForm');

Route::get('/flush', 'sessionflush@flushSession');
