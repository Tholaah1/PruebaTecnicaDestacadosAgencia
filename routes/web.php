<?php

use App\Http\Controllers\ConsumirAPIController;
use Illuminate\Support\Facades\Route;

//El nombre apiram, viene de la abreviacion de API Rick And Morty.

//Estas son todas las rutas que se crearon para el funcionamiento de la plataforma. Las rutas que tienen el metodo post, son las que se encargan de enviar el valor de la pagina siguiente de la API que entrega el JSON en la query. Estas rutas son apiram.alive2, que envia las siguientes paginas de los personajes que estan vivos, apiram.dead2 que envia las paginas siguientes de los personajes muertos y ademas de los personajes con estado desconocido. Por otro lado se tiene la ruta apiram.species, que se encarga de cargar y listar las siguentes paginas de cada una de las especies distintas de la API, ahorrando la creacion de rutas innecesarias.
Route::get('/',[ConsumirAPIController::class, 'index'])->name('apiram.index');
Route::get('/alive2',[ConsumirAPIController::class, 'alive2'])->name('apiram.alive2');
Route::post('/alive2',[ConsumirAPIController::class, 'alive2'])->name('apiram.alive2');
Route::get('/dead1',[ConsumirAPIController::class, 'dead'])->name('apiram.dead1');
Route::get('/dead2',[ConsumirAPIController::class, 'dead2'])->name('apiram.dead2');
Route::post('/dead2',[ConsumirAPIController::class, 'dead2'])->name('apiram.dead2');
Route::get('/unknown1',[ConsumirAPIController::class, 'unknown'])->name('apiram.unknown1');
Route::get('/humans',[ConsumirAPIController::class, 'humans'])->name('apiram.humans');
Route::get('/aliens',[ConsumirAPIController::class, 'aliens'])->name('apiram.aliens');
Route::get('/pbh',[ConsumirAPIController::class, 'pbh'])->name('apiram.pbh');
Route::get('/cm',[ConsumirAPIController::class, 'cm'])->name('apiram.cm');
Route::get('/cronenberg',[ConsumirAPIController::class, 'cronenberg'])->name('apiram.cronenberg');
Route::get('/animals',[ConsumirAPIController::class, 'animals'])->name('apiram.animals');
Route::get('/unknown2',[ConsumirAPIController::class, 'unknown2'])->name('apiram.unknown2');
Route::post('/species',[ConsumirAPIController::class, 'species'])->name('apiram.species');