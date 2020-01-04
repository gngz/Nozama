<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>

        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        .btn.primary {
            background: -webkit-gradient(linear, left top, left bottom, from(#FFB453), color-stop(7%, #F18904), to(#F18904));
            background: linear-gradient(180deg, #FFB453 0%, #F18904 7%, #F18904 100%);
            background: linear-gradient(180deg, #FFB453 0%, #F18904 7%, #F18904 100%);
            color: white;
            box-sizing: border-box;

        }

        .btn {
            outline: none;
            display: inline-block !important;
            border-radius: 4px;
            border: 1px solid transparent;
            padding-left: 1.25em;
            padding-right: 1.25em;
            padding-top: 0.5em;
            padding-bottom: 0.5em;
            font-family: "Raleway", sans-serif;
            box-sizing: border-box;
            -webkit-transition: background-color 0.4s ease-out;
            transition: background-color 0.4s ease-out;
            -webkit-transition: color 1s ease-out;
            transition: color 1s ease-out;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }


        html, body {
            margin: 0;
            padding: 0;
        }

        .img {
            max-height: 200px;
        }

        .header {
            width: 100%;
        }

        .footer {
           text-align:  center;
        }

        .text-center {
            text-align: center;
        }

      


    </style>
</head>
<body>

    <div class="header" style="padding-top:20px;padding-bottom:20px;">
        <img src="{{asset('images/logo.png')}}" alt="">
    </div>
    <div class="body">
        <h2>Recebeu uma proposta do utilizador {{$proposal->user->name }}.</h2>
        <h3>Compra: {{ $purchase->title }}</h3>
        <h4>Estado: {{ $proposal->state == 'used' ? "Usado" : "Novo"  }}</h4>
        <h4>Preço: {{ $proposal->price }}€</h4>

        @if ($proposal->images->count() > 0)
            <img class="search-img" src="{{url('/storage'). '/' .$proposal->images[0]->path }}">
        @else
            <img class="search-img" src="https://via.placeholder.com/260x200.png?text=Sem%20Foto">
        @endif

        <br>
        <p>{!! $proposal->description !!}</p>
    
        <br>
            <p class="text-center"><a href="{{ route('viewProposal' , $proposal->id) }}" class="btn primary">Ver proposta</a></p>
        <br>
        <br>



    </div>
    <div class="footer">
        <p>Copyright Ⓒ Nozama {{date("Y")}} - Todos os direitos reservados.</p>
    </div>
    
</body>
</html>