{{-- views/animais/cadastrar.blade.php --}}

@extends('base')

@section('titulo', 'Cadastrar | Animais para adoção')

@section('conteudo')

<p class="text-xl pb-6 flex items-center">
    <i class="fas fa-list mr-3"></i> Preencha o formulário
</p>

@if($errors->any())
<div>
    <h4>Deu ruim</h4>
    @foreach($errors->all() as $erro)
        <p>{{ $erro }}</p>
    @endforeach
</div>  
@endif

<div class="leading-loose">
<form method="post" enctype="multipart/form-data" action="{{ route('filmes.gravar') }}" class="p-10 bg-white rounded shadow-xl">
    @csrf
        <label class="block text-sm text-gray-600" for="name">Nome</label> 
        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="nome" placeholder="Nome" value="{{ old('nome') }}">
    <br>
        <label class="block text-sm text-gray-600" for="sinopse">Sinopse</label>
        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="sinopse" placeholder="Sinopse" value="{{ old('sinopse') }}">
    <br>
        <label class="block text-sm text-gray-600" for="ano">Ano</label>
        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="number" name="ano" placeholder="Ano" value="{{ old('ano') }}">
    <br>
        <label class="block text-sm text-gray-600" for="categoria">Categoria</label>
        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="categoria" placeholder="Categoria" value="{{ old('categoria') }}">
    <br>
        <label class="block text-sm text-gray-600" for="imagem">Imagem</label> 
        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="file" name="imagem" placeholder="Imagem" value="{{ old('imagem') }}">
    <br>
        <label class="block text-sm text-gray-600" for="link">Link</label> 
        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="link" placeholder="link" value="{{ old('link') }}">
    <br>
    <input type="submit" value="Gravar">
</form>
</div>
@endsection