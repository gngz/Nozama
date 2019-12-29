@extends('layouts.home')

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">{{ $purchase->title }}</h1>
    </div>
</div>



<div class="row centered">
    <div class="sm col-8">
        <h2 class="title">Descrição</h2>
    </div>
</div>

<div class="row centered">
    <div class="sm col-8">

        {!! $purchase->description !!}
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
        <h2 class="title">Imagens</h2>
    </div>
</div>

@auth
    @if ($user->id != $purchase->user_id)
    <div class="row centered">
        <div class="sm col-8">
            <a href="#" class="btn primary">Fazer Proposta</a>
        </div>
    </div>

    @else
    <div class="row centered">
        <div class="sm col-8">
            <h2 class="title">Propostas</h2>
        </div>
    </div>
    @endif
@endauth



@auth
    @if ($user->id == $purchase->user_id)
    <div class="row centered">
        <div class="sm col-8">
            <h2 class="title">Ações</h2>
        </div>
    </div>

    <div class="row centered">
        <div class="sm col-8">
            <a href="{{ url('/purchase/delete/'. $purchase->id )}}" class="btn primary">Eliminar Compra</a>
        </div>
    </div>

    @endif
@endauth



@endsection
