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

@if ($purchases->total() > 0 )


<div class="row centered">
    <div class="sm col-8">
        <ul>
        @foreach ($purchases as $purchase)
            <li><a href="{{url('/purchase/'.$purchase->id)}}">{{ $purchase->title }}</a></li>
        @endforeach
        </ul>
    </div>
</div>

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
