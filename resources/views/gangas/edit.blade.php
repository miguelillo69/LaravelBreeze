@extends('layouts/plantilla')
@section('titulo', 'Nueva Ganga')
@section('contenido')

    <form action="{{ route('gangas.update', $ganga->id) }}" method='POST' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <form>
            <h1>Modificar ganga</h1>
            <div class="form-group"> <!-- Full Name -->
                <label for="title" class="control-label">Titulo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Titulo" value="{{$ganga->title}}">
                @error('title')
                <div class="alert alert-danger" >{{$message}}</div>
                @enderror
            </div>

            <div class="form-group"> <!-- Street 1 -->
                <label for="description" class="control-label">Descripción</label>
                <textarea class="form-control" id="description" name="description" placeholder="Descripción del producto" rows="5" >{{$ganga->description}}</textarea>
                @error('description')
                <div class="alert alert-danger" >{{$message}}</div>
                @enderror
            </div>

            <div class="form-group"> <!-- Street 1 -->
                <label for="imagen" class="control-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" placeholder="-ganga-severa.jpg">
            </div>

            <div class="form-group"> <!-- State Button -->
                <label for="category" class="control-label">Categoría</label>
                <select class="form-control" id="category" name="category">
                    <option value="{{$ganga->categoria->id}}">{{$ganga->categoria->name}}</option>
                    @foreach($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('category')
                <div class="alert alert-danger" >{{$message}}</div>
                @enderror
            </div>

            <div class="form-group"> <!-- Street 2 -->
                <label for="url" class="control-label">Url</label>
                <input type="text" class="form-control" id="url" name="url" placeholder="Url" value="{{$ganga->url}}">
                @error('url')
                <div class="alert alert-danger" >{{$message}}</div>
                @enderror
            </div>

            <div class="form-group"> <!-- City-->
                <label for="price" class="control-label">Precio</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Precio" value="{{$ganga->price}}">
                @error('price')
                <div class="alert alert-danger" >{{$message}}</div>
                @enderror
            </div>

            <div class="form-group"> <!-- City-->
                <label for="price_sale" class="control-label">Precio ganga</label>
                <input type="text" class="form-control" id="price_sale" name="price_sale" placeholder="Precio ganga" value="{{$ganga->price_sale}}">
                @error('price_sale')
                <div class="alert alert-danger" >{{$message}}</div>
                @enderror
            </div>

            <div class="form-group"> <!-- Zip Code-->
                <label class="form-check-label" for="available">Disponible</label>
                <input class="form-check-input" type="checkbox" value="{{$ganga->available}}" id="available" name="available">

            </div>

            <div class="form-group"> <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Modificar ganga</button>
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
