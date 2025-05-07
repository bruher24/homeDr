<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAuth;

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('about', [MainController::class, 'about'])->name('about');

Route::get('services', [ServicesController::class,'list'])->name('services.list');

Route::middleware([CheckAuth::class])->group(function () {
    Route::prefix('users')->group(function () {
        Route::post('register', [UserController::class,'register'])->name('users.register')->withoutMiddleware([CheckAuth ::class]);
        Route::post('auth', [UserController::class,'auth'])->name('users.auth')->withoutMiddleware([CheckAuth ::class]);
        Route::get('logout', [UserController::class,'logout'])->name('users.logout');
        Route::get('profile/{section?}', [UserController::class,'profile'])->name('users.profile');
    });

    Route::prefix('doctors')->group(function () {
        Route::get('list', [DoctorController::class,'list'])->name('doctors.list');
        Route::get('{id}/appointments/list', [DoctorController::class,'appointmentsList'])->name('doctors.appointments.list');
        Route::get('{id}/patients/list', [DoctorController::class,'patientsList'])->name('doctors.patients.list');
        Route::get('{id}/services/list', [DoctorController::class,'servicesList'])->name('doctors.services.list');
    });

    Route::prefix('doctors')->name('doctors.')->group(function () {
        Route::get('list', [DoctorController::class,'list'])->name('list');
        Route::get('{id}/appointments/list', [DoctorController::class,'appointmentsList'])->name('appointments.list');
        Route::get('{id}/patients/list', [DoctorController::class,'patientsList'])->name('patients.list');
        Route::get('{id}/services/list', [DoctorController::class,'servicesList'])->name('services.list');
    });
});
