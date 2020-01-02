@extends('layouts.home')

@section('extra-css')

@endsection

@section('content')



<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">Ocorreu um erro no processamento do Pagamento!</h1>
        <h2 class="subtitle">Tente novamente!</h2>
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
        <h3 class="subtitle text-focus">Caso ache que se trate de um erro da plataforma, entre em contacto com o nosso Suporte em <a href="mailto:support@nozama.ga">support@nozama.ga</a>.</h3>
    </div>
</div>
<br>
<br>
<br>

<div class="row centered">
    <div class="sm col-8">
        <a href="{{url('/account')}}" class="btn primary btn-md w100">A minha conta</a>
    </div>
</div>


</div>



@endsection
