@extends('layout')
@section('content')
    <h1>Listado de direcciones</h1>
    <ul>
        @foreach($direcciones as $direccion)
        <li>
            <a href="{{ route('direccion.show', $direccion->descripcion) }}">
                {{ $direccion->descripcion }}
            </a>
        </li>
        @endforeach
    </ul>
@endsection
