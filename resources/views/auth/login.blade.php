@extends('layouts.home')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="row centered">
            <div class="sm w500">
                <h1 class="title">Login ou criar conta.</h2>
                <h2 class="subtitle">Bem-vindo de volta à Nozama</h2>
            </div>
    </div>
    <div class="row centered">
        <div class="sm w500 form-field">
            <label class="label" for="email">E-mail</label>
            <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="e.g: nome@exemplo.com.">
       
        </div>
    </div>
    <div class="row centered">
        <div class="sm w500 form-field">
            <label class="label" for="password" >Password</label>
            <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required placeholder="Introduza a sua password." >
            @error('email')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong> 
            </span>
            @enderror
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="row centered">
        <div class="sm w500 form-field">
            <button class="btn primary btn-md w100">Entrar</button>
        </div>
    </div>

    <div class="row centered">
        <div class="sm w500 form-field text-center">
            <a href="{{ route('password.request') }}" class="btn link btn-md">Esqueceu-se da password?</a>
        </div>
    </div>

    <div class="row centered">
        <div class="sm w500 form-field">
            <hr class="line">
            <a href="{{ route('register') }}" class="btn inverted btn-md w100">Registar nova conta</a>
        </div>
    </div>
</form>

@endsection
