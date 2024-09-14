{{-- resources/views/filmes/editar.blade.php --}}

@extends('base')

@section('titulo', 'Editar Filme')

@section('conteudo')
<p>
    <a href="{{ route('filmes') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">
        <i class="fas fa-arrow-left mr-3"></i> Voltar
    </a>
</p>

<p class="text-xl pb-3 flex items-center">
    <i class="fas fa-edit mr-3"></i> Editar Filme
</p>

<form action="{{ route('filmes.atualizar', $filme->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nome">
                Nome
            </label>
            <input value="{{ old('nome', $filme->nome) }}" id="nome" name="nome" type="text" placeholder="Nome do Filme" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('nome') border-red-500 @enderror">
            @error('nome')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="ano">
                Ano
            </label>
            <input value="{{ old('ano', $filme->ano) }}" id="ano" name="ano" type="text" placeholder="Ano do Filme" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('ano') border-red-500 @enderror">
            @error('ano')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="categoria">
                Categoria
            </label>
            <input value="{{ old('categoria', $filme->categoria) }}" id="categoria" name="categoria" type="text" placeholder="Categoria do Filme" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('categoria') border-red-500 @enderror">
            @error('categoria')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="sinopse">
                Sinopse
            </label>
            <textarea id="sinopse" name="sinopse" placeholder="Sinopse do Filme" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('sinopse') border-red-500 @enderror">{{ old('sinopse', $filme->sinopse) }}</textarea>
            @error('sinopse')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="link">
                Link
            </label>
            <input value="{{ old('link', $filme->link) }}" id="link" name="link" type="text" placeholder="Link do Filme" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('link') border-red-500 @enderror">
            @error('link')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="imagem">
                Imagem
            </label>
            <input id="imagem" name="imagem" type="file" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('imagem') border-red-500 @enderror">
            @error('imagem')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
        <i class="fas fa-save mr-3"></i>Salvar Alterações
    </button>
</form>
@endsection
