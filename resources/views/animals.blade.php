
@extends('layout/plantilla')

@section('tituloPagina', 'API RICK AND MORTY - PRUEBA TECNICA - ANIMALES')

@section('contenido')
    <br>
    <div class="row">
        <!-- ESTA ES LA VISTA QUE SE ENCARGA DE LISTAR LOS PRIMEROS 20 PEROSNAJES DE TIPO ANIMALES. ESTA VISTA LUEGO LLAMA A LA VISTA SPECIES.BLADE.PHP PARA PODER SEGUIR LISTANDO LOS SIGUIENTES PERSONAJES -->
        <h1>Prueba tecnica - Consumo API Rick and Morty - Nicolás Toledo</h1>
        <p>Estas listando todos los personajes que son Animales, puedes revisar todos los demas personajes haciendo click en el boton de 
            "Ir a la siguiente página" al final de esta web, o devolverte a la página principal para ver las demas categorias de especies.
        </p>
        <div class="d-grid gap-2 d-md-block mb-3">
            <a href="{{route('apiram.index')}}" class="btn btn-primary"> Volver a la página principal</a>
        </div>
        @foreach ($charactersArray['results'] as $personaje)
        <div class="col-md-6 mb-3">
            <ul class="list-group">
                <li class="list-group-item active">{{$personaje['name']}}</li>
                <li class="list-group-item d-flex justify-content-center"><img src="{{$personaje['image']}}" alt=""></li>
                <li class="list-group-item">Genero: 
                    @if ($personaje['gender']=="Male")
                        {{print_r("Masculino", true)}}
                    @else
                        {{print_r("Femenino", true)}}
                    @endif
                </li>
                <li class="list-group-item">Especie: {{print_r($personaje['species'], true)}}</li>
                <li class="list-group-item">Lugar de origen:
                    @if ($personaje['origin']['name']=="unknown")
                        {{print_r("Desconocido", true)}}
                    @else
                        {{print_r($personaje['origin']['name'], true)}}
                    @endif
                    </li>
                <li class="list-group-item">Ubicación actual: 
                    @if ($personaje['location']['name'] == "unknown")
                        {{print_r("Desconocido", true)}}
                    @else
                        {{print_r($personaje['location']['name'], true)}}
                    @endif
                </li>
                <li class="list-group-item">Fecha de creación del personaje: 
                    @php
                        $fecha = $personaje['created']; 
                        $fechaFormateada = str_replace(['T', 'Z'], ' ', $fecha);
                    @endphp
                    {{print_r($fechaFormateada, true)}}
                </li>
            </ul>
        </div>
        @endforeach
        <!-- Este formulario es el que envia el valor de la pagina que viene a continuacion con sus 20 personajes correspondientes, llevando el valor a traves de la ruta apiram.species por el metodo POST. Los personajes seran cargados en la vista species.blade.php y esa vista es la que se encargara de pedir los siguientes 20. Esta vista se comparte junto con el listado de personajes de cada una de las especies disponible en la API -->
        <form action="{{ route('apiram.species') }}" method="post">
            @csrf
            <input type="hidden" name="siguiente" value="{{ $siguiente }}">
            <button type="submit" class="btn btn-primary">Ir a la siguiente página</button>
        </form>
    </div>
@endsection