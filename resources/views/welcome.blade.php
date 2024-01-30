@extends('layout/plantilla')

@section('tituloPagina', 'API RICK AND MORTY - PRUEBA TECNICA')

@section('contenido')
    <br>
    <div class="row"> 
        <!-- ESTA ES LA VISTA PRINCIPAL, DONDE ADEMAS DE CARGARSE LOS PRIMEROS 20 PERSONAJES CON ESTADO ALIVE, SE PRESENTAN TODOS LOS BOTONES QUE SE ENCARGARAN DE HACER LA PAGINACION Y FILTRACION POR CARACTERISTICAS DE LA API-->
        <h1>Prueba tecnica - Consumo API Rick and Morty - Nicolás Toledo</h1>
        <p>Los personajes que estas viendo, son los primeros 20 personajes vivos de la serie "Rick and Morty". Si quieres seguir viendo los demas personajes vivos, haz click en el boton "Ver siguiente página". Si quieres ver los personajes muertos o los personajes que se desconoce su estado independientemente de la especie, puedes filtarlos haciendo click en los botones "Muertos" o "Estado desconocido".</p>
        <!-- Creacion de los botones -->
        <div class="d-grid gap-2 d-md-block mb-3">
            <a href="{{route('apiram.dead1')}}" class="btn btn-danger"> Muertos</a>
            <a href="{{route('apiram.unknown1')}}" class="btn btn-warning"> Estado desconocido</a>
        </div>
        <p>Si quieres ver las demas especies, puedes hacer click en el boton de la especie: </p>
        <div class="d-grid gap-2 d-md-block mb-3">
            <a href="{{route('apiram.humans')}}" class="btn btn-success">Humanos y Humanoides</a>
            <a href="{{route('apiram.aliens')}}" class="btn btn-success"> Aliens</a>
            <a href="{{route('apiram.pbh')}}" class="btn btn-success"> Poopybuttholes</a>
            <a href="{{route('apiram.cm')}}" class="btn btn-success"> Criaturas mitológicas</a>
            <a href="{{route('apiram.cronenberg')}}" class="btn btn-success"> Cronenberg</a>
            <a href="{{route('apiram.animals')}}" class="btn btn-success"> Animales</a>
            <a href="{{route('apiram.unknown2')}}" class="btn btn-warning"> Especies desconocidas</a>
        </div>
        <!-- Listado de los primeros 20 personajes con status alive -->
        @foreach ($charactersArray['results'] as $personaje)
        <div class="col-md-6 mb-3">
            <ul class="list-group">
                <!-- Nombre del personaje, imagen y genero (Para este momento, los datos ya estan ordenados alfabeticamente y por genero)-->
                <li class="list-group-item active">{{$personaje['name']}}</li>
                <li class="list-group-item d-flex justify-content-center"><img src="{{$personaje['image']}}" alt=""></li>
                <li class="list-group-item">Género: 
                    @if ($personaje['gender']=="Male")
                        {{print_r("Masculino", true)}}
                    @else
                        {{print_r("Femenino", true)}}
                    @endif
                </li>
                <!-- Especie del personaje -->
                <li class="list-group-item">Especie: 
                    <!-- Validaciones para mantener la coherencia entre los lenguajes -->
                    @if ($personaje['species'] == "Human") 
                        {{print_r('Humano', true)}}
                    @else
                        {{print_r($personaje['species'], true)}}
                    @endif
                </li>
                <!-- Lugar de origen del personaje -->
                <li class="list-group-item">Lugar de origen:
                    <!-- Validaciones para mantener la coherencia entre los lenguajes -->
                    @if ($personaje['origin']['name']=="unknown")
                        {{print_r("Desconocido", true)}}
                    @else
                        {{print_r($personaje['origin']['name'], true)}}
                    @endif
                    </li>
                <!-- Ultima ubicacion del personaje -->
                <li class="list-group-item">Ubicación actual: 
                    <!-- Validaciones para mantener la coherencia entre los lenguajes -->
                    @if ($personaje['location']['name'] == "unknown")
                        {{print_r("Desconocido", true)}}
                    @else
                        {{print_r($personaje['location']['name'], true)}}
                    @endif
                </li>
                <!-- Fecha en que fue añadido el personaje -->
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
    </div>
    <!-- Este formulario es el que envia el valor de la pagina que viene a continuacion con sus 20 personajes correspondientes, llevando el valor de la pagina siguiente a traves de la ruta apiram.alive2 por el metodo POST. Este valor sera cargado en la vista welcome2.blade.php y listara los siguientes 20 personajes -->
    <div class="row mb-3 gap-2">
        <form action="{{ route('apiram.alive2') }}" method="post">
            @csrf
            <input type="hidden" name="siguiente" value="{{ $siguiente }}">
            <button type="submit" class="btn btn-primary">Ir a la siguiente página</button>
        </form>
    </div>
@endsection