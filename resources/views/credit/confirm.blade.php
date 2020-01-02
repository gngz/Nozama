@extends('layouts.home')

@section('extra-css')

@endsection

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">Adicionar saldo</h1>
        <h2 class="subtitle">Aqui poderá adicionar saldo à sua conta Nozama.</h2>
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
        <h2 class="title">Passo 2 - Confirmar e Pagar</h2>
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
        <h4 class="subtitle"><span class="text-focus">Valor:</span> {{ $credit['amount']}}€</h4>
        <h4 class="subtitle"><span class="text-focus">Taxas:</span> {{ $credit['fees']}}€</h4>
        <h3 class="subtitle"><span class="text-focus">Total a pagar:</span> {{ $credit['total']}}€</h3>
        
    </div>
</div>

<br>
<br>

<div class="row centered">
    <div class="sm col-8" >
        <button id="checkout" type="submit" class="btn primary btn-md w100">Checkout</button>
    </div>
</div>

</div>



@endsection

@section('extra-js')
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('pk_test_rSdHco7EqkhL0X71HmQGgWRt00okpFxU38');

    $('#checkout').on('click', function() {
        checkout();
    });


    function checkout() {
        stripe.redirectToCheckout({
         sessionId: '{{ $checkout_session }}'
        });
        
    }

</script>

@endsection