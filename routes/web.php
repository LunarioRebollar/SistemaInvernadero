<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArduinoController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    
});

Route::get("index",[\App\Http\Controllers\ArduinoController::class,'showIndex'])->name("index");