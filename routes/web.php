<?php

use App\Http\Controllers\ConsumirAPIController;
use Illuminate\Support\Facades\Route;


Route::get('/',[ConsumirAPIController::class, 'index'])->name('apiram.index');
//Route::post('/alive2', 'alive2@ConsumirAPIController')->name('apiram.alive2');
Route::get('/alive2',[ConsumirAPIController::class, 'alive2'])->name('apiram.alive2');
Route::post('/alive2',[ConsumirAPIController::class, 'alive2'])->name('apiram.alive2');