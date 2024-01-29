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
        //{{print_r($charactersArray['results']);}}
        return view('welcome', compact('charactersArray'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
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
