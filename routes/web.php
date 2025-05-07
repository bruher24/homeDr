<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAuth;

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('services', [ServiceController::class,'list'])->name('services.list');

Route::get('about', [MainController::class, 'about'])->name('about');


Route::middleware([CheckAuth::class])->group(function () {
    Route::prefix('users')->name('users.')->group(function () {
        Route::post('register', [UserController::class,'register'])->name('register')->withoutMiddleware([CheckAuth ::class]);
        Route::post('auth', [UserController::class,'auth'])->name('auth')->withoutMiddleware([CheckAuth ::class]);
        Route::get('logout', [UserController::class,'logout'])->name('logout');
        Route::get('profile/{section?}', [UserController::class,'profile'])->name('profile');
    });

    Route::prefix('doctors')->name('doctors.')->group(function () {
        Route::get('list', [DoctorController::class,'list'])->name('list');
        Route::get('{id}/appointments/list', [DoctorController::class,'appointmentsList'])->name('appointments.list');
        Route::get('{id}/patients/list', [DoctorController::class,'patientsList'])->name('patients.list');
        Route::get('{id}/services/list', [DoctorController::class,'servicesList'])->name('services.list');
    });

    Route::prefix('patients')->name('patients.')->group(function () {
        Route::get('list', [PatientController::class,'list'])->name('list');
        Route::get('{id}/appointments/list', [PatientController::class,'appointmentsList'])->name('appointments.list');
        Route::get('{id}/appointments/create', [PatientController::class,'appointmentCreate'])->name('appointments.create');
        Route::get('{id}/doctors/list', [PatientController::class,'doctorsList'])->name('doctors.list');
    });
});
