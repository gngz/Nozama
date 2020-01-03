@extends('layouts.home')

@section('extra-css')

@endsection

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">A página solicitada não foi encontrada!</h1>
        <h2 class="subtitle">Que tal ver umas <a href="{{ url('/search') }}">propostas</a> de compra?</h2>
        
    </div>
</div>

<div class="row centered">
    <img src="{{ asset('images/404.png') }}" alt="">
</div>

@endsection

@section('extra-js')

@endsection