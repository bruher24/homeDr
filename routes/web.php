<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAuth;

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('services', [ServiceController::class,'list'])->name('services.list');

Route::get('about', [MainController::class, 'about'])->name('about');


Route::middleware([CheckAuth::class])->group(function () {
    Route::prefix('user')->name('user.')->group(function () {
        Route::post('register', [UserController::class,'register'])->name('register')->withoutMiddleware([CheckAuth ::class]);
        Route::post('auth', [UserController::class,'auth'])->name('auth')->withoutMiddleware([CheckAuth ::class]);
        Route::get('logout', [UserController::class,'logout'])->name('logout');
        Route::get('profile', [UserController::class,'profile'])->name('profile');
    });

    Route::prefix('doctor')->name('doctor.')->group(function () {
        Route::get('list', [DoctorController::class,'list'])->name('list')->withoutMiddleware([CheckAuth ::class]);
        Route::get('patients/list', [DoctorController::class,'patientsList'])->name('patients.list');
        Route::get('services/list', [DoctorController::class,'servicesList'])->name('services.list');
        Route::get('details', [DoctorController::class,'details'])->name('details');
    });

    Route::prefix('patients')->name('patients.')->group(function () {
        Route::get('list', [PatientController::class,'list'])->name('list');
        Route::get('{id}/doctors/list', [PatientController::class,'doctorsList'])->name('doctors.list');
    });

    Route::prefix('appointments')->name('appointments.')->group(function () {
        Route::get('createForm', [AppointmentController::class,'createForm'])->name('createForm');
        Route::post('create', [AppointmentController::class,'create'])->name('create');
        Route::get('list/{role}/{id}', [AppointmentController::class,'list'])->name('list');
    });

    Route::get('schedule/{doctorId}/getDisabledDates', [ScheduleController::class,'getDisabledDates'])->name('getDisabledDates');
    Route::get('schedule/{doctorId}/getTimes/{date}', [ScheduleController::class,'getTimes'])->name('getTimes');

    Route::prefix('admin')->name('admin.')->group(function () {
       Route::get('index', [AdminController::class,'index'])->name('index');
    });
});
