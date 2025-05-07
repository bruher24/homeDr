<?php

use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAuth;

Route::get('/', [UserController::class, 'index'])->name('home');

Route::post('register', [UserController::class,'register'])->name('register');
Route::post('auth', [UserController::class,'auth'])->name('auth');
Route::get('services', [ServicesController::class,'getServices'])->name('services');

Route::middleware([CheckAuth::class])->group(function () {
    Route::get('logout', [UserController::class,'logout'])->name('logout');
    Route::get('profile/{section?}', [UserController::class,'profile'])->name('profile');

    Route::prefix('user')->group(function () {
        Route::get('{id}/switch_type', [UserController::class,'switchType'])->name('switch_type');
    });
});

//Route::match('get, post', 'testTTT', [UserController::class,'auth']);
