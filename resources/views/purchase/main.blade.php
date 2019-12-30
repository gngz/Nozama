@extends('layouts.home')

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">As minhas compras</h1>
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
        <a href="{{ route('createPurchase') }}" class="btn primary">Adicionar Compra</a>
    </div>
</div>

<br>

@if ($purchases->total() > 0 )


<div class="row centered">
    <div class="sm col-8">
        @foreach ($purchases as $purchase)

            <div class="list grey">
                <div class="row">
                    <div class="sm col body">
        
                        <strong class="text-focus">{{ $purchase->title }}</strong>
                    </div>
                    <div class="sm col-2">
                       Total de Propostas: 0
                    </div>
                    <div class="sm col-1">
                        <a class="btn primary" href="{{url('/purchase/'.$purchase->id)}}">Ver Compra</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<br>
<div class="row centered">
    <div class="sm col-8">
        A mostrar {{$purchases->count()}} de {{$purchases->total()}} compras.
    </div>
</div>
<br>
<div class="row centered">

    {{ $purchases->links() }}
</div>



@else

<div class="row centered">
    <div class="sm col-8">
        <p>Ainda não possui nenhuma compra! Que tal fazer uma?</p>
    </div>
</div>

@endif





@endsection
