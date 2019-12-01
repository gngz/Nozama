@extends('layouts.home')

@section('extra-css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')

<form id="purchaseForm" action="" method="post" enctype="multipart/form-data">
@csrf
<div class="row centered">
    <div class="sm col-8">
        <h1 class="title">Comprar</h2>
        <h2 class="subtitle">Descreva o que deseja comprar.</h2>
    </div>
</div>

<div class="row centered">
    <div class="sm col-8 form-field">
        <label class="label" for="title">Titulo</label>
        <input id="title" type="text" class="input @error('name') is-invalid @enderror" name="title"  placeholder="Insiria um título descritivo da sua compra.">
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<br>
<div class="row centered">
    <div class="sm col-8">
            <div id="editor">
            </div>
    </div>
</div>
<br>

<div class="row centered">
    <div class="sm col-8">
            <div class="row gap">
                <div class="sm col">
                    <label class="label" for="minPrice">Preço Minimo <strong>(opcional)</strong></label>
                    <input id="minPrice" type="number" class="input @error('name') is-invalid @enderror" name="minPrice"    placeholder="Insira o preço mínimo disposto a pagar.">
                </div>
                <div class="sm col">
                    <label class="label" for="maxPrice">Preço Máximo <strong>(opcional)</strong></label>
                    <input id="maxPrice" type="number" class="input @error('name') is-invalid @enderror" name="maxPrice"     placeholder="Insira o preço máximo que está disposto a pagar.">
                </div>
            </div>
    </div>
</div>

<div class="row centered">
    <div class="sm col-8">
            <div class="row gap">
                <div class="sm col">
                    <label class="label" for="category">Categoria</label>
                    <select name="category" id="category">
                        <option value="" selected>Selecionar</option>
                    </select>
                </div>
                <div class="sm col">
                    <label class="label" for="name">Sub-Categoria</label>
                    <select name="subcategory" id="subcategory" disabled="disabled"></select>
                </div>
            </div>
    </div>
</div>

<br>
<div class="row centered">
    <div class="sm col-8">
        <label class="label" for="imageUpload">Imagens</label>
        <input type="file" name="imageUpload[]" id="fileToUpload" multiple>

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
        placeholder: 'Insira a descrição do seu pedido'
    });
    </script>
    <script src="{{ asset('js/purchase.js') }}"></script>
@endsection