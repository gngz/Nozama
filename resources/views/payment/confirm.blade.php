@extends('layouts.home')

@section('extra-css')

@endsection

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">Pagamento - Passo 1</h1>
        <h2 class="subtitle">Confirmar compra</h2>

    </div>
</div>

<div class="row centered">
    <div class="sm col-8">
        <h3 class="title">{{ $purchase->title}}</h3>
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
        <div class="search-img">
            <a href="{{ route('viewPurchase', $purchase->id)}}">
                @if ($purchase->images->count() > 0)
                    <img class="search-img" src="/storage/{{ $purchase->images[0]->path }}">
                @endif
            </a>
        </div>
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
        <p class="text-focus">Descrição:</p>
        <p> {!! $proposal->description !!}</p>
    </div>
</div>

<div class="row centered">
    <div class="sm col-8">
        <p><span class="text-focus">Preço:</span>  {{$proposal->price}}€</p>
        
    </div>
</div>

<br>
<div class="row centered">
    <div class="sm col-8">
        <form action="" method="post">
            @csrf
            <button type="submit" class="btn primary btn-md w100">Confirmar Pagamento</button>
        </form>
 
    </div>
</div>

@endsection

@section('extra-js')

@endsection