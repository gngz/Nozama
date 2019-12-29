@extends('layouts.home')

@section('extra-css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')

<form id="purchaseForm" action="" method="post" enctype="multipart/form-data">
@csrf

@if (isset($purchase))
    <div class="row centered">
        <div class="sm col-8">
            <h1 class="title">Editar</h2>
            <h2 class="subtitle">Apenas os campos modificas são alterados.</h2>
        </div>
    </div>
   
@else
    <div class="row centered">
        <div class="sm col-8">
            <h1 class="title">Comprar</h2>
            <h2 class="subtitle">Descreva o que deseja comprar.</h2>
        </div>
    </div>
@endif


<div class="row centered">
    <div class="sm col-8 form-field">
        <label class="label" for="title">Titulo</label>
        @if (isset($purchase))
            <input id="title" type="text" class="input @error('name') is-invalid @enderror" name="title"  placeholder="Insira um título descritivo da sua compra." value="{{ old('title', $purchase->title) }}">
        @else
            <input id="title" type="text" class="input @error('name') is-invalid @enderror" name="title"  placeholder="Insira um título descritivo da sua compra." value="{{ old('title') }}">
        @endif
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
                @if (isset($purchase)) 
                    {!! $purchase->description !!}
                @endif
            </div>
    </div>
    
</div>
<div class="row centered">
    <div class="sm col-8">
            <div class="row gap">
                <div class="sm col">
                    <label class="label" for="minPrice">Preço Minimo <strong>(opcional)</strong></label>
                    @if (isset($purchase)) 
                        <input id="minPrice" type="number" class="input @error('name') is-invalid @enderror" name="minPrice"    placeholder="Insira o preço mínimo disposto a pagar." value="{{ old('minPrice', $purchase->min_price) }}" >
                    @else
                        <input id="minPrice" type="number" class="input @error('name') is-invalid @enderror" name="minPrice"    placeholder="Insira o preço mínimo disposto a pagar." value="{{ old('minPrice') }}" >
                    @endif
                    
                </div>
                <div class="sm col">
                    <label class="label" for="maxPrice">Preço Máximo <strong>(opcional)</strong></label>
                    @if (isset($purchase)) 
                        <input id="maxPrice" type="number" class="input @error('name') is-invalid @enderror" name="maxPrice"     placeholder="Insira o preço máximo que está disposto a pagar." value="{{ old('maxPrice',  $purchase->max_price) }}">                        
                    @else
                    <input id="maxPrice" type="number" class="input @error('name') is-invalid @enderror" name="maxPrice"     placeholder="Insira o preço máximo que está disposto a pagar." value="{{ old('maxPrice') }}">
                    @endif
                </div>
            </div>

            @error('max_price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @error('min_price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
</div>

<div class="row centered">
    <div class="sm col-8">
            @if (isset($purchase))
                <div class="row">
                    Se quiser alterar as categorias, deverá inserir novas.
                </div>
            @endif
            <div class="row gap">
                <div class="sm col">
                    <label class="label" for="category">Categoria{{ isset($purchase) ? ": ". $purchase->category->name : ""}}</label>
                    <select name="category" id="category">
                        <option value="" selected>Selecionar</option>
                    </select>
                    @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="sm col">
                    <label class="label" for="name">Sub-Categoria{{ isset($purchase) ? ": ". $purchase->subcategory->name : ""}}</label>
                    <select name="subcategory" id="subcategory" disabled="disabled"></select>
                    @error('subcategory')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
    </div>
</div>


<br>
<div class="row centered">
    <div class="sm col-8">
        @if(isset($purchase))
        <label class="label" for="imageUpload">Novas imagens (Substitui)</label>
        @else
        <label class="label" for="imageUpload">Imagens</label>
        @endif
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
        placeholder: 'Insira a descrição do seu pedido'
    });
    </script>
    <script src="{{ asset('js/purchase.js') }}"></script>
@endsection