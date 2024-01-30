@extends('layout/plantilla')

@section('tituloPagina', 'API RICK AND MORTY - PRUEBA TECNICA - DEAD')

@section('contenido')
    <br>
    <div class="row">
        <!-- ESTA ES LA VISTA QUE SE ENCARGA DE LISTAR LOS SIGUIENTES PERSONAJES DESPUES DE LOS PRIMEROS 20 PERSONAJES DE ESTADO DEAD -->
        <h1>Prueba tecnica - Consumo API Rick and Morty - Nicolás Toledo</h1>
        <p>Estas listando los personajes de una sola categoria. Puedes revisar los demas personajes haciendo click en el "Ir a la siguiente pagina" al final de esta web, o devolverte a la pagina principal volver a ver las demas categorias de especies.
        </p>
        <!-- Boton que envia a la vista principal mediante la ruta apiram.index-->
        <div class="d-grid gap-2 d-md-block mb-3">
            <a href="{{route('apiram.index')}}" class="btn btn-primary"> Volver a la página principal</a>
        </div>
        <!-- Listado de los siguientes 20 personajes con status dead -->
        @foreach ($charactersArray['results'] as $personaje)
        <div class="col-md-6 mb-3">
            <ul class="list-group">
                <!-- Nombre del personaje,imagen y genero (Para este momento, los datos ya estan ordenados alfabeticamente y por genero)-->
                <li class="list-group-item active">{{$personaje['name']}}</li>
                <li class="list-group-item d-flex justify-content-center"><img src="{{$personaje['image']}}" alt=""></li>
                <li class="list-group-item">Género: 
                    <!-- Validaciones para mantener la coherencia entre los lenguajes -->
                    @if ($personaje['gender']=="Male")
                        {{print_r("Masculino", true)}}
                    @else
                        {{print_r("Femenino", true)}}
                    @endif
                </li>
                <li class="list-group-item">Especie: 
                    <!-- Validaciones para mantener la coherencia entre los lenguajes -->
                    @if ($personaje['species'] == "Human") 
                        {{print_r('Humano', true)}}
                    @else
                        {{print_r($personaje['species'], true)}}
                    @endif
                </li>
                <li class="list-group-item">Lugar de origen:
                    <!-- Validaciones para mantener la coherencia entre los lenguajes -->
                    @if ($personaje['origin']['name']=="unknown")
                        {{print_r("Desconocido", true)}}
                    @else
                        {{print_r($personaje['origin']['name'], true)}}
                    @endif
                    </li>
                <li class="list-group-item">Ubicación actual: 
                    <!-- Validaciones para mantener la coherencia entre los lenguajes -->
                    @if ($personaje['location']['name'] == "unknown")
                        {{print_r("Desconocido", true)}}
                    @else
                        {{print_r($personaje['location']['name'], true)}}
                    @endif
                </li>
                <li class="list-group-item">Fecha de creación del personaje: 
                    <!-- Validaciones para que la fecha se vea legible -->
                    @php
                        $fecha = $personaje['created']; 
                        $fechaFormateada = str_replace(['T', 'Z'], ' ', $fecha);
                    @endphp
                    {{print_r($fechaFormateada, true)}}
                </li>
            </ul>
        </div>
        @endforeach
        <!-- Este formulario es el que envia el valor de la pagina que viene a continuacion con sus 20 personajes correspondientes, llevando el valor a traves de la ruta apiram.dead2 por el metodo POST. Este valor sera cargado en esta misma vista y esta vista ademas se encargara de listar los personajes de estado desconocido-->
        <form action="{{ route('apiram.dead2') }}" method="post">
            @csrf
            @if ($siguiente == null)
                <a href="{{route('apiram.index')}}" class="btn btn-primary mb-3"> Volver a la página principal</a>  
            @else
                <input type="hidden" name="siguiente" value="{{ $siguiente }}">
                <button type="submit" class="btn btn-primary">Ir a la siguiente página</button>
            @endif
        </form>
    </div>
@endsection