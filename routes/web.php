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
Route::get('/confirmation', 'confirmation@getConfirmation')->middleware(
    'checkIFLogin',
    'checkRegisterConfirmationCodeExist'
);
Route::post('/confirmation', 'confirmation@submitConfirmation')->middleware(
    'checkIFLogin',
    'validateConfirmationCode'
);

/* forgotPassword Routes */
Route::post('/forgotresend', 'forgotPasswordConfirmationController@resendConfirmation')->middleware('checkIFLogin');
Route::get('/forgotconfirmation', 'forgotPasswordConfirmationController@getConfirmation')->middleware(
    'checkIFLogin',
    'checkForgotConfirmationCodeExist'
);
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


// for graduateGraph in dashboard
Route::get('/admin/dashboard/graduates', 'admin\dashboard\dashboardController@getGraduatesGraphData')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
// for employment status in dashboard
Route::get('/admin/dashboard/status', 'admin\dashboard\dashboardController@getEmploymentStatusData')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::get('/admin/dashboard/users', 'admin\dashboard\dashboardController@getUsersNumber')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);

// notification in dashboard modals
// pending notitication
Route::get('/admin/dashboard/pending', 'admin\dashboard\dashboardController@getPendingsNumber')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::get('/admin/dashboard/pending/accounts/{id}', 'admin\dashboard\dashboardController@approvedAccount')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::put('/admin/dashboard/pending/accounts/{id}', 'admin\dashboard\dashboardController@approvedAccount')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::delete('/admin/dashboard/pending/accounts/{id}', 'admin\dashboard\dashboardController@disaprovedAccount')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);

// graduates module
Route::get('/admin/graduates', 'admin\graduates\graduatesController@getGraduates')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::get('/admin/graduates/pages', 'admin\graduates\graduatesController@getGraduatePages')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::get('/admin/graduates/view/student', 'admin\graduates\graduatesController@getGraduateStudent')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);

Route::get('/admin/graduates/search', 'admin\graduates\graduatesController@searchStudentData')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);

Route::get('/admin/graduates/selected', 'admin\graduates\graduatesController@selectStudentStrand')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);


Route::post('/admin/graduates', 'admin\graduates\graduatesController@AddGraduates')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);


//* reports module
Route::get('/admin/rerports', 'admin\announcement\reportsController@getReport')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::get('/admin/reports/pages', 'admin\announcement\scholarshipController@getReportPages')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::get('/admin/reports/search', 'admin\announcement\scholarshipController@searchReportData')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::get('/admin/reports/selected', 'admin\announcement\scholarshipController@selectReportName')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::post('/admin/reports', 'admin\announcement\scholarshipController@addReport')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin',
    'validateReportsData',
    'sanitizeReportsData',
    'checkIfReportsIsAdmin'
);

Route::get('/admin/reports/view/report', 'admin\announcement\scholarshipController@viewReportModal')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::put('/admin/reports/edit/report/{id}', 'admin\announcement\scholarshipController@editReportModal')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin',
    'validateReportsData',
    'sanitizeReportsData'
);
Route::delete('/admin/reports/delete/report/{id}', 'admin\announcement\scholarshipController@deleteReportModal')
    ->middleware(
        'checkIfLogout',
        'checkAdminRole',
        'checkIfSuperadmin'
    );


/* announcement modules */
//* jobfair routes
Route::get('/admin/announcement/jobfair', 'admin\announcement\jobfairController@getJobFair')->middleware(
    'checkIfLogout',
    'checkAdminRole'
);
Route::get('/admin/announcement/jobfair/pages', 'admin\announcement\jobfairController@getJobFairPages')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::get('/admin/announcement/jobfair/search', 'admin\announcement\jobfairController@searchJobFairData')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::get('/admin/announcement/jobfair/selected', 'admin\announcement\jobfairController@selectJobFairStrand')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::post('/admin/announcement/jobfair', 'admin\announcement\jobfairController@addJobFair')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin',
    'validateJobFairData',
    'sanitizeJobFairData'
);
//* jobfair modal routes
Route::get('/admin/announcement/jobfair/view/job', 'admin\announcement\jobfairController@viewJobFairModal')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::put('/admin/announcement/jobfair/edit/job/{id}', 'admin\announcement\jobfairController@editJobFairModal')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin',
    'validateJobFairData',
    'sanitizeJobFairData'
);
Route::delete('/admin/announcement/jobfair/delete/job/{id}', 'admin\announcement\jobfairController@deleteJobFairModal')
    ->middleware(
        'checkIfLogout',
        'checkAdminRole',
        'checkIfSuperadmin'
    );


//* scholarship routes
Route::get('/admin/announcement/scholarship', 'admin\announcement\scholarshipController@getScholarship')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::get('/admin/announcement/scholarship/pages', 'admin\announcement\scholarshipController@getScholarshipPages')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::get('/admin/announcement/scholarship/search', 'admin\announcement\scholarshipController@searchScholarshipData')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::get('/admin/announcement/scholarship/selected', 'admin\announcement\scholarshipController@selectScholarshipName')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::post('/admin/announcement/scholarship', 'admin\announcement\scholarshipController@addScholarship')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin',
    'validateScholarshipData',
    'sanitizeScholarshipData'
);

Route::get('/admin/announcement/scholarship/view/scholar', 'admin\announcement\scholarshipController@viewScholarshipModal')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::put('/admin/announcement/scholarship/edit/scholar/{id}', 'admin\announcement\scholarshipController@editScholarshipModal')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin',
    'validateScholarshipData',
    'sanitizeScholarshipData'
);
Route::delete('/admin/announcement/scholarship/delete/scholar/{id}', 'admin\announcement\scholarshipController@deleteScholarshipModal')
    ->middleware(
        'checkIfLogout',
        'checkAdminRole',
        'checkIfSuperadmin'
    );


//* examination routes
Route::get('/admin/announcement/examination', 'admin\announcement\examinationController@getExamination')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::get('/admin/announcement/examination/pages', 'admin\announcement\examinationController@getExaminationPages')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::get('/admin/announcement/examination/search', 'admin\announcement\examinationController@searchExaminationData')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::get('/admin/announcement/examination/selected', 'admin\announcement\examinationController@selectSchoolName')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::post('/admin/announcement/examination', 'admin\announcement\examinationController@addExamination')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin',
    'validateExaminationData',
    'sanitizeExaminationData'
);
Route::get('/admin/announcement/examination/view/exam', 'admin\announcement\examinationController@viewExaminationModal')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::put('/admin/announcement/examination/edit/exam/{id}', 'admin\announcement\examinationController@editExaminationModal')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin',
    'validateExaminationData',
    'sanitizeExaminationData'
);
Route::delete('/admin/announcement/examination/delete/exam/{id}', 'admin\announcement\examinationController@deleteExaminationModal')
    ->middleware(
        'checkIfLogout',
        'checkAdminRole',
        'checkIfSuperadmin'
    );



//* alumni routes
Route::get('/admin/announcement/alumni', 'admin\announcement\alumniController@getAlumni')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::post('/admin/announcement/alumni', 'admin\announcement\alumniController@addAlumni')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);

//* settings module
Route::get('/admin/settings/backup', 'admin\settings\backupController@getBackup')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::get('/admin/settings/restore', 'admin\settings\restoreController@getRestore')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);

Route::post('/admin/settings/backup', 'admin\settings\backupController@addBackup')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::post('/admin/settings/restore', 'admin\settings\restoreController@addRestore')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);

//* accounts module
Route::get('/admin/accounts/admin', 'admin\accounts\adminsController@getAdmins')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::get('/admin/accounts/student', 'admin\accounts\studentsController@getStudents')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);

Route::post('/admin/accounts/admin', 'admin\accounts\adminsController@addAdmins')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);
Route::post('/admin/accounts/students', 'admin\accounts\studentsController@addStudents')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);

//* Profile module

Route::get('/admin/profile', 'admin\profileinfo\profileInfoController@getProfile')->middleware(
    'checkIfLogout',
    'checkAdminRole',
    'checkIfSuperadmin'
);

Route::put('/admin/profile/{id}', 'admin\profileinfo\profileInfoController@editProfile')->middleware(
    'checkIfLogout',
    'checkStudentRole',
    'admin\profile\validateProfile'

);


/* for Student Routes */
//* home routes
Route::get('/student/home', 'student\home\homeController@getHomepage')->middleware(
    'checkIfLogout',
    'checkStudentRole'
);
Route::post('/student/home', 'student\home\homeController@submitHomepage')->middleware(
    'checkIfLogout',
    'checkStudentRole'
);

// profileinfo routes
Route::get('/student/profile', 'student\profileinfo\profileInfoController@getProfile')->middleware(
    'checkIfLogout',
    'checkStudentRole'
);
Route::put('/student/profile/{id}', 'student\profileinfo\profileInfoController@editProfile')->middleware(
    'checkIfLogout',
    'checkStudentRole',
    'student\profile\validateProfile'

);
