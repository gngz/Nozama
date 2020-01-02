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
        <h2 class="title">Passo 1 - Valor a carregar</h2>
    </div>
</div>

<form action="{{ route('creditConfirm') }}" method="post">
    @csrf
    <div class="row centered">
        <div class="sm col-8 form-field">
            <label class="label" for="value">Valor a carregar (Euros):</label>
            <input type="text" name="value" id="value" class="input" placeholder="Introduza o valor a carregar na sua conta Nozama, e.g.: 200€">
        </div>
    </div>

    <div class="row centered">
        <div class="sm col-8 form-field" id="fees">
            
        </div>
    </div>

    <div class="row centered">
        <div class="sm col-8" >
            <button type="submit" class="btn primary btn-md w100">Creditar Valor</button>
        </div>
    </div>
</form>
</div>



@endsection

@section('extra-js')

<script>

    $('#value').keyup( function() {

        var value = $('#value').val();
     

        $('#fees').empty();

        if(value !== "" && !isNaN(value)) {
           
            var total = calculateTotal(value);
            var fees = (total - value).toFixed(2);
            
            $('#fees').append(`<p><span class="text-focus">Valor a creditar: </span>${value}€</p>`)
            $('#fees').append(`<p><span class="text-focus">Taxas: </span>${fees}€</p>`)
            $('#fees').append(`<p><span class="text-focus">Total: </span>${total}€</p>`)

        }
 

    });

    function calculateTotal(amount) {

        return ((parseFloat(amount) + 0.25) / (1- 0.029 )).toFixed(2);

        
    }

</script>

@endsection