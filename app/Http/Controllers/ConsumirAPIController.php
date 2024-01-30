<?php

namespace App\Http\Controllers;

use App\Models\consumirAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConsumirAPIController extends Controller
{

    public function index()
    {
        //Mostrar datos de la API
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?status=alive');
        $charactersArray = $characters->json();
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        $siguiente = $charactersArray['info']['next'];
        //{{print_r($charactersArray['results']);}}
        return view('welcome', compact('charactersArray', 'siguiente'));
    }


    public function alive2(Request $request)
    {
        //Mostrar datos de la API
        
        $siguiente = $request->input('siguiente');
        $characters = HTTP::get($siguiente);
        $charactersArray = $characters->json();
        $siguiente = $charactersArray['info']['next'];
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        //{{print_r($charactersArray['results']);}}
        return view('welcome2', compact('charactersArray', 'siguiente'));
    }


    public function dead()
    {
        //funcion que sirve para mostrar las primeras 20 selecciones de los personajes muertos
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?status=dead');
        $charactersArray = $characters->json();
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        $siguiente = $charactersArray['info']['next'];
        //{{print_r($charactersArray['results']);}}
        return view('dead1', compact('charactersArray', 'siguiente'));
    }
    public function dead2(Request $request)
    {
        //funcion que sirve para mostrar las primeras 20 selecciones de los personajes muertos
        $siguiente = $request->input('siguiente');
        $characters = HTTP::get($siguiente);
        $charactersArray = $characters->json();
        $siguiente = $charactersArray['info']['next'];
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        //{{print_r($charactersArray['results']);}}
        return view('dead2', compact('charactersArray', 'siguiente'));
    }

    public function unknown()
    {
        //funcion que sirve para mostrar las primeras 20 selecciones de los personajes muertos
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?status=unknown');
        $charactersArray = $characters->json();
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        $siguiente = $charactersArray['info']['next'];
        //{{print_r($charactersArray['results']);}}
        return view('dead2', compact('charactersArray', 'siguiente'));
    }

    public function humans()
    {
        //funcion que sirve para mostrar las primeras 20 selecciones de los personajes muertos
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?species=human');
        $charactersArray = $characters->json();
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        $siguiente = $charactersArray['info']['next'];
        //{{print_r($charactersArray['results']);}}
        return view('species', compact('charactersArray', 'siguiente'));
    }

    public function species(Request $request)
    {
        //funcion que sirve para mostrar las primeras 20 selecciones de los personajes muertos
        $siguiente = $request->input('siguiente');
        $characters = HTTP::get($siguiente);
        $charactersArray = $characters->json();
        $siguiente = $charactersArray['info']['next'];
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        //{{print_r($charactersArray['results']);}}
        return view('species', compact('charactersArray', 'siguiente'));
    }


    public function show(consumirAPI $consumirAPI)
    {
        //
    }


    public function edit(consumirAPI $consumirAPI)
    {
        //
    }


    public function update(Request $request, consumirAPI $consumirAPI)
    {
        //
    }


    public function destroy(consumirAPI $consumirAPI)
    {
        //
    }
}
