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
        }

        .header {
            width: 100%;
        }

        .footer {
           text-align:  center;
        }

      


    </style>
</head>
<body>

    <div class="header" style="padding-top:20px;padding-bottom:20px;">
        <img src="https://nozama.ga/img/logo.png" alt="">
    </div>
    <div class="body">
        <h3>Recebeu uma proposta de compra {{$user->name }}.</h3>

        <p><strong>Assunto:</strong> {{$subject}}</p>
        <strong>Mensagem:</strong>
        {!! $message_body !!}

        <hr>
        <p>Responder este email para enviar resposta ao utilizador.</p>
        <hr>

    </div>
    <div class="footer">
        <p>Copyright Ⓒ Nozama {{date("Y")}} - Todos os direitos reservados.</p>
    </div>
    
</body>
</html>