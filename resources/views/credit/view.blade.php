@extends('layouts.home')

@section('extra-css')

@endsection

@section('content')



<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">Os meus créditos</h1>
        <h2 class="subtitle">Aqui pode ver a lista dos seus créditos</h2>
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
        <h3 class="subtitle"><span class="text-focus">Créditos:</span>  {{$user->balance}}€</h3>
        <a href="{{ route('addCredit') }}" class="btn primary">Adicionar Créditos</a>
    </div>
</div>

<div class="row centered">
    <div class="sm col-8">
        <h2 class="title">Últimos Pagamentos</h2>
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">

        <table class="w100">
            <thead>
                <tr>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Estado</th>
            
                </tr>
            </thead>

            <tbody>
                
                @foreach ($credits as $credit)
                <tr>
                    <td class="text-center">{{ $credit->amount }}€</td>
                    <td class="text-center">{{ $credit->updated_at }}</td>
                    <td class="text-center">{{ $credit->state == 'paid' ? 'Pago' : 'Erro'}}</td>
          
                    
                </tr>
                @endforeach
                
             </tbody>

        </table>
        <br>
        <br>
        <div class="row centered">
            {{ $credits->links() }}
        </div>
      
    </div>
</div>


</div>



@endsection