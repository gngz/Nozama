@extends('layouts.home')

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">Pesquisa</h1>
    </div>
</div>

<form action="{{url('/search')}}" method="get">
    
    <div class="row centered">
        <div class="sm col-8">
            <div class="row gap centered">
                <div class="sm col-9 vcenter">
                    <input class="input" type="text" name="query" id="" placeholder="Escreva um termo ao qual pretende pesquisar. eg: carro." value="{{ $query }}">
                </div>
                <div class="sm col-1 vcenter">
                    <input type="submit" value="Pesquisar" class="btn primary btn-md w100">
                </div>
            </div>
    
        </div>
    </div>
        
</form>
<br>



@if ($purchases->total() > 0 )


<div class="row centered">
    <div class="sm col-8">

        @foreach ($purchases as $purchase)
               <div class="search">
                   <div class="search-img">
                        <a href="{{ route('viewPurchase', $purchase->id)}}">
                            @if ($purchase->images->count() > 0)
                            <img class="search-img" src="/storage/{{ $purchase->images[0]->path }}">
                            @else
                                <img class="search-img" src="https://via.placeholder.com/260x200.png?text=Sem%20Foto">
                            @endif
                        </a>

                   </div>
                   <div class="search-body">

                    <h2 class="title"><a href="{{ route('viewPurchase', $purchase->id)}}">{{ $purchase->title }}</a></h2>
                    <p><span class="text-focus">Comprador:</span> <a href="{{ route('viewProfile', $purchase->user->id)}}">{{ $purchase->user->name }}</a></p>
                    <p> {{$purchase->category->name}} » {{ $purchase->subcategory->name}}</p>

                    @if ($purchase->max_price) 
                            <div class="p-tag">
                                Até {{ $purchase->max_price}}€
                            </div>
                    @endif

                    @auth
                        @if ($purchase->user != Auth::user())
                            <a href="{{ url('/proposals/make/'. $purchase->id) }}" class="btn primary proposal">Fazer Proposta</a> 
                        @endif
                    @endauth

                   </div>
               </div>
        @endforeach
         
    {{--     @foreach ($purchases as $purchase)

            <div class="list grey">
                <div class="row">
                    <div class="sm col body">
                        <span>
                            <strong class="text-focus"> <a href="{{ route('viewPurchase', $purchase->id)}}">{{ $purchase->title }}</a></strong>
                            <span> Comprador: <a href="{{ route('viewProfile', $purchase->id)}}">{{ $purchase->user->name }}</a></span>
                        </span>
                    </div>
               
                </div>
            </div>
        @endforeach --}}
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
        <p>A pesquisa não devolveu resultados...</p>
    </div>
</div>

@endif




@endsection
