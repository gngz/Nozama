@extends('layouts.home')

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">Sub-Categoria {{$subcategory->name}}</h1>
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
        <h2 class="title">Compras</h2>
    </div>
</div>



@if ($purchases->total() > 0 )


<div class="row centered">
    <div class="sm col-8">

        @foreach ($purchases as $purchase)
               <div class="search">
                   <div class="search-img">
                    @if ($purchase->images->count() > 0)
                    <img class="search-img" src="/storage/{{ $purchase->images[0]->path }}">
                    @else
                        <img class="search-img" src="https://via.placeholder.com/260x200.png?text=Sem%20Foto">
                    @endif

                   </div>
                   <div class="search-body">

                    <h2 class="title"><a href="{{ route('viewPurchase', $purchase->id)}}">{{ $purchase->title }}</a></h2>
                    <p><span class="text-focus">Comprador:</span> <a href="{{ route('viewProfile', $purchase->id)}}">{{ $purchase->user->name }}</a></p>
                    <p> {{$purchase->category->name}} » {{ $purchase->subcategory->name}}</p>

                    @if ($purchase->max_price) 
                            <div class="p-tag">
                                Até {{ $purchase->max_price}}€
                            </div>
                    @endif

                    @auth
                    <a href="{{ url('/proposals/make/'. $purchase->id) }}" class="btn primary proposal">Fazer Proposta</a> 
                    @endauth

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
        <p>Esta sub-categoria não possui compras..</p>
    </div>
</div>

@endif




@endsection
