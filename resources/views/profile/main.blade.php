@extends('layouts.home')

@section('content')

@auth
    @if (Auth::user()->role == "admin" )
    <div class="row centered">
        <div class="sm col-8">
            <h2 class="title">Administrador</h2>
        </div>
    </div>

    <div class="row centered">
        <div class="sm col-8">
            <a href="{{ route('removeAccount', $user->id) }}" class="btn primary">Eliminar Utilizador</a>
        </div>
    </div>

    @endif 
@endauth


<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">Utilizador</h1>
        <h1 class="subtitle">{{$user->name}}</h2>
    </div>
</div>

@auth
    <div class="row centered">
        <div class="sm col-8">
            <a href="{{ route('contactProfile',$user->id)}}" class="btn primary">Contactar</a>
        </div>
    </div>
@endauth

<div class="row centered">
    <div class="sm col-8">
        <h2 class="subtitle">Últimas Propostas de Compra</h2>

        @if ($purchases->total() > 0)
            @foreach ($purchases as $purchase)

            <div class="list grey">
                <div class="row">
                    <div class="sm col body">
                        <strong class="text-focus">{{ $purchase->title }}</strong>
                    </div>
                    <div class="sm col-1">
                        <a class="btn primary" href="{{route('viewPurchase',$purchase->id)}}">Ver Compra</a>
                    </div>
                </div>
            </div>
            @endforeach
            <br>
            <br>
    
        <div class="row centered">
            {{ $purchases->links() }}
        </div>
        @else
            O utilizador não fez nenhuma proposta de compra.
        @endif
    </div>
</div>




@endsection
