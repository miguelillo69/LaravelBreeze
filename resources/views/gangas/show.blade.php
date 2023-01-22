@extends('layouts/plantilla')
@section('titulo', 'Muestra Ganga')
@section('contenido')
    <div class="col-6">
        <div class="card mb-3" style="max-width: 400px;">
            <div class="row g-0">
                <div class="col-md-4" >
                    <img class="border mt-3 p-2" src="{{ asset("/storage/img/$ganga->id-ganga-severa.jpg")}}">
                </div>
                <div class="col-md-8">
                    @if(Auth::user())
                        <form action="{{ route('gangas.like', $ganga->id) }}" method="POST" class="d-inline">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-white like " type="submit"><a class="bi bi-hand-thumbs-up-fill text-success"></a></button><span id="likes">{{$ganga->likes}} </span>
                        </form>
                        <form action="{{ route('gangas.unlike', $ganga->id) }}" method="POST" class="d-inline">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-white dislike " type="submit"><a class="bi bi-hand-thumbs-down-fill text-danger"></a></button><span id="dislikes"> {{$ganga->unlikes}}</span>
                        </form>
                    @else
                        <button class="btn btn-white like " type="submit"><a class="bi bi-hand-thumbs-up-fill text-success"></a></button><span id="likes" disabled="true">{{$ganga->likes}} </span>
                        <button class="btn btn-white dislike " type="submit"><a class="bi bi-hand-thumbs-down-fill text-danger"></a></button><span id="dislikes" disabled="true"> {{$ganga->unlikes}}</span>
                    @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$ganga->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$ganga->description}}</h6>
                    <h5 class="card-title">Precio: {{$ganga->price}}€</h5>
                    <h5 class="card-title">Precio ganga <span style="color: red">{{$ganga->price_sale}}</span>€</h5>
                    <button class="btn btn-primary"><a class="bi bi-link-45deg" style="text-decoration: none; color: white; " href="{{$ganga->url}}"></a></button>
                    @if(Auth::user() && (Auth::id() === $ganga->user_id || Auth::user()->rol === 'admin'))
                        <button class="btn btn-success " ><a class="bi bi-pencil-fill" style="text-decoration: none; color: white" href="{{  route('gangas.edit', $ganga) }}"></a></button>
                        <form action="{{ route('gangas.destroy', $ganga) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit"><a class="bi bi-trash-fill text-white"></a></button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    div {
        margin-left: 20px;
        width: 100%;
    }

    img {
        height: 350px;
    }

    button {
        width: 50px;
        height: 40px;
    }
    a{
        font-size: 20px;
    }

    .like > a {
        font-size: 30px;
    }
    .dislike > a {
        font-size: 30px;
    }
    #likes {
        margin-top: -20px;
    }

</style>
