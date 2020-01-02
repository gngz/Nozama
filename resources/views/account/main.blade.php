@extends('layouts.home')

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">A minha conta</h1>
    </div>
</div>

<div class="row centered">
    <div class="sm col-8">
        <h2 class="title">{{$user->name}} {{ Auth::user()->role == 'admin' ? '(Administrador)' : ''}}</h2>
        <h3 class="subtitle">{{$user->email}}</h3>
        <h4 class="subtitle">Saldo: {{ $user->balance }}€</h4>

        
    </div>
</div>

<div class="row centered">
    <div class="sm col-8">
        <a href="{{ route('editAccount') }}" class="btn inverted">Editar Conta</a> 
        <a href="{{ route('addCredit') }}" class="btn primary">Adicionar Saldo</a>
    </div>
</div>
<br>

<div class="row centered">
    <div class="sm col-8">
        <h2 class="title">Pesquisar Compras</h2>
     
    </div>
</div>

<form action="{{url('/search')}}" method="get">

<div class="row centered">
    <div class="sm col-8">
        <div class="row gap centered">
            <div class="sm col-9 vcenter">
                <input class="input" type="text" name="query" id="" placeholder="Escreva um termo ao qual pretende pesquisar. eg: carro.">
            </div>
            <div class="sm col-1 vcenter">
                <input type="submit" value="Pesquisar" class="btn primary btn-md w100">
            </div>
        </div>

    </div>
</div>
    
</form>
    
<div class="row centered">
    <div class="sm col-8">
        <h2 class="title">Ações</h2>
     
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
        <div class="row space wrap gap">
            <div class="sm col">
                <a href="{{ route('viewPurchases') }}"><button class="btn flat-primary btn-option">As Minhas Compras</button></a>
            </div>
            <div class="sm col">
                    <a href="{{ route('viewProposals') }}""><button class="btn flat-primary btn-option">As Minhas Propostas</button></a>
            </div>
            <div class="sm col">
                <a href="{{ route('addressList') }}"><button class="btn flat-primary btn-option">Moradas</button></a>
            </div>
            <div class="sm col">
                <a href="{{ route('creditView') }}"><button class="btn flat-primary btn-option">Créditos</button></a>
            </div>
        </div>
    </div>
</div>



@endsection
