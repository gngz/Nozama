@extends('layouts.home')

@section('extra-css')

@endsection

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">Pagamento - Passo 2</h1>
        <h2 class="subtitle">Selecionar morada de envio e facturação.</h2>

       

    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
        <div class="row space wrap gap">

            @if ($addresses->count() > 0) 

            
            @foreach($addresses as $data) <!-- Chamada dos valores, defenido no Controller -->
            <form action="{{ route('processPayment') }}" method="post">
                @csrf
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
                        
                        <button type="submit" name="address" value="{{ $data->id }}" class="btn primary">Selecionar</button>
       
                        
                    </div>
                
            </form>
            @endforeach
            

            @else

            <div>
                <p class="text-center text-focus">Não adicionou nenhuma morada.</p>
                <p class="text-center text-focus">Terá de adicionar uma morada e voltar ao processo de pagamento.</p>
                <p class="text-center"> <a href="{{route('addAddress')}}" class="btn primary"> Adicionar Morada</a> </p>
            </div>

  
           

            @endif

 
        </div>
    </div>
</div>


@endsection

@section('extra-js')

@endsection