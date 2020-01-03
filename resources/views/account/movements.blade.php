@extends('layouts.home')

@section('extra-css')

@endsection

@section('content')



<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">Os meus movimentos</h1>
        <h2 class="subtitle">Aqui pode ver a lista dos seus movimentos</h2>
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
        <h2 class="title">Últimos Movimentos</h2>
    </div>
</div>

@if ($credits->total() > 0)
<div class="row centered">
    <div class="sm col-8">


        <table class="w100">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Descritivo</th>
                    <th>Estado</th>
            
                </tr>
            </thead>

            <tbody>
                
                @foreach ($credits as $credit)
                <tr>
                    <td class="text-center">{{ $controller::printType($credit->type) }}</td>
                    @if ($credit->type == 'credit' or $credit->type == 'sell')
                        @if($credit->state == 'wait')
                        <td class="text-center">n/a</td>
                        @else
                            <td class="text-center">+{{ $credit->amount }}€</td>
                        @endif
                        
                    @else
                        <td class="text-center">-{{ $credit->amount }}€</td>
                    @endif
                    <td class="text-center">{{ $credit->updated_at }}</td>
               
                    <td class="text-center">{{ $credit->description }} </td>
                
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
@else

<div class="row centered">
    <div class="sm col-8">
        <p class="text-center">Não possui nenhum pagamento.</p>
    </div>
</div>

    
@endif

</div>



@endsection
