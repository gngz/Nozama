@extends('layouts.home')
@section('extra-css')
    <link href="https://cdn.jsdelivr.net/npm/lightgallery.js@1.1.3/dist/css/lightgallery.min.css" rel="stylesheet">
@endsection
@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">Proposta -  <a href="{{route("viewPurchase",$purchase->id)}}">{{ $purchase->title }}</a></h1>
        <h2 class="subtitle">De: <a href="{{ url('/profile/'. $proposal->user->id) }}">{{ $proposal->user->name }}</a></h2>
    </div>
</div>

@if($images)

    <div class="row centered">
        <div class="sm col-8">
            <div id="lightgallery">
                @foreach ($images->get() as $image)
                    <a href="/storage/{{ $image->path }}"><img class="purchase-img" src="/storage/{{ $image->path }}"></a>
                @endforeach
            </div>
            
        </div>
    </div>
@endif


<div class="row centered">
    <div class="sm col-8">
        <h2 class="title">Descrição</h2>
    </div>
</div>
<div class="row centered">
    <div class="sm col-8">
        {!! $proposal->description !!}
    </div>
</div>
<br>
<div class="row centered">
    <div class="sm col-8">
        <span class="text-focus">Condição:</span> {{ $proposal->state == "used" ? "Usado" : "Novo" }}
    </div>
</div>
<br>
<div class="row centered">
    <div class="sm col-8">
        <span class="text-focus">Preço:</span> {{ $proposal->price }}€
    </div>
</div>

<div class="row centered">
    <div class="sm col-8">
        <h2 class="title">Ações</h2>
    </div>
</div>

@if ($user->id == $purchase->user->id)
<div class="row centered">
    <div class="sm col-8">
        
        <a href="{{route('payProposal', $proposal->id)}}" class="btn primary">Comprar</a>         
        <a href="{{ url('/profile/contact/'. $proposal->user->id) }}" class="btn inverted">Contactar</a>
    </div>
</div>
@endif

@if ($user->id == $proposal->user->id)
<div class="row centered">
    <div class="sm col-8">
        
        <a href="http://" class="btn primary">Editar Proposta</a>         
        <a href="{{route("deleteProposal",$proposal->id)}}" class="btn inverted">Remover Proposta</a>
    </div>
</div>
@endif





@endsection

@section('extra-js')

<script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/dist/js/lightgallery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lg-thumbnail@1.1.0/dist/lg-thumbnail.min.js"></script>
<script>
    $(document).ready(function() {
        $('#lightgallery').lightGallery( {
            thumbnail: true
        });
    })
     
</script>
@endsection