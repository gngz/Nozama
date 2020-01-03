@extends('layouts.home')

@section('extra-css')

@endsection

@section('content')



<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">Carregamento efectuado com sucesso!</h1>
        <h2 class="subtitle">Os créditos já se encontram disponíveis na sua conta!</h2>
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
        <h3 class="subtitle"><span class="text-focus">Carregamento: </span>{{$charge}}€</h3>
        <h3 class="subtitle"><span class="text-focus">Total Pago: </span>{{$amount}}€</h3>
        <h3 class="subtitle"><span class="text-focus">Saldo Disponível: </span>{{$user->balance}}€</h3>
    </div>
</div>
<div class="row centered">
    <div class="sm col-8">
        <a href="{{ route('viewMovements') }}" class="btn inverted btn-md w100">Ver os meus movimentos</a><br><br>
        <a href="{{ route('account') }}" class="btn primary btn-md w100">Voltar à minha conta</a>
    </div>
</div>


</div>



@endsection

