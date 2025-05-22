<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('doctors/{doctor}/services/list', [DoctorController::class,'servicesList'])->name('services.list');

Route::get('schedule/{doctorId}/getDisabledDates', [ScheduleController::class,'getDisabledDates'])->name('getDisabledDates');
Route::get('schedule/{doctorId}/getTimes/{date}', [ScheduleController::class,'getTimes'])->name('getTimes');
