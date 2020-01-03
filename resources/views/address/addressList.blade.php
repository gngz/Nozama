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
            <div class="sm col-3">
                <div class="card-plus">
                <a href="{{ route('addAddress') }}"><button class="plus-button"></button></a>
                </div>
            </div>

            <!-- Endereços na BD-->
            @foreach($address as $key => $data) <!-- Chamada dos valores, defenido no Controller -->
                @if($user->id == $data->user_id)
                <div class="sm col-3">
                    <div class="card">
                        <h3>{{ $data->name }}</h3>
                        <p>{{ $data->address }} {{ $data->address_extra}}</p>
                        <p>{{ $data->city }}</p>
                        <p>{{ $data->zip}} {{ $data->region }}</p>
                        <p>{{ $data->country }}</p>
                        <p>Telemóvel: {{ $data->phone }}</p>
                        <div class="row">
                            <a href="{{ route('editAddress', ['data' => $data->id]) }}"><button class="btn primary">Editar/Eliminar</button></a>

                            <form method="POST" action="{{ route('mainAddress', ['data' => $data->id]) }}">
                                @csrf
                                <input type="submit" value="Definir como Principal" class="btn inverted">
                            </form>
                        </div>

                        {{-- <a href="{{ route('mainAddress', ['data' => $data->id]) }}"><button class="btn inverted">Definir como Principal</button></a> --}}
                    </div>
                </div>
                @endif
            @endforeach

            {{-- <div class="sm col-3">
                <div class="card">
                    <h3>Henrique Sousa</h3>
                    <p>Estrada que Sobe pra baixo, nº55</p>
                    <p>Funchal</p>
                    <p>9350-145 Funchal</p>
                    <p>Portugal</p>
                    <p>Telemóvel: 1177656565</p>
                    <button class="btn primary">Editar</button>
                    <button class="btn inverted">Definir como Principal</button>
                </div>
            </div> --}}

        </div>
    </div>
</div>

@endsection
