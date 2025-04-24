<?php

use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', function () {
    echo 'test';
});
Route::post('register', [UserController::class,'register']);
Route::post('auth', [UserController::class,'auth']);
Route::get('services', [ServicesController::class,'getServices']);

Route::middleware([CheckAuth::class])->group(function () {
    Route::get('logout', [UserController::class,'logout']);
    Route::get('profile', [UserController::class,'profile']);
});
//Route::match('get, post', 'testTTT', [UserController::class,'auth']);
