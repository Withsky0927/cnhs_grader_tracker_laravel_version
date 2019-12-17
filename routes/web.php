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
    'ResizeGuestProfilePic'
);

// for confirmation code
Route::get('/confirm', 'confirmation@getConfirmation');
Route::post('/confirm', 'confirmation@submitConfimation');

// for forgotPasswordForm
Route::get('/forgotpassword', 'forgotpassword@getForgotPasswordForm');
Route::post('/forgotpassword', 'forgotpassword@submitForgotPasswordForm');

Route::get('/flush', 'sessionflush@flushSession');
