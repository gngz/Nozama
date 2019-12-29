@extends('layouts.home')

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">As Minhas Moradas</h1>
    </div>
</div>

<div class="row centered">
    <div class="sm col-8">
        <div class="row space wrap gap">
            <!-- Adicionar novo endereço -->
            <div class="sm col-4">
                <div class="card-plus">
                <a href="{{ route('addAddress') }}"><button class="plus-button"></button></a>
                </div>
            </div>
            <!-- Endereços na BD-->
            @foreach($address as $key => $data) <!-- Chamada dos valores, defenido no Controller -->
                <div class="sm col-4">
                    <div class="card">
                        <h3>{{ $data->name }}</h3>
                        <p>{{ $data->address }}, {{ $data->address_extra}}</p>
                        <p>{{ $data->city }}</p>
                        <p>{{ $data->zip}} {{ $data->region }}</p>
                        <p>{{ $data->country }}</p>
                        <p>Telemóvel: {{ $data->phone }}</p>
                        <button class="btn primary">Editar</button>
                        <button class="btn inverted">Definir como Principal</button>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
