@extends('layouts.plantilla')
@section('titulo', 'Listado de gangas')
@section('contenido')
    <table class="table table-dark table-hover">
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Usuario</th>
        </tr>
        @foreach($gangas as $ganga)
            <th>{{$ganga->imagen}}</th>
            <th>{{$ganga->name}}</th>
            <th>{{$ganga->category}}</th>
            <th>{{$ganga->description}}</th>
            <th>{{$ganga->price}}</th>
            <th>{{$ganga->user->name}}</th>

        @endforeach

    </table>
    <div>{{$gangas->links('pagination::bootstrap-4')}}</div>
@endsection
