<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Nozama') }}</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/nozama.css') }}">
    </head>
    <body>
        <nav class="navbar">
            <a class="logo" href="/"><img src="{{ asset('img/logo.png') }}" alt=""></a>
            <ul>
                @auth
                    <li><a class="btn inverted" href="{{ route('account') }}"><i class="icon fas fa-user"></i> Minha Conta</a></li>
                    <li><a class="btn primary"  href="#">Comprar</a></li>
                    <li><a class="btn primary" href="{{ route('logout') }}" id="logout"><i class="icon fas fa-sign-out-alt"></i><span>Sair</span></a></li>
                @else
                    <li><a class="btn inverted" href="{{ route('login') }}"><i class="icon fas fa-user"></i> Entrar</a></li>
                    <li><a class="btn primary"  href="{{ route('register') }}">Registar</a></li>
                @endauth
                
                
            </ul>
            <a class="btn primary" id="hamburguer"  href="#"><i class="fas fa-bars"></i></a>
        </nav>
        <div class="content">
            @yield('content')
        </div>
        <footer>
            <div class="footer">
                <ul>
                    <li>Sobre Nós</li>
                    <li>|</li>
                    <li>Termos de Utilização</li>
                    <li>|</li>
                    <li>Política de Privacidade</li>
                </ul>
            </div>
            <div class="copyright">
                <p>Copyright Ⓒ Nozama {{date("Y")}} - Todos os direitos reservados.</p>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
