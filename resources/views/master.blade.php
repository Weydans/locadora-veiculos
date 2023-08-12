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
                    <li class="nav-item"><a class="nav-link" href="{{ url('/usuarios') }}">Usuários</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url( '/veiculos' ) }}">Veículos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/relatorios') }}">Relatório</a></li>
                </ul>
            </div>
        </nav>
        <div class="container my-4">
            {{ $slot ?? '' }}
        </div>
        <footer class="p-3 bg-dark text-white text-center">
            <span>Desenvolvido por Weydans Barros</span>
        </footer>
    </body>
</html>
