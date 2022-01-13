@extends('layout')
@section('content')
<h1>Juego de letras</h1>
    <form class="form-inline" >
        <div class="form-group mx-sm-3 mb-5">
            <label for="inputText" class="sr-only">Password</label>
            <input type="text" class="form-control" id="inputEjercicio5" placeholder="Texto">
        </div>
        <button onclick="getInputText();" type="button" class="btn btn-info mb-5">Generar cadena</button>
    </form>

@endsection
