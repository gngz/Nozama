@extends('layouts.home')

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">API da Nozama</h1>
        <h2 class="subtitle">Aqui poderá ver os endpoints da nossa api.</h2>
    </div>
</div>

<div class="row centered">
    <div class="sm col-8">
        <p>Esta API necessita de autenticação.</p>
        <p>Para ter acesso à nossa api, terá pedir acessoa através do seguinte endereço de email: <a href="mailto:api@nozama.ga">api@nozama.ga</a>.</p>
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
        <h2 class="title">Endpoints</h3>
    </div>
</div>


<div class="row centered">
    <div class="sm col-8">
        <h2 class="subtitle">Utilizadores</h3>
        <h3 class="title">Obter todos os utilizadores - {{ route('getUsers') }}</h3>
        <h3 class="title">Obter todos utilizador especifico - {{ url(route('getUser',""))."/{id}" }}</h3>
    </div>
</div>
@endsection
