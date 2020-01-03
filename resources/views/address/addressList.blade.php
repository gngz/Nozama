@extends('layouts.home')

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">As Minhas Moradas</h1>
    </div>
</div>

<div class="row centered">
    <div class="sm col-8">
        <a href="{{ route('addAddress') }}" class="btn primary">Adicionar Morada</a>
    </div>
</div>



<div class="row centered">
    <div class="sm col-8">
        <div class="row space wrap gap">

            <!-- Endereços na BD-->
            @foreach($address as $key => $data) <!-- Chamada dos valores, defenido no Controller -->
                @if($user->id == $data->user_id)
                <div class="sm col-3">
                    <div class="card">
                        <h3>{{ $data->name }}</h3>
                        <p>{{ $data->address }}</p>
                        <p>{{ $data->address_extra}}</p>
                        <p>{{ $data->city }}</p>
                        <p>{{ $data->zip}} {{ $data->region }}</p>
                        <p>{{ $data->country }}</p>
                        <p>Telemóvel: {{ $data->phone }}</p>
                        @if ($data->is_main)
                        <p><strong>Principal</strong></p>
                        @else
                            <br>
                        @endif
                        
                        <a href="{{ route('removeAddress', ['data' => $data->id]) }}"><button class="btn primary">Remover</button></a>
                        <a href="{{ route('editAddress', ['data' => $data->id]) }}"><button class="btn primary">Editar</button></a>
                        <br><br>

                        @if (!$data->is_main)
                            <a href="{{ route('mainAddress', ['data' => $data->id]) }}"><button class="btn inverted">Definir como Principal</button></a>
                        @else
                            <br>
                        @endif
                        
                    </div>
                </div>
                @endif
            @endforeach

 
        </div>
    </div>
</div>

@endsection
