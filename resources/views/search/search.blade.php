@extends('layouts.home')

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">Pesquisa</h1>
    </div>
</div>

<form action="" method="get">
<div class="row centered">
    <div class="sm col-7">
        
    <input type="text" class="input" name="query" id="" placeholder="Insira um termo a pesquisar e.g: carro" value="{{ $query }}"> 
    </div>
    <div class="sm col-1">
        <button class="btn primary" type="submit">Procurar</button>
    </div>
</div>
</form>
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
        <p>A pesquisa não devolveu resultados...</p>
    </div>
</div>

@endif




@endsection
