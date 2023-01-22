@extends('layouts/plantilla')
@section('titulo', 'Nueva Categoría')
@section('contenido')

    <form action="{{ route('categories.store') }}" method='POST' enctype="multipart/form-data">
        @csrf
        <form>
            <h1>Nueva categoría</h1>
            <div class="form-group"> <!-- Full Name -->
                <label for="name" class="control-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="nombre">
                @error('name')
                <div class="alert alert-danger" >{{$message}}</div>
                @enderror
            </div>

            <div class="form-group"> <!-- Street 1 -->
                <label for="desc" class="control-label">Descripción</label>
                <textarea class="form-control" id="desc" name="desc" placeholder="Descripción de la categoría" rows="5"></textarea>
                @error('desc')
                <div class="alert alert-danger" >{{$message}}</div>
                @enderror
            </div>

            <div class="form-group"> <!-- Street 1 -->
                <label for="imagen" class="control-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" placeholder="-categoría.jpg">
            </div>
            <div class="form-group"> <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Crear categoría</button>
            </div>

        </form>
    </form>
@endsection
<style>
    form {
        width: 30%;
        margin-left: 35%;
        margin-right: 35%;
    }
</style>
