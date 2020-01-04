@extends('layouts.home')

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">API da Nozama</h1>
        <h2 class="subtitle">Documentação da API da Nozama.</h2>
    </div>
</div>

<div class="row centered">
    <div class="sm col-8">
        <p>Esta API necessita de autenticação e deverá ser passada através de Bearer Token.</p>
        <p>Para ter acesso à nossa api, terá pedir a chave de autenticação através do seguinte endereço de email: <a href="mailto:api@nozama.ga">api@nozama.ga</a>.</p>
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
        <h2 class="title">Endpoints</h3>
        <h2 class="subtitle">Poderá ver a documentação e exemplo dos endpoints no link abaixo.</h3>
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
       <a href="https://documenter.getpostman.com/view/6515207/SWLe6nYg?version=latest" class="btn primary">Ver Documentação</a>
    </div>
</div>
@endsection
