<?php

use App\Http\Controllers\MyPlaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [MyPlaceController::class,'index']);
