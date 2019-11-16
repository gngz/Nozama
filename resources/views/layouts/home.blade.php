<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nozama</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/nozama.css') }}">
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
            <ul>
                <li>Sobre Nós</li>
                <li>Termos de Utilização</li>
                <li>Política de Privacidade</li>
            </ul>
            <div class="copyright">
                <p>Copyright Ⓒ Nozama 2019 - Todos os direitos reservados.</p>
            </div>
        </footer>
    </body>
</html>
