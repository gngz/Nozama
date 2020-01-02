@extends('layouts.home')

@section('content')
<div class="row centered">
    <div class="sm w500">
        <h1 class="title">Criar nova conta.</h2>
        <h2 class="subtitle">Um pequeno passo para o mundo Nozama.</h2>
    </div>
</div>


<form method="POST" action="{{ route('register') }}">
    @csrf
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
    <div class="row centered">
        <div class="sm w500 form-field">
            <label class="label" for="email">E-mail</label>
            <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="O seu email. e.g: utilizador@exemplo.com.">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row centered">
        <div class="sm w500 form-field">
            <label class="label" for="password">Password</label>
            <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Introduza uma password.">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row centered">
        <div class="sm w500 form-field">
            <label class="label" for="password-confirm">Confirmar password</label>
            <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password" placeholder="Volte a introduzir a password.">
        </div>
    </div>
    <br>
    <div class="row centered">
        <div class="sm w500 form-field">
           <input type="checkbox" class="" name="terms" id=""> Aceito os <a href="{{url('/terms')}}">termos e condições</a> e a <a href="{{url('/privacy')}}">política de privacidade</a> da Nozama.
            @error('terms')
            <span class="invalid-feedback" role="alert">
                <strong>É obrigatório aceitar os termos e condições e política de privacidade.</strong>
            </span>
            @enderror
        </div>
    </div>
    <br>
    <div class="row centered">
        <div class="sm w500 form-field">
            <button type="submit" class="btn primary btn-md w100">Registar</button>
    
        </div>
    </div>
</form>



{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
