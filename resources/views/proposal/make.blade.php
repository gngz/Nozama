@extends('layouts.home')

@section('extra-css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')

<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">Fazer Proposta</h1>
    </div>
</div>

<div class="row centered">
    <div class="sm col-8">
        <span class="text-focus">Compra:</span> {{$purchase->title}}
    </div>
</div>

<br>

<form id="proposalForm" action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row centered">
        <div class="sm col-8 form-field">
            <div id="editor">
            
            </div>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
    </div>
    <div class="row centered">
        <div class="sm col-8 form-field">
            <label for="">Condição</label><br>
            <input type="radio" name="condition" value="new" checked>Novo<br>
            <input type="radio" name="condition" value="used">Usado<br>
            @error('condition')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row centered">
        <div class="sm col-8 form-field">
            <label for="">Preço</label><br>
            <input type="number" name="price" id="" class="input" placeholder="Insira o preço da sua proposta.">
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    
    <div class="row centered">
        <div class="sm col-8">
            <label class="label" for="imageUpload">Imagens</label>
            <input type="file" name="imageUpload[]" id="fileToUpload" multiple value="{{ old('imageUpload') }}">
    
        </div>
    </div>


    <div class="row centered">
        <div class="sm col-8 form-field">
            <button type="submit" class="btn primary btn-md w100">Submeter</button>
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
        placeholder: 'Insira a descrição da sua proposta'
    });
</script>
<script src="{{ asset('js/proposal.js') }}"></script>
@endsection