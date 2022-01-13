@extends('layout')
@section('content')
    <h1>Ejercicio # 5</h1>
    <div class="row" style="height:100%">
        <div class="col-4 text-right">
            <button type="button" onclick="setButtons();" class="btn form-check control shadow btn-warning" id="button1">Boton #1</button>
        </div>
        <div class="col-4 text-right">
            <button type="button" onclick="setButtons();" class="btn form-check control shadow btn-primary" id="button2">Boton #2</button>
        </div>
    </div>
@endsection
