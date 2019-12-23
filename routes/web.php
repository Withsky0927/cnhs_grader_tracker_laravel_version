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


/* login Routes */
Route::get('/', 'login@getLoginForm')->middleware(
    'checkIFLogin'
);
Route::post('/', 'login@submitLoginForm')->middleware(
    'validateLoginInputs',
    'loginCheckAccountExist',
    'checkAccountStatus',
    'checkAccountRole'
);

/* Registration Routes */
Route::get('/register', 'register@getRegisterForm');
Route::post('/register', 'register@submitRegisterForm')->middleware(
    'ValidateRegisterInputs',
    'CheckForRegisterUserExist',
    'ResizeGuestProfilePic',
    'sendVerificationCode'
);

/* Confirmation Routes */
Route::post('/resend', 'confirmation@resendConfirmation');
Route::get('/confirmation', 'confirmation@getConfirmation')->middleware('checkIFLogin');
Route::post('/confirmation', 'confirmation@submitConfirmation')->middleware('validateConfirmationCode');

/* forgotPassword Routes */
Route::get('/forgotpassword', 'forgotpassword@getForgotPasswordForm')->middleware('checkIFLogin');
Route::post('/forgotpassword', 'forgotpassword@submitForgotPasswordForm');

/* flush sessions */
Route::get('/flush', 'sessionflush@flushSession');

/* for Admin Routes */

// dashboard module
Route::get('/admin/dashboard', 'admin\dashboard\dashboardController@getDashboard')->middleware('checkIfLogout');
Route::post('/admin/dashboard', 'admin\dashboard\dashboardController@submitDashboard');

// graduates module
Route::get('/admin/graduates', 'admin\graduates\graduatesController@getGraduates')->middleware('checkIfLogout');
Route::post('/admin/graduates', 'admin\graduates\graduatesController@AddGraduates');

// reports module
Route::get('/admin/reports', 'admin\reports\reportsController@getReports')->middleware('checkIfLogout');


// announcement modules
Route::get('/admin/announcement/scholarship', 'admin\announcement\scholarshipController@getScholarship')->middleware('checkIfLogout');
Route::get('/admin/announcement/examination', 'admin\announcement\examinationController@getExamination')->middleware('checkIfLogout');
Route::get('/admin/announcement/alumni', 'admin\announcement\alumniController@getAlumni')->middleware('checkIfLogout');
Route::get('/admin/announcement/jobfair', 'admin\announcement\jobfairController@getjobFair')->middleware('checkIfLogout');

Route::post('/admin/announcement/jobfair', 'admin\announcement\jobfairController@addjobFair');
Route::post('/admin/announcement/scholarship', 'admin\announcement\scholarshipController@addScholarship');
Route::post('/admin/announcement/examination', 'admin\announcement\examinationController@addExamination');
Route::post('/admin/announcement/alumni', 'admin\announcement\alumniController@addAlumni');

// settings module
Route::get('/admin/settings/backup', 'admin\settings\backupController@getBackup')->middleware('checkIfLogout');
Route::get('/admin/settings/restore', 'admin\settings\settingsController@getRestore')->middleware('checkIfLogout');

Route::post('/admin/settings/backup', 'admin\settings\backupController@addBackup');
Route::post('/admin/settings/restore', 'admin\settings\restoreController@addRestore');

// accounts module
Route::get('/admin/accounts/admin', 'admin\accounts\adminsController@getAdmins')->middleware('checkIfLogout');
Route::get('/admin/accounts/student', 'admin\accounts\studentsController@getStudents')->middleware('checkIfLogout');

Route::post('/admin/accounts/admin', 'admin\accounts\adminsController@addAdmins');
Route::post('/admin/accounts/students', 'admin\accounts\studentsController@addStudents');

/* for Student Routes */
// home module
Route::get('/student/home', 'student\home\homeController@getHomepage')->middleware(
    'checkIfLogout'
);
Route::post('/student/home', 'student\home\homeController@submitHomepage');

// profileinfo module
Route::get('/student/profilenfo', 'student\profileinfo\profileInforController@getProfileinfo')->middleware(
    'checkIfLogout'
);
