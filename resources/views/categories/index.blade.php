@extends('layouts/plantilla')
@section('titulo', 'Listado de gangas')
@section('contenido')
    <h1>CATEGORÍAS</h1>
    <button class="btn btn-warning btn-sm mb-3"><a class="text-black fw-bold"  href="{{  route('categories.create') }}">Nueva categoría</a></button>
    <table class="table table-dark table-hover text-center">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
        @foreach($categories as $category)
            <tr class="align-middle">
                <td>{{$category->name}}</td>
                <td>{{$category->desc}}</td>
                <td><img src="{{ asset("/storage/img/$category->id-category.jpg")}}"></td>
                <td><button><a class="navbar-brand" href="{{  route('categories.show', $category->id) }}">Show Categoría</a></button></td>
            </tr>
        @endforeach
    </table>
@endsection

<style>
    img {
        width: 200px;
    }
</style>
