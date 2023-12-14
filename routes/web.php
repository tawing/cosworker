<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;


Route::get('/generate-pdf', [App\Http\Controllers\PDFController::class, 'generatePDF']);
Route::get('/employee-pdf/{id}', [App\Http\Controllers\PDFController::class, 'employeePDF'])->name('employee-pdf');
Route::get('/employee-clearance/{id}', [App\Http\Controllers\PDFController::class, 'clearancePDF'])->name('employee-clearance');
Route::get('/projects-pdf', [App\Http\Controllers\PDFController::class, 'projectsPDF']);
Route::get('/allemployee-pdf', [App\Http\Controllers\PDFController::class, 'allemployeePDF']);
Route::get('/deactivated-pdf', [App\Http\Controllers\PDFController::class, 'deactivatedPDF']);
Route::get('/blacklist-pdf', [App\Http\Controllers\PDFController::class, 'blacklistPDF']);
Route::get('/coe-pdf/{id}/{projid}', [App\Http\Controllers\PDFController::class, 'coePDF'])->name('employee.coePDF');
Route::post('/postcoepdf', [App\Http\Controllers\PDFController::class, 'postcoepdf'])->name('postcoepdf');

Route::get('/logout', function () {
    Session::flush();
    $response = new RedirectResponse('/');
    return $response->withHeaders([
        'Cache-Control' => 'no-cache, no-store, must-revalidate',
        'Pragma' => 'no-cache',
        'Expires' => '0'
    ])->withCookie(cookie('laravel_session', '', -1));
});


// Logins
Route::get('/', [App\Http\Controllers\LoginController::class, 'index']);
Route::post('/', [App\Http\Controllers\LoginController::class, 'verify'])->name('logins.perform');

// Home | Dashboard
Route::get('/home', [App\Http\Controllers\SampleController::class, 'index']);
Route::get('/list/active', [App\Http\Controllers\ListController::class, 'activeemp']);
Route::get('/list/inactive', [App\Http\Controllers\ListController::class, 'inactiveemp']);
Route::get('/total_cert', [App\Http\Controllers\LogsController::class, 'total_cert']);
Route::post('/process-request/{id}', [App\Http\Controllers\SampleController::class, 'processRequest'])->name('processRequest');

//account Settings
Route::get('/accountsettings', [App\Http\Controllers\AccountController::class, 'index']);
Route::post('/accountsettings/updates', [App\Http\Controllers\AccountController::class, 'updates'])->name('accountsettings.updates');
// Route::post('/accountsettings/passupdate', [App\Http\Controllers\AccountController::class, 'passupdate'])->name('accountsettings.passupdate');
Route::get('/profile/edit-password', [App\Http\Controllers\AccountController::class, 'editPassword'])->name('profile.edit-password');
Route::post('/profile/update-password', [App\Http\Controllers\AccountController::class, 'updatePassword'])->name('profile.update-password');

// Route::get('/recent-activity/{filter?}', [App\Http\Controllers\SampleController::class, 'index'])->name('recent-activity');

Route::get('/userperm', [App\Http\Controllers\UserPermController::class, 'index']);
// Route::get('/hood', [App\Http\Controllers\LanceController::class, 'index']);

// Projects
Route::get('/projects', [App\Http\Controllers\ProjectsController::class, 'index']);
Route::get('/items', [App\Http\Controllers\ProjectsController::class, 'items']);
Route::get('/list/{id}', [App\Http\Controllers\ProjectsController::class, 'viewproject']);
Route::post('/projects', [App\Http\Controllers\ProjectsController::class, 'store'])->name('projects.store');
Route::post('/projects/update', [App\Http\Controllers\ProjectsController::class, 'update'])->name('projects.update');
Route::post('/projects/posupdate', [App\Http\Controllers\ProjectsController::class, 'updatepos']);
Route::post('/projects/{id}/posadd', [App\Http\Controllers\ProjectsController::class, 'addpos']);
Route::post('/update-position', [App\Http\Controllers\ProjectsController::class, 'updatePosition']);


//Deactivated
Route::get('/deactivated', [App\Http\Controllers\DeactivatedController::class, 'displaydeactivated']);

//Lists
Route::get('/lists/projects', [App\Http\Controllers\ListController::class, 'index']);

//Employees
Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'views']);
Route::get('/employee/{id}', [App\Http\Controllers\EmployeeController::class, 'profile'])->name('employee.profile');
Route::get('/employee/project/{projectname}', [App\Http\Controllers\EmployeeController::class, 'findpositions']);
Route::get('/employee/region/{regionname}', [App\Http\Controllers\EmployeeController::class, 'findprovinces']);
Route::get('/employee/editemp/{id}', [App\Http\Controllers\EmployeeController::class, 'editempmodal']);
Route::post('/employee/update', [App\Http\Controllers\EmployeeController::class, 'updateemployee'])->name('employee.update');
Route::post('/employee/addproject', [App\Http\Controllers\EmployeeController::class, 'addproject'])->name('employee.addproject');
Route::post('/employee', [App\Http\Controllers\EmployeeController::class, 'addemployee'])->name('employee.add');
Route::post('/employee/deactivate', [App\Http\Controllers\EmployeeController::class, 'deactivate'])->name('employee.deactivate');
Route::post('/employee/activate', [App\Http\Controllers\EmployeeController::class, 'activate'])->name('employee.activate');
Route::post('/employee/projectupdate/{projemploy_id}', [App\Http\Controllers\EmployeeController::class, 'projectupdate'])->name('projectupdate');
Route::post('/employee/deleteproject',[App\Http\Controllers\EmployeeController::class,  'deleteproject'])->name('employee.deleteproject');
Route::post('/employee/requestblacklist',[App\Http\Controllers\EmployeeController::class,  'requestblacklist'])->name('employee.requestblacklist');

// Blacklist
Route::get('/blacklist', [App\Http\Controllers\BlacklistController::class, 'display']);

// Certificate Logs
Route::get('/certificate_log', [App\Http\Controllers\LogsController::class, 'certificate_log']);

// Blacklist Logs
Route::get('/blacklist_log', [App\Http\Controllers\LogsController::class, 'blacklist_log']);

// Upload
Route::get('/uploadfile', [App\Http\Controllers\UploadController::class, 'index']);
Route::post('/uploadfile', [App\Http\Controllers\UploadController::class, 'upload'])->name('uploadfile.upload');
Route::post('/uploadfile/update', [App\Http\Controllers\UploadController::class, 'update'])->name('uploadfile.update');

// DownloadCSV
Route::get('/download-template', [App\Http\Controllers\DownloadController::class, 'download'])->name('downloadTemplate');

//  UserPerm
Route::get('/usersandperm', [App\Http\Controllers\UserPermController::class, 'index']);
Route::post('/usersandperm/store', [App\Http\Controllers\UserPermController::class, 'storeAdmin'])->name('usersandperm.storeAdmin');
Route::post('/usersandperm/authstore', [App\Http\Controllers\UserPermController::class, 'authstore'])->name('usersandperm.authstore');
Route::post('/usersandperm/clearstore', [App\Http\Controllers\UserPermController::class, 'clearstore'])->name('usersandperm.clearstore');
Route::post('/usersandperm/update/{id}', [App\Http\Controllers\UserPermController::class, 'updateauth'])->name('usersandperm.updateauth');

Route::post('/usersandperm/updateclearstore', [App\Http\Controllers\UserPermController::class, 'updateclearstore'])->name('usersandperm.updateclearstore');

Route::post('/data/{id}', [App\Http\Controllers\UserPermController::class, 'update'])->name('data.update');


//admin
Route::post('/usersandperm/deactivate/{id}', [App\Http\Controllers\UserPermController::class, 'deactivate'])->name('usersandperm.deactivate');
Route::post('/usersandperm/activate/{id}', [App\Http\Controllers\UserPermController::class, 'activate'])->name('usersandperm.activate');

//authourized signatory
Route::post('/usersandperm/authdeactivate/{id}', [App\Http\Controllers\UserPermController::class, 'authdeactivate'])->name('usersandperm.authdeactivate');
Route::post('/usersandperm/authactivate/{id}', [App\Http\Controllers\UserPermController::class, 'authactivate'])->name('usersandperm.authactivate');

//clearance
//Route::post('/usersandperm', [App\Http\Controllers\UserPermController::class, 'clearstore'])->name('usersandperm.clearstore');
Route::post('/usersandperm/cleardeactivate/{id}', [App\Http\Controllers\UserPermController::class, 'cleardeactivate'])->name('usersandperm.cleardeactivate');
Route::post('/usersandperm/clearactivate/{id}', [App\Http\Controllers\UserPermController::class, 'clearactivate'])->name('usersandperm.clearactivate');


Route::get('/try', function () {
    return view('try');
});
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
