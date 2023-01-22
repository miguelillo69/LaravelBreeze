@extends('layouts/plantilla')
@section('titulo', 'Muestra Categoría')
@section('contenido')
    <div class="col-6">
        <div class="card mb-3" style="max-width: 400px;">
            <div class="row g-0">
                <div class="col-md-4" >
                    <img class="border mt-3 p-2" src="{{ asset("/storage/img/$category->id-category.jpg")}}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$category->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$category->desc}}</h6>
                        <button class="btn btn-success " ><a class="bi bi-pencil-fill" style="text-decoration: none; color: white" href="{{  route('categories.edit', $category) }}"></a></button>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit"><a class="bi bi-trash-fill text-white"></a></button>
                        </form>
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
        width: 350px;
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
