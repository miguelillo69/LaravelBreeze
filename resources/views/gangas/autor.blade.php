@extends('layouts/plantilla')
@section('titulo', 'Listado de gangas')
@section('contenido')
    <h1>GANGAS {{strtoupper(Auth::user()->name)}}</h1>
    <table class="table table-dark table-hover text-center">
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Descripción</th>
            <th>URL Web</th>
            <th>Precio</th>
            <th>Precio Ganga</th>
            <th>Usuario</th>
            <th>Acciones</th>
        </tr>
        @foreach($gangas_autor as $ganga)
            <tr class="align-middle">
                <td><img src="{{ asset("/storage/img/$ganga->id-ganga-severa.jpg")}}"></td>
                <td>{{$ganga->title}}</td>
                <td>{{$ganga->categoria->name}}</td>
                <td>{{$ganga->description}}</td>
                <td><button><a style="text-decoration: none; color: black" href="{{$ganga->url}}">URL Web</a></button></td>
                <td>{{$ganga->price}}€</td>
                <td><span style="color:red;">{{$ganga->price_sale}}€</span></td>
                <td>{{$ganga->user->name}}</td>
                <td><button><a class="navbar-brand" href="{{  route('gangas.show', $ganga->id) }}">Show Ganga</a></button></td>
            </tr>
        @endforeach

    </table>
    <div class="pagina">{{$gangas_autor->links('pagination::bootstrap-5')}}</div>
@endsection

<style>
    img {
        height: 100px;
    }
</style>
