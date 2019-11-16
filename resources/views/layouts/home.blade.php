<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nozama</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    </head>
    <body>
        <nav class="navbar">
            <a class="logo" href="/"><img src="img/logo.png" alt=""></a>
            <ul>
                @auth
                    <li><a class="btn inverted" href="{{ route('login') }}"><i class="fas fa-user"></i> Member Area</a></li>
                @else
                    <li><a class="btn inverted" href="{{ route('login') }}"><i class="fas fa-user"></i> Entrar</a></li>
                @endauth
                
                <li><a class="btn primary"  href="#">Comprar</a></li>
            </ul>
        </nav>
        @yield('content')

        <footer>
        </footer>
    </body>
</html>
