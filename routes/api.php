<?php

use App\Services\DoctorService;
use App\Services\ScheduleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('doctors/{doctor}/services/list', [DoctorService::class,'servicesList'])->name('services.list');

Route::get('schedule/{doctorId}/getDisabledDates', [ScheduleService::class,'getDisabledDates'])->name('getDisabledDates');
Route::get('schedule/{doctorId}/getTimes/{date}', [ScheduleService::class,'getTimes'])->name('getTimes');
