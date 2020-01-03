@extends('layouts.home')

@section('content')
    <div class="hero img">
        <h1 class="title">Uma nova maneira de comprar e vender!</h1>
        <h2 class="subtitle">De Z a A, anuncie a sua próxima compra!</h2>
        <p>Ao contrário das outras plataformas, o Nozama não lhe pergunta o que quer vender, pergunta o que quer comprar.</p>
        <br>
        <br>       
        <a href="{{ route('createPurchase') }}" class="btn inverted btn-md">Anúnciar</a>
    </div>

    <div class="row centered">
        <div class="sm col-8">
            <h2 class="title">Últimas Compras</h2>
            <div class="purchases wrap">
                @foreach ($purchases as $purchase)
                <div class="purchase">
                    <div class="p-img">

                        <a href="{{ route('viewPurchase', $purchase->id) }}">
                        @if ($purchase->images->count() > 0)
                        <img class="purchase-img" src="/storage/{{ $purchase->images[0]->path }}">
                        @else
                            <img class="purchase-img" src="https://via.placeholder.com/260x200.png?text=Sem%20Foto">
                        @endif
                        </a>
                        
                        @if ($purchase->max_price) 
                            <div class="p-tag">
                                Até {{ $purchase->max_price}}€
                            </div>
                        @endif
                    </div>
                    <div class="p-desc">
                        <a href="{{ route('viewPurchase', $purchase->id) }}">{{ $purchase->title }}</a>
                    </div>

                 

                
                  

                </div>

              
                @endforeach
            </div>
         
        </div>
    </div>


    <div class="row centered">
        <div class="sm col-8">
            <h2 class="title">Pesquisar Compras</h2>
            <h2 class="subtitle">Todas as compras da Nozama à distancia de um click!</h2>
         
        </div>
    </div>

  

    <form action="{{url('/search')}}" method="get">
    
    <div class="row centered">
        <div class="sm col-8">
            <div class="row gap centered">
                <div class="sm col-9 vcenter">
                    <input class="input" type="text" name="query" id="" placeholder="Escreva um termo ao qual pretende pesquisar. eg: carro.">
                </div>
                <div class="sm col-1 vcenter">
                    <input type="submit" value="Pesquisar" class="btn primary btn-md w100">
                </div>
            </div>
    
        </div>
    </div>
        
    </form>
   


    <div class="row centered">
        <div class="sm col-8">
            <h2 class="title">Categorias</h2>
            <h2 class="subtitle">Aqui poderá pesquisar por categorias!</h2>
         
        </div>
    </div>

    <div class="row centered">
        <div class="sm col-8">
            <div class="row space wrap gap">

                @foreach ($categories as $category)
                    <div class="sm col-2">
                        <a href="{{ route('viewCategory', $category->id) }}"><button class="btn flat-primary btn-option"> {{ $category->name }} </button></a>
                    </div>
                    
                @endforeach
                
                
            </div>
        </div>
    </div>
@endsection
