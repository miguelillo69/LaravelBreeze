<nav class="navbar navbar-light bg-light">
    <div class="container-fluid navegador">
        <p>Ganga ░▒▓ Severa</p>
        <a class="navbar-brand navegador" href="{{  route('gangas.index') }}">Listado Gangas</a>

        @if(Auth::user())
            <a class="navbar-brand navegador" href="{{  route('gangas.autor', Auth::user()->id) }}">Listado {{Auth::user()->name}} </a>
            <a class="navbar-brand navegador" href="{{  route('gangas.create') }}">Nueva ganga</a>
            @if(Auth::user()->rol === 'admin')
                <a class="navbar-brand navegador" href="{{  route('categories.index') }}">Listar categorías</a>
            @endif
            <span>Bienvenido <b>{{Auth::user()->name}}</b></span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-dark btn-sm" type="submit">
                    {{ __('Log Out') }}
                </button>
            </form>
        @else
            <button class="btn btn-dark btn-sm" type="submit">
                <a href="{{ route('login') }}" style="text-decoration: none; color: white">Log in</a>
            </button>
        @endif
    </div>
</nav>
<style>
    p {
        font-size: 30px;
        padding: 20px 10px 10px 10px;
    }
    .navegador {
        background-color: blue;
        color: white;
    }

    .navegador > a {
        color: white;
        text-align: right;
    }
    .navegador > a:hover {
        color: turquoise;
    }

    b {
        font-size: 20px;
    }
</style>
