@extends('layouts.home')

@section('extra-css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">Contactar</h1>
        <h3 class="subtitle">Destinatário: <a href="{{ url('/profile/'.$contact->id) }}">{{ $contact->name }}</a></h3>
    </div>
</div>


<form id="contactForm" action="" method="post">
    @csrf
    <div class="row centered">
        <div class="sm col-8 form-field">
            <input class="input" type="text" name="subject" id="" placeholder="Insira o assunto da sua mensagem..">
            @error('subject')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    


    <div class="row centered">
        <div class="sm col-8 form-field">
            <div id="editor">
            </div>
            @error('message')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
        
        </div>
        
    </div>



    <div class="row centered">
        <div class="sm col-8 form-field">
            <button type="submit" class="btn primary btn-md w100">Enviar mensagem</button>
        </div>
    </div>



</form>



@endsection

@section('extra-js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    var quill = new Quill('#editor', {
        theme: 'snow',
        bounds: 'col-8',
        placeholder: 'Insira a sua mensagem'
    });
    </script>
    <script src="{{ asset('js/contact.js') }}"></script>
@endsection