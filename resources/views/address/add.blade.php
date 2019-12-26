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
                <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Introduza o seu nome. e.g: José Alberto">
                @error('name')
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
                    <input id="phone" type="text" class="input @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Introduza o seu número de Contacto. e.g: 966999333">
                    @error('phone')
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
                <input id="zip" type="zip" class="input @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" required autocomplete="zip" placeholder="O seu Código Postal. e.g: 1234-123 Região.">
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
                <label class="label" for="password">Password</label>
                <input id="password" type="text" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Introduza uma password.">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- cenas -->

        <!-- Cidade -->

        <!-- Botão de submit do formuláro de resgisto de um endereço -->
        <div class="row centered">
            <div class="sm w500 form-field">
                <button type="submit" class="btn primary btn-md w100">Registar Endereço</button>
            </div>
        </div>
    </form>

    @endsection
