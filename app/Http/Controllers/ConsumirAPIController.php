<?php

namespace App\Http\Controllers;

use App\Models\consumirAPI;
use Illuminate\Http\Request;

//Se importa esta libreria para el consumo de la API
use Illuminate\Support\Facades\Http;

class ConsumirAPIController extends Controller
{

    public function index()
    {
        //Mostrar datos de la API
        //Se llama a la API para obtener los primeros 20 personajes con es status alive
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?status=alive');
        //Se convierte la query en un Json para poder manejar mejor los datos
        $charactersArray = $characters->json();
        //Se extraen los datos solo de los personajes, ordenandolos primero por nombre y luego por genero.
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        //Se obtiene desde el json la pagina siguiente de personajes para poder llevarlos luego a la vista y tambien para tenerlo disponible para la paginacion
        $siguiente = $charactersArray['info']['next'];
        //En un inicio de obtuvieron la cantidad de las paginas totales para esta categoria, para si poder hacer la botonera de paginas totales para cada caracteristica.
        $cantidadPaginas = $charactersArray['info']['pages'];
        //Se devuelve a la vista 'welcome', los datos de los personajes seleccionados, la pagina siguiente y la cantidad de las paginas.
        return view('welcome', compact('charactersArray', 'siguiente', 'cantidadPaginas'));
    }
    public function alive2(Request $request)
    {
        //Mostrar datos de la API
        //Para esta funcion cambia un poco el consumo de la API, ya que el valor de la siguiente pagina de personajes, viene desde el valor que devuelve el boton del formulario en donde redirecciona a la siguiente pagina. Entonces con la funcion $request->input('siguiente'); se obtiene el valor del boton para luego listar los personajes correspondientes.
        $siguiente = $request->input('siguiente');
        //Se hace la peticion con el URL obtenido desde el JSON que extraje desde el boton.
        $characters = HTTP::get($siguiente);
        //Se convierte la query en el Json.
        $charactersArray = $characters->json();
        //Se obtiene desde el json la pagina siguiente de personajes para poder llevarlos luego a la vista y tambien para tenerlo disponible para la paginacion
        $siguiente = $charactersArray['info']['next'];
        //Se obtiene la cantidad de paginas de los personajes filtrados
        $cantidadPaginas = $charactersArray['info']['pages'];
        //Se extraen los datos solo de los personajes, ordenandolos primero por nombre y luego por genero.
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        //Se retorna a la vista 'welcome2' los personajes seleccionados, la pagina que viene despues y la cantidad de paginas.
        return view('welcome2', compact('charactersArray', 'siguiente', 'cantidadPaginas'));

        //Es importante destacar que esta vista es la que se encarga de cargar los personajes deleccionados a medida que las paginas van avanzando.
    }
    public function dead()
    {
        //Funcion que sirve para mostrar las primeras 20 selecciones de los personajes muertos.
        //Se realiza la query a la API para seleccionar los primeros 20 personajes que tienen el status dead.
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?status=dead');
        //Se transforma la query en un JSON.
        $charactersArray = $characters->json();
        //Se realiza el ordenamiento del json alfabeticamente por nombre, y ademas por genero.
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        //Una vez ordenados, se obtiene gracias al json, la pagina con los siguientes 20 personajes.
        $siguiente = $charactersArray['info']['next'];
        //Se retornan a la vista 'dead1' los 20 personajes junto con la pagina que viene a contunacion.
        return view('dead1', compact('charactersArray', 'siguiente'));
    }
    public function dead2(Request $request)
    {
        //funcion que sirve para mostrar los siguientes 20 personajes muertos.
        //Esta funcion tiene la misma funcionalidad que la funcion 'alive2' ya que mediante el boton de "Ver pagina siguiente" de la vista, se trae el valor de la pagina siguiente para pdoer mostrar los 20 personajes correspondientes a esa pagina.
        $siguiente = $request->input('siguiente');
        //Se realiza la query a la API con el valor de la URL obtenida anteriormente
        $characters = HTTP::get($siguiente);
        //Se transforman los datos a un JSON
        $charactersArray = $characters->json();
        //Se obtiene la siguiente pagina con sus 20 personajes corrrespondientes.
        $siguiente = $charactersArray['info']['next'];
        //Se ordenan los personajes alfabeticamente y por genero.
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        //Se devuelven a la vista 'dead2' los personajes ordenados junto con la pagina siguiente.
        return view('dead2', compact('charactersArray', 'siguiente'));
    }
    public function unknown()
    {
        //Funcion que sirve para mostrar los primeras 20 personajes con status desconocido
        //El funcionamiento de esta funcion es un poco distinto a las anteriores, puesto que esta funcion aprovecha la vista de dead2 para poder listar los siguientes personajes ya que, como el funcionamiento es el mismo de uqe las funciones anteriores, se aprovecha de reutilizar las vistas para evitar la creacion de vistas y rutas innecesarias. El contenido y el funcionamiento de las siguientes funciones de aqui en adelante son el mismo para todas las funciones restantes, tanto para la carga de los primeros 20 personajes (dependiendo de la especie) como de los que siguen. Utilizando una vista en especifico para el listado de los primeros 20 personajes de cada especie y luego reutilizan la funcion 'species' para listar los siguientes personajes.
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?status=unknown');
        $charactersArray = $characters->json();
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        $siguiente = $charactersArray['info']['next'];
        //{{print_r($charactersArray['results']);}}
        return view('dead2', compact('charactersArray', 'siguiente'));
    }
    public function humans()
    {
        //Funcion que sirve para mostrar los primeros 20 personajes de especie humana
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?species=human');
        $charactersArray = $characters->json();
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        $siguiente = $charactersArray['info']['next'];
        //{{print_r($charactersArray['results']);}}
        return view('species', compact('charactersArray', 'siguiente'));
    }
    public function aliens()
    {
        //Funcion que sirve para mostrar los primeros 20 personajes de especie alienigena.
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?species=alien');
        $charactersArray = $characters->json();
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        $siguiente = $charactersArray['info']['next'];
        //{{print_r($charactersArray['results']);}}
        return view('species', compact('charactersArray', 'siguiente'));
    }
    public function pbh()
    {
        //Funcion que sirve para mostrar los primeros 20 personajes de especie poopybutthole.
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?species=poopybutthole');
        $charactersArray = $characters->json();
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        $siguiente = $charactersArray['info']['next'];
        //{{print_r($charactersArray['results']);}}
        return view('species', compact('charactersArray', 'siguiente'));
    }
    public function cm()
    {
        //Funcion que sirve para mostrar los primeros 20 personajes de especie criatura mitologica
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?species=Mythological');
        $charactersArray = $characters->json();
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        $siguiente = $charactersArray['info']['next'];
        //{{print_r($charactersArray['results']);}}
        return view('species', compact('charactersArray', 'siguiente'));
    }
    public function cronenberg()
    {
        //Funcion que sirve para mostrar los primeros 20 personajes de especie cronenberg.
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?species=cronenberg');
        $charactersArray = $characters->json();
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        $siguiente = $charactersArray['info']['next'];
        //{{print_r($charactersArray['results']);}}
        return view('species', compact('charactersArray', 'siguiente'));
    }
    public function animals()
    {
        //Funcion que sirve para mostrar los primeros 20 personajes de especie animal.
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?species=animal');
        $charactersArray = $characters->json();
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        $siguiente = $charactersArray['info']['next'];
        //{{print_r($charactersArray['results']);}}
        return view('species', compact('charactersArray', 'siguiente'));
    }
    public function unknown2()
    {
        //Funcion que sirve para mostrar los primeros 20 personajes de especie desconocida.
        $characters = HTTP::get('https://rickandmortyapi.com/api/character/?species=unknown');
        $charactersArray = $characters->json();
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        $siguiente = $charactersArray['info']['next'];
        //{{print_r($charactersArray['results']);}}
        return view('species', compact('charactersArray', 'siguiente'));
    }
    public function species(Request $request)
    {
        //Funcion que sirve para listar los siguientes personajes de cada una de las caracteristicas. Esta funcion comparte la vista para los siguientes listados de cada una de las especies.
        $siguiente = $request->input('siguiente');
        $characters = HTTP::get($siguiente);
        $charactersArray = $characters->json();
        $siguiente = $charactersArray['info']['next'];
        $charactersArray['results'] = collect($charactersArray['results'])->sortBy('name')->sortBy('gender')->values()->all();
        //{{print_r($charactersArray['results']);}}
        return view('species', compact('charactersArray', 'siguiente'));
    }
}
