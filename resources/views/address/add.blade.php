@extends('layouts.home')

@section('content')


<div class="row centered">
        <div class="sm w500">
            <h1 class="title">Adicionar um novo endereço</h2>
        </div>
    </div>

    <form method="POST" action="#">
        @csrf
        <!-- Nome Completo -->
        <div class="row centered">
            <div class="sm w500 form-field">
                <label class="label" for="name">Nome</label>
                <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name" required autofocus placeholder="Introduza o seu nome. e.g: José Alberto">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- Endereço -->
        <div class="row centered">
            <div class="sm w500 form-field">
                <label class="label" for="address">Endereço</label>
                <input id="address" type="text" class="input @error('address') is-invalid @enderror" name="address" required placeholder="O seu Endereço. e.g: Rua da Queimada, nº32.">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- Endereço Extra -->
        <div class="row centered">
            <div class="sm w500 form-field">
                <label class="label" for="address_extra">Endereço (extra)</label>
                <input id="address_extra" type="text" class="input @error('address_extra') is-invalid @enderror" name="address_extra" placeholder="Campos extra relevantes para o seu endereço.">
                @error('address_extra')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- City -->
        <div class="row centered">
            <div class="sm w500 form-field">
                <label class="label" for="city">Cidade</label>
                <input id="city" type="text" class="input @error('city') is-invalid @enderror" name="city" required placeholder="A sua Cidade. e.g: Funchal.">
                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- Código Postal -->
        <div class="row centered">
            <div class="sm w500 form-field">
                <label class="label" for="zip">Código Postal</label>
                <input id="zip" type="text" class="input @error('zip') is-invalid @enderror" name="zip" required placeholder="O seu Código Postal. e.g: 1234-123">
                @error('zip')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- Região -->
        <div class="row centered">
            <div class="sm w500 form-field">
                <label class="label" for="region">Região</label>
                <input id="region" type="text" class="input @error('zip') is-invalid @enderror" name="region" required placeholder="A sua região. e.g: Santa Luzia">
                @error('region')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- Número telefónico -->
        <div class="row centered">
            <div class="sm w500 form-field">
                <label class="label" for="phone">Número de contacto</label>
                <input id="phone" type="text" class="input @error('phone') is-invalid @enderror" name="phone" required autofocus placeholder="Introduza o seu número de Contacto. e.g: 966999333">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>



        <!-- Botão de submit do formuláro de resgisto de um endereço -->
        <div class="row centered">
            <div class="sm w500 form-field">
                <button type="submit" class="btn primary btn-md w100">Registar Endereço</button>
            </div>
        </div>

    </form>

    <div class="row centered">
        <div class="sm w500 form-field">
            <hr class="line">
        <button type="submit" class="btn inverted btn-md w100">Voltar a Lista de Endereços</button>
        </div>
    </div>

    @endsection
