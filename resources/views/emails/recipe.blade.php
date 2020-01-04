<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        .header {
            width: 100%;
            text-align: left;
        }

        .footer {
           text-align:  center;
        }

        th, td {
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        table {
            width: 100%;
        }

        .fact > p {
            margin-top: 0px;
            margin-bottom: 0px;
        }



      


    </style>
</head>
<body>

    <div class="header" style="padding-top:20px;padding-bottom:20px;">
        <img src="{{asset('images/logo.png')}}" alt="">
    </div>
    <div class="body">
        <h2>Recibo</h2>
        <h3>Dados do Cliente</h3>
        <h4>{{ $user->name }}</h4>
        <h4>{{ $user->email }}</h4>
        <br><br>
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Qty</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $purchase->title }}</td>
                    <td>1</td>
                    <td>{{ $price }} €</td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <h3>Dados de Facturação / Envio</h3>
        <div class="fact">
            <p>{{$address->name}}</p>
            <p>{{$address->phone}}</p>
            <br>
            <p>{{$address->address}}</p>
            <p>{{$address->address_extra}}</p>
            <p>{{$address->zip}} {{$address->city}}</p>
            <p>{{$address->region}}</p>
            <p>{{$address->country}}</p>
            <br>
        </div>
        


    </div>
    <div class="footer">
        <p>Copyright Ⓒ Nozama {{date("Y")}} - Todos os direitos reservados.</p>
    </div>
    
</body>
</html>