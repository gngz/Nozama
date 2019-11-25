@extends('layouts.home')

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">A minha conta</h1>
    </div>
</div>

<div class="row centered">
    <div class="sm col-8">
        <h2 class="title">{{$user->name}}</h2>
        <h3 class="subtitle">{{$user->email}}</h3>
    </div>
</div>

<div class="row centered">
    <div class="sm col-8">
        <a href="" class="btn inverted">Editar Conta</a>
    </div>
</div>



<div class="row centered">
    <div class="sm col-8">
        <p>{{ Auth::user()->roles }}</p>
    </div>
</div>


<div class="row centered">
    <div class="sm col-8 row space wrap btn-row ">
        <a href="#"><button class="btn flat-primary btn-option">Procurar</button></a>
        <a href="#"><button class="btn flat-primary btn-option">Comprar</button></a>
        <a href="#"><button class="btn flat-primary btn-option">Minhas Propostas</button></a>
        <a href="#"><button class="btn flat-primary btn-option">Moradas</button></a>
    </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
