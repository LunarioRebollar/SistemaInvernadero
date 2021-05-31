<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArduinoController;
use App\Http\Controllers\DiscordNotification;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get("index",[\App\Http\Controllers\ArduinoController::class,'showIndex'])->name("index");
    Route::get('notification', 'DiscordNotification@notification'); 
});
