@extends('layouts.home')

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">As minhas propostas</h1>
    </div>
</div>


<br>

@if ($proposals->total() > 0 )


<div class="row centered">
    <div class="sm col-8">
        @foreach ($proposals as $proposal)

            <div class="list grey">
                <div class="row">
                    <div class="sm col-1 body">
                        <p><span class="text-focus">Item:</span> <a href="{{ route('viewPurchase',$proposal->purchase->id) }}">{{ $proposal->purchase->title }}</a></p>
                    </div>
                    <div class="sm col-1">
                        Condição: {{ $proposal->state == "used" ? "Usado" : "Novo" }}
                     </div>
                    <div class="sm col-1">
                       Preço: {{ $proposal->price }}€
                    </div>
                    <div class="sm col"></div>
                    <div class="sm col-1">
                        <a class="btn primary" href="{{url('/proposals/'.$proposal->id)}}">Ver Proposta</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<br>
<div class="row centered">
    <div class="sm col-8">
        A mostrar {{$proposals->count()}} de {{$proposals->total()}} propostas.
    </div>
</div>
<br>
<div class="row centered">

    {{ $proposals->links() }}
</div>



@else

<div class="row centered">
    <div class="sm col-8">
        <p>Ainda não possui nenhuma compra! Que tal fazer uma?</p>
    </div>
</div>

@endif





@endsection
