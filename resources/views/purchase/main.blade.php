@extends('layouts.home')

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">As minhas compras</h1>
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
        <a href="{{ route('editAccount') }}" class="btn primary">Adicionar Compra</a>
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
        <ul>
        @foreach ($purchases as $purchase)
            <li>{{ $purchase->title }}</li>
        @endforeach
        </ul>
    </div>
</div>

<div class="row centered">

    {{ $purchases->links() }}
</div>

<div class="row centered">
    <div class="sm col-8">
        <p>{{ Auth::user()->roles }}</p>
    </div>
</div>


@endsection
