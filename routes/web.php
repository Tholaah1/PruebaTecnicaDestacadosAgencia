<?php

use App\Http\Controllers\ConsumirAPIController;
use Illuminate\Support\Facades\Route;


Route::get('/',[ConsumirAPIController::class, 'index'])->name('apiram.index');
//Route::post('/alive2', 'alive2@ConsumirAPIController')->name('apiram.alive2');
Route::get('/alive2',[ConsumirAPIController::class, 'alive2'])->name('apiram.alive2');
Route::post('/alive2',[ConsumirAPIController::class, 'alive2'])->name('apiram.alive2');
Route::get('/dead1',[ConsumirAPIController::class, 'dead'])->name('apiram.dead1');
Route::get('/dead2',[ConsumirAPIController::class, 'dead2'])->name('apiram.dead2');
Route::post('/dead2',[ConsumirAPIController::class, 'dead2'])->name('apiram.dead2');
Route::get('/unknown1',[ConsumirAPIController::class, 'unknown'])->name('apiram.unknown1');
Route::get('/humans',[ConsumirAPIController::class, 'humans'])->name('apiram.humans');
Route::post('/species',[ConsumirAPIController::class, 'species'])->name('apiram.species');