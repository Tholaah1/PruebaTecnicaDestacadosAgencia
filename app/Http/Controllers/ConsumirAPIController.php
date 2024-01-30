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
        $cantidadPaginas = $charactersArray['info']['pages'];
        //{{print_r($charactersArray['results']);}}
        return view('welcome', compact('charactersArray', 'siguiente', 'cantidadPaginas'));
    }
    public function alive2(Request $request)
    {
        //Mostrar datos de la API
        
        $siguiente = $request->input('siguiente');
        $characters = HTTP::get($siguiente);
        $charactersArray = $characters->json();
        $siguiente = $charactersArray['info']['next'];
        $cantidadPaginas = $charactersArray['info']['pages'];
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        //{{print_r($charactersArray['results']);}}
        return view('welcome2', compact('charactersArray', 'siguiente', 'cantidadPaginas'));
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
    public function aliens()
    {
        //funcion que sirve para mostrar las primeras 20 selecciones de los personajes muertos
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?species=alien');
        $charactersArray = $characters->json();
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        $siguiente = $charactersArray['info']['next'];
        //{{print_r($charactersArray['results']);}}
        return view('species', compact('charactersArray', 'siguiente'));
    }
    public function pbh()
    {
        //funcion que sirve para mostrar las primeras 20 selecciones de los personajes muertos
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?species=poopybutthole');
        $charactersArray = $characters->json();
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        $siguiente = $charactersArray['info']['next'];
        //{{print_r($charactersArray['results']);}}
        return view('species', compact('charactersArray', 'siguiente'));
    }
    public function cm()
    {
        //funcion que sirve para mostrar las primeras 20 selecciones de los personajes muertos
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?species=Mythological');
        $charactersArray = $characters->json();
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        $siguiente = $charactersArray['info']['next'];
        //{{print_r($charactersArray['results']);}}
        return view('species', compact('charactersArray', 'siguiente'));
    }
    public function cronenberg()
    {
        //funcion que sirve para mostrar las primeras 20 selecciones de los personajes muertos
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?species=cronenberg');
        $charactersArray = $characters->json();
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        $siguiente = $charactersArray['info']['next'];
        //{{print_r($charactersArray['results']);}}
        return view('species', compact('charactersArray', 'siguiente'));
    }
    public function animals()
    {
        //funcion que sirve para mostrar las primeras 20 selecciones de los personajes muertos
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?species=animal');
        $charactersArray = $characters->json();
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        $siguiente = $charactersArray['info']['next'];
        //{{print_r($charactersArray['results']);}}
        return view('species', compact('charactersArray', 'siguiente'));
    }
    public function unknown2()
    {
        //funcion que sirve para mostrar las primeras 20 selecciones de los personajes muertos
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?species=unknown');
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
}
