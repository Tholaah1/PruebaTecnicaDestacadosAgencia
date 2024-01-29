@extends('layout/plantilla')

@section('tituloPagina', 'API RICK AND MORTY - PRUEBA TECNICA')

@section('contenido')
    <br>
    <div class="row">
        
        <h1>Prueba tecnica - Consumo API Rick and Morty - Nicolas Toledo</h1>
        @foreach ($charactersArray['results'] as $personaje)
        <div class="col-md-6">
            <ul class="list-group">
                <li class="list-group-item active">{{$personaje['name']}}</li>
                <li class="list-group-item"><img src="{{$personaje['image']}}" alt=""></li>
                <li class="list-group-item"></li>
            </ul>
        </div>
        @endforeach
        <a class="btn btn-primary" href="{{$charactersArray['info']['next']}}" role="button">Siguiente Pagina</a>
        
    </div>
@endsection