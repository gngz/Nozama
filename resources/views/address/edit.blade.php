@extends('layouts.home')

@section('content')


<div class="row centered">
        <div class="sm w500">
            <h1 class="title">Editar o endereço</h2>
        </div>
    </div>

    <form method="POST" action="{{ route('editAddressForm', ['data' => $data->id]) }}">
        @csrf
        <!-- Nome Completo -->
        <div class="row centered">
            <div class="sm w500 form-field">
                <label class="label" for="name">Nome</label>
            <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name" autocomplete="name" autofocus  value="{{ $data->name }}">
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
                <input id="address" type="text" class="input @error('address') is-invalid @enderror" name="address" autocomplete="address" autofocus  value="{{ $data->address }}">
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
                <input id="address_extra" type="text" class="input @error('address_extra') is-invalid @enderror" name="address_extra" autocomplete="address_extra" autofocus  value="{{ $data->address_extra }}">
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
                <input id="city" type="text" class="input @error('city') is-invalid @enderror" name="city" autocomplete="city" autofocus  value="{{ $data->city }}">
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
                <input id="zip" type="text" class="input @error('zip') is-invalid @enderror" name="zip" autocomplete="zip" autofocus  value="{{ $data->zip }}">
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
                <input id="region" type="text" class="input @error('zip') is-invalid @enderror" name="region" autocomplete="region" autofocus value="{{ $data->region }}">
                @error('region')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- País -->
        <div class="row centered">
            <div class="sm w500 form-field">
                <label class="label" for="country">País</label>
                <input id="country" type="text" class="input @error('country') is-invalid @enderror" name="country" rautocomplete="country" autofocus value="{{ $data->country }}">
                @error('country')
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
                <input id="phone" type="text" class="input @error('phone') is-invalid @enderror" name="phone" autocomplete="phone" autofocus value="{{ $data->phone }}">
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
                <button type="submit" class="btn primary btn-md w100">Modificar Endereço</button>
            </div>
        </div>
    </form>

    {{-- Eliminar o endereço  --}}
    <form action="">
        @csrf
    </form>

    <!-- Botão para voltar a página anterior -->
    <div class="row centered">
        <div class="sm w500 form-field">
            <hr class="line">
        <a href="/account/address"><button type="submit" class="btn inverted btn-md w100">Voltar a Lista de Endereços</button></a>
        </div>
    </div>

@endsection
