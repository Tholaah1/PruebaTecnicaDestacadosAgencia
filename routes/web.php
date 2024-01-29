<?php

use App\Http\Controllers\ConsumirAPIController;
use Illuminate\Support\Facades\Route;


Route::get('/',[ConsumirAPIController::class, 'index'])->name('apiram.index');