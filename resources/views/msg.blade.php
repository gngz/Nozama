@extends('layouts.home')

@section('extra-css')

@endsection

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">{{ $message }}</h1>
    </div>
</div>

@auth
<br>
<br>
<br>
<br>    
<div class="row centered">
    <div class="sm col-8">
        <a href="{{url('/account')}}" class="btn primary btn-md w100">A minha conta</a>
    </div>
</div>
@endauth

@endsection

@section('extra-js')

@endsection