<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/welcome', [AuthController::class, 'login']);
Route::get('/create', [AuthController::class, 'createPage'])->name('home');
//path for create department page
Route::get('/create/department', [AuthController::class, 'createDepartment'])->name('department.create');
Route::post('/create/department/store', [AuthController::class, 'store']);
Route::get('/department/details', [AuthController::class, 'showDep'])->name('details');

//delete route for department page
Route::delete('/department/{department}/delete', [AuthController::class, 'destroy'])->name('destroy');

Route::get('/department/viewdetails', [AuthController::class, 'viewdep'])->name('viewdep');

//path for create staff page 
Route::get('/create/staff', [AuthController::class, 'createStaff'])->name('staff.create');

Route::post('/create/staff/store', [AuthController::class, 'staffStore'])->name('staffStore');

Route::get('/staff/details', [AuthController::class, 'showStaff'])->name('viewdetails');
//delete for staff page
Route::delete('/staff/{staff}/delete', [AuthController::class, 'deleteStaff'])->name('deleteStaff');

Route::get('/staff/viewstaff', [AuthController::class, 'viewstaff'])->name('viewstaff');

//edit and update route for department
Route::get('/department/{department}/edit', [AuthController::class, 'editdepartment'])->name(
    'department.edit'
);
Route::put('/department/{department}/update', [AuthController::class, 'updatedepartment'])->name('updatedepartment');
Route::get('/department', [AuthController::class, 'updateddep'])->name(
    'updateddep'
);


//edit and update route for staff
Route::get('/staff/{staff}/edit', [AuthController::class, 'editstaff'])->name(
    'staff.edit'
);
Route::get('/staff', [AuthController::class, 'updatedstaff'])->name('updatedstaff');
Route::put('/staff/{staff}/update', [AuthController::class, 'updatestaff'])->name('updatestaff');

Route::middleware(['auth'])->group(function () {
    Route::get('/staff/home', [AuthController::class, 'staffhome'])->name('staffhome');
    // contact
    Route::get('/contact', [AuthController::class, 'contact'])->name('contact');
    // sendmail
    Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('sendEmail');
    Route::get('/staff/contact', [EmailController::class, 'contactpage'])->name('contactpage');
    Route::get('/staffMail', [EmailController::class, 'staffEmail'])->name('staffmail');

    // profile
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');
    Route::put('/staff/profile', [AuthController::class, 'updateProfile'])->name('staff.updateProfile');

    // change password
    Route::get('staff/password', [AuthController::class, 'password'])->name('password');
    Route::put('staff/password/change', [PasswordController::class, 'ChangePassword'])->name('ChangePassword');
    Route::get('/logout', function () {
        session()->invalidate();
        session()->regenerateToken();
        return Redirect::to('/login');
    })->name('logout');
});

Route::fallback(function () {
    return Redirect::to('/login');
});
