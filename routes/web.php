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
Route::get('/logout', 'logoutController@logout');

/* Registration Routes */
Route::get('/register', 'register@getRegisterForm')->middleware('checkIFLogin');
Route::post('/register', 'register@submitRegisterForm')->middleware(
    'checkIFLogin',
    'ValidateRegisterInputs',
    'CheckForRegisterUserExist',
    'ResizeGuestProfilePic',
    'sendVerificationCode'
);

/* Confirmation Routes */
Route::post('/resend', 'confirmation@resendConfirmation')->middleware('checkIFLogin');
Route::get('/confirmation', 'confirmation@getConfirmation')->middleware('checkIFLogin');
Route::post('/confirmation', 'confirmation@submitConfirmation')->middleware(
    'checkIFLogin',
    'validateConfirmationCode'
);

/* forgotPassword Routes */
Route::post('/forgotresend', 'forgotPasswordConfirmationController@resendConfirmation')->middleware('checkIFLogin');
Route::get('/forgotconfirmation', 'forgotPasswordConfirmationController@getConfirmation')->middleware('checkIFLogin');
Route::post('/forgotconfirmation', 'forgotPasswordConfirmationController@submitConfirmation')->middleware(
    'checkIFLogin',
    'validateForGotPassConfirmation'
);
Route::get('/forgotpassword', 'forgotpassword@getForgotPasswordForm')->middleware('checkIFLogin');
Route::post('/forgotpassword', 'forgotpassword@submitForgotPasswordForm')->middleware(
    'checkIFLogin',
    'validateForgotPass',
    'checkUserExistsForgotPassword',
    'sendForgotPasswordVerification'
);

/* flush sessions */
Route::get('/flush', 'sessionflush@flushSession');

/* for Admin Routes */

//home module

Route::get('/admin/home', 'admin\home\homeController@getHome')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::post('/admin/home', 'admin\home\homeController@submitHome')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
// dashboard module
Route::get('/admin/dashboard', 'admin\dashboard\dashboardController@getDashboard')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::post('/admin/dashboard', 'admin\dashboard\dashboardController@submitDashboard')->middleware('checkIfLogout');

// graduates module
Route::get('/admin/graduates', 'admin\graduates\graduatesController@getGraduates')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::post('/admin/graduates', 'admin\graduates\graduatesController@AddGraduates')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);

// reports module
Route::get('/admin/reports', 'admin\reports\reportsController@getReports')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);


// announcement modules
Route::get('/admin/announcement/scholarship', 'admin\announcement\scholarshipController@getScholarship')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::get('/admin/announcement/examination', 'admin\announcement\examinationController@getExamination')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::get('/admin/announcement/alumni', 'admin\announcement\alumniController@getAlumni')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::get('/admin/announcement/jobfair', 'admin\announcement\jobfairController@getJobFair')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);

Route::post('/admin/announcement/jobfair', 'admin\announcement\jobfairController@addJobFair')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::post('/admin/announcement/scholarship', 'admin\announcement\scholarshipController@addScholarship')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::post('/admin/announcement/examination', 'admin\announcement\examinationController@addExamination')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::post('/admin/announcement/alumni', 'admin\announcement\alumniController@addAlumni')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);

// settings module
Route::get('/admin/settings/backup', 'admin\settings\backupController@getBackup')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::get('/admin/settings/restore', 'admin\settings\restoreController@getRestore')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);

Route::post('/admin/settings/backup', 'admin\settings\backupController@addBackup')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::post('/admin/settings/restore', 'admin\settings\restoreController@addRestore')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);

// accounts module
Route::get('/admin/accounts/admin', 'admin\accounts\adminsController@getAdmins')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::get('/admin/accounts/student', 'admin\accounts\studentsController@getStudents')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);

Route::post('/admin/accounts/admin', 'admin\accounts\adminsController@addAdmins')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::post('/admin/accounts/students', 'admin\accounts\studentsController@addStudents')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);

// Profile module

Route::get('/admin/profile', 'admin\profileinfo\profileInfoController@getProfile')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);

Route::put('/admin/profile/{id}', 'admin\profileinfo\profileInfoController@editProfile')->middleware(
    'checkIfLogout',
    'checkStudentRole',
    'admin\profile\validateProfile'

);


/* for Student Routes */
// home module
Route::get('/student/home', 'student\home\homeController@getHomepage')->middleware(
    'checkIfLogout',
    'checkStudentRole'
);
Route::post('/student/home', 'student\home\homeController@submitHomepage')->middleware(
    'checkIfLogout',
    'checkStudentRole'
);

// profileinfo module
Route::get('/student/profile', 'student\profileinfo\profileInfoController@getProfile')->middleware(
    'checkIfLogout',
    'checkStudentRole'
);
Route::put('/student/profile/{id}', 'student\profileinfo\profileInfoController@editProfile')->middleware(
    'checkIfLogout',
    'checkStudentRole',
    'student\profile\validateProfile'

);
