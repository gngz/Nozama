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
                 {{-- {{ route('add') }}  --}}
                <div class="card-plus">
                    <a href=""><button class="plus-button"></button></a>
                </div> 
            </div>
            <!-- Endereços na BD-->
            <div class="sm col-4">
                <div class="card">
                    <h3>Henrique Sousa</h3>
                    <p>Estrada De Cima Em Baixo, nº88</p>
                    <p>Estreito de Câmara de Lobos</p>
                    <p>9870-341 Câmara de Lobos</p>
                    <p>Portugal</p>
                    <p>Telemóvel: 980978567</p>
                    <button class="btn primary">Editar</button>
                    <button class="btn inverted">Definir como Principal</button>
                </div>
            </div>
            <div class="sm col-4">
                <div class="card">
                    <h3>Henrique Sousa</h3>
                    <p>Estrada De Cima Em Baixo, nº88</p>
                    <p>Estreito de Câmara de Lobos</p>
                    <p>9870-341 Câmara de Lobos</p>
                    <p>Portugal</p>
                    <p>Telemóvel: 980978567</p>
                    <button class="btn primary">Editar</button>
                    <button class="btn inverted">Definir como Principal</button>
                </div>
            </div>
            <div class="sm col-4">
                <div class="card">
                    <h3>Henrique Sousa</h3>
                    <p>Estrada De Cima Em Baixo, nº88</p>
                    <p>Estreito de Câmara de Lobos</p>
                    <p>9870-341 Câmara de Lobos</p>
                    <p>Portugal</p>
                    <p>Telemóvel: 980978567</p>
                    <button class="btn primary">Editar</button>
                    <button class="btn inverted">Definir como Principal</button>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
