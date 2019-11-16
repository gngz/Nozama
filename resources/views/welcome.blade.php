<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nozama</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/welcome.css">
    </head>
    <body>
        <nav class="navbar">
            <a class="logo" href="#"><img src="img/logo.png" alt=""></a>
            <ul>
                <li><a class="btn inverted" href="#"><i class="fas fa-user"></i> Entrar</a></li>
                <li><a class="btn primary"  href="#">Comprar</a></li>
            </ul>
        </nav>
    </body>
</html>
