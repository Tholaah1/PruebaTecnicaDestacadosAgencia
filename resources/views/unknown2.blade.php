@extends('layout/plantilla')

@section('tituloPagina', 'API RICK AND MORTY - PRUEBA TECNICA - UNKNOWN')

@section('contenido')
    <br>
    <div class="row">
        <!-- ESTA ES LA VISTA QUE SE ENCARGA DE LISTAR LOS PRIMERSO 20 PERSONAJES QUE SE ENCUENTRAN CON ESPECIE DESCONOCIDA -->
        <h1>Prueba tecnica - Consumo API Rick and Morty - Nicolás Toledo</h1>
        <p>Estas listando todos los personajes que son DESCONOCIDOS, puedes revisar todos los demas personajes haciendo click en el boton de 
            "Ir a la siguiente página" al final de esta web, o devolverte a la página principal para ver las demas categorias de especies.
        </p>
        <!-- Boton que envia a la vista principal mediante la ruta apiram.index-->
        <div class="d-grid gap-2 d-md-block mb-3">
            <a href="{{route('apiram.index')}}" class="btn btn-primary"> Volver a la página principal</a>
        </div>
        <!-- Listado de los siguientes 20 personajes con especie unknown -->
        @foreach ($charactersArray['results'] as $personaje)
        <div class="col-md-6 mb-3">
            <ul class="list-group">
                <!-- Nombre del personaje, imagen y genero (Para este momento, los datos ya estan ordenados alfabeticamente y por genero)-->
                <li class="list-group-item active">{{$personaje['name']}}</li>
                <li class="list-group-item d-flex justify-content-center"><img src="{{$personaje['image']}}" alt=""></li>
                <!-- Validaciones para mantener la coherencia entre los lenguajes -->
                <li class="list-group-item">Género: 
                    @if ($personaje['gender']=="Male")
                        {{print_r("Masculino", true)}}
                    @else
                        {{print_r("Femenino", true)}}
                    @endif
                </li>
                <!-- Especie del personaje -->
                <li class="list-group-item">Especie: {{print_r($personaje['species'], true)}}</li>
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
        <!-- Este formulario es el que envia el valor de la pagina que viene a continuacion con sus 20 personajes correspondientes, llevando el valor de la pagina siguiente a traves de la ruta apiram.species por el metodo POST. Este valor sera cargado en la vista species.blade.php  y listara los siguientes 20 personajes -->
        <form action="{{ route('apiram.species') }}" method="post">
            @csrf
            <input type="hidden" name="siguiente" value="{{ $siguiente }}">
            <button type="submit" class="btn btn-primary">Ir a la siguiente página</button>
        </form>
    </div>
@endsection