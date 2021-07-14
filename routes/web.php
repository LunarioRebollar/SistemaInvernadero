<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArduinoController;
use App\Http\Controllers\GraficasController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/index', 'App\Http\Controllers\ArduinoController@index')->name('index');
    Route::get('/tabla',function(){
        return view('tabla.edit');
    });
    Route::get("grafica1",[\App\Http\Controllers\GraficasController::class,'showGraphic1'])->name("grafica1");
});
