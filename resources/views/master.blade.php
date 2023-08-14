<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Locadora de Veículos</title>

        <link href="{{ asset('css/app.css'); }}" rel="stylesheet" />
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand"><b>Locadora</b></a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Reservas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url( '/cars' ) }}">Veículos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/users') }}">Usuários</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/logout') }}">Sair</a></li>
                </ul>
            </div>
        </nav>
        <div class="container my-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif            

        @isset( $messageSuccess )
            <div class="alert alert-success">{{ $messageSuccess }}</div>
        @endisset

        @yield('content')
        </div>
        <footer class="p-3 bg-dark text-white text-center">
            <span>Desenvolvido por Weydans Barros</span>
        </footer>
    </body>
</html>
