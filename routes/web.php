<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\MedichineController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentAdminController;
use App\Http\Controllers\UserController;

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

// admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    // appointment
    Route::get('/admin/appointment', [AppointmentController::class, 'index']);
    Route::get('/admin/appointment/{appointment:id}', [AppointmentController::class, 'show']);
    Route::put('/admin/appointment/{appointment:id}', [AppointmentController::class, 'update']);
    
    // history appointment
    Route::get('/admin/history', [AppointmentController::class, 'index_history']);
    Route::get('/admin/history/{appointment:id}', [AppointmentController::class, 'show_history']);


    // medichine
    Route::get('/admin/medichine', [MedichineController::class, 'index']);
    Route::get('/admin/medichine/{medichine:id}', [MedichineController::class, 'show']);
    Route::put('/admin/medichine/{medichine:id}', [MedichineController::class, 'update']);
    Route::get('/admin/create/medichine', [MedichineController::class, 'create']);
    Route::post('/admin/medichine', [MedichineController::class, 'store']);
    Route::delete('/admin/medichine/{medichine:id}', [MedichineController::class, 'destroy'])->name('admin.medichine.destroy');

    // news
    Route::get('/admin/news', [NewsController::class, 'index']);
    Route::get('/admin/news/{news:id}', [NewsController::class, 'show']);
    Route::put('/admin/news/{news:id}', [NewsController::class, 'update']);
    Route::get('/admin/create/news', [NewsController::class, 'create']);
    Route::post('/admin/news', [NewsController::class, 'store']);
    Route::delete('/admin/news/{news:id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');

});

// doctor
Route::group(['middleware' => ['auth', 'role:doctor']], function () {

    // appointment
    Route::get('/doctor/appointment', [AppointmentController::class, 'index']);
    Route::get('/doctor/appointment/{appointment:id}', [AppointmentController::class, 'show']);
    Route::put('/doctor/appointment/{appointment:id}', [AppointmentController::class, 'update']);
    
    // history appointment
    Route::get('/doctor/history', [AppointmentController::class, 'index_history']);
    Route::get('/doctor/history/{appointment:id}', [AppointmentController::class, 'show_history']);

    // plan
    Route::get('/doctor/plan', [PlanController::class, 'index']);
    Route::get('/doctor/plan/{plan:id}', [PlanController::class, 'show']);
    Route::put('/doctor/plan/{plan:id}', [PlanController::class, 'update']);
    Route::get('/doctor/create/plan', [PlanController::class, 'create']);
    Route::post('/doctor/plan', [PlanController::class, 'store']);
    Route::delete('/doctor/plan/{plan:id}', [PlanController::class, 'destroy'])->name('doctor.plan.destroy');
});


Route::group(['middleware' => ['auth']], function(){
    Route::post('/appointment', [AppointmentController::class, 'store']);
    Route::get('/appointment/create/{doctor:id}', [AppointmentController::class, 'create']);
    
    Route::get('/profile', [UserController::class, 'profile']);
    Route::put('/profile/{user:id}', [UserController::class, 'update_profile']);
    
    Route::get('/profile/appointment/{appointment:id}', [UserController::class, 'show_appointment']);
    Route::put('/profile/appointment/{appointment:id}', [UserController::class, 'update_appointment']);
    
});


// guest
Route::get('/', [UserController::class, 'index']);
Route::get('/facilities', [UserController::class, 'facilities']);
Route::get('/information', [UserController::class, 'information']);
Route::get('/doctor', [UserController::class, 'doctor']);
Route::get('/pharmacy', [UserController::class, 'pharmacy']);
Route::get('/location', [UserController::class, 'location']);

// auth
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'destroy']);