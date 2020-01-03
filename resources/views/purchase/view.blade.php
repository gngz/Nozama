@extends('layouts.home')
@section('extra-css')
    <link href="https://cdn.jsdelivr.net/npm/lightgallery.js@1.1.3/dist/css/lightgallery.min.css" rel="stylesheet">
@endsection
@section('content')

@auth
    @if ($user->role == "admin" )
    <div class="row centered">
        <div class="sm col-8">
            <h2 class="title">Administrador</h2>
        </div>
    </div>

    <div class="row centered">
        <div class="sm col-8">
            <a href="{{ url('/purchase/delete/'. $purchase->id )}}" class="btn primary">Eliminar Compra</a>
        </div>
    </div>

    @endif 
@endauth



<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">{{ $purchase->title }}</h1>
        <p>{{$purchase->category->name}} » {{ $purchase->subcategory->name}}</p>
        <p>
            <span class="text-focus">Comprador:</span> <a href="{{ url('/profile/'.$purchase->user->id)}}">{{ $purchase->user->name }}</a>
        </p>
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

        {!! $purchase->description !!}
    </div>
</div>

@if ($purchase->max_price or $purchase->min_price)
    <div class="row centered">
        <div class="sm col-8">
            <h2 class="title">Restrições</h2>
        </div>
    </div>
    @if ($purchase->max_price)
    <div class="row centered">
        <div class="sm col-8">
            Preço Máximo: {{$purchase->max_price}}€
        </div>
    </div>
    @endif
    @if ($purchase->min_price)
    <div class="row centered">
        <div class="sm col-8">
            Preço Mínimo: {{$purchase->min_price}}€
        </div>
    </div>
    @endif

@endif


@auth

    @if ($user->id != $purchase->user_id)


    <div class="row centered">
        <div class="sm col-8">
            <h2 class="title">Ações</h2>
        </div>
    </div>

    <div class="row centered">
        <div class="sm col-8">
        <a href="{{ url('/proposals/make/'. $purchase->id) }}" class="btn primary">Fazer Proposta</a> 
        <a href="{{ url('/profile/contact/'. $purchase->user->id) }}" class="btn primary">Contactar</a>
        </div>
    </div>

    @else
    <div class="row centered">
        <div class="sm col-8">
            <h2 class="title">Propostas</h2>
        </div>
    </div>
    
    <div class="row centered">
        <div class="sm col-8">
            @foreach ($proposals as $proposal)
            <div class="list grey">
               <div class="row">
                    <div class="sm col body">
                        <strong class="text-focus">Proposta por: </strong>&ThickSpace;<a href="{{ url('/profile/'.$proposal->user->id)}}">{{ $proposal->user->name }}</a> 
                    </div> 
                    <div class="sm col-1">
                        Condição: {{ $proposal->state == "used" ? "Usado" : "Novo" }}
                     </div>
                    <div class="sm col-1">
                       Preço: {{ $proposal->price }}€
                    </div>
                    <div class="sm col-1">
                       <a href="{{ url('/proposals/'.$proposal->id)}}" class="btn primary">Ver Proposta</a>
                    </div>
                   
               </div>
            </div>
            @endforeach
            
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
            <a href="{{ url('/purchase/edit/'. $purchase->id )}}" class="btn primary">Editar Compra</a>
        </div>
    </div>



    @endif
@endauth



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