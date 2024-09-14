@extends('base')

@section('titulo', 'Cadastrar Filme')

@section('conteudo')
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-plus mr-3"></i> Cadastrar Novo Filme
    </p>

    <form action="{{ route('filmes.gravar') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" class="shadow appearance-none border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full @error('nome') border-red-500 @enderror" required>
            @error('nome')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="sinopse" class="block text-gray-700 text-sm font-bold mb-2">Sinopse:</label>
            <textarea name="sinopse" id="sinopse" rows="4" class="shadow appearance-none border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full @error('sinopse') border-red-500 @enderror" required>{{ old('sinopse') }}</textarea>
            @error('sinopse')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="ano" class="block text-gray-700 text-sm font-bold mb-2">Ano:</label>
            <input type="text" name="ano" id="ano" value="{{ old('ano') }}" class="shadow appearance-none border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full @error('ano') border-red-500 @enderror" required>
            @error('ano')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="categoria" class="block text-gray-700 text-sm font-bold mb-2">Categoria:</label>
            <input type="text" name="categoria" id="categoria" value="{{ old('categoria') }}" class="shadow appearance-none border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full @error('categoria') border-red-500 @enderror" required>
            @error('categoria')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="link" class="block text-gray-700 text-sm font-bold mb-2">Link:</label>
            <input type="text" name="link" id="link" value="{{ old('link') }}" class="shadow appearance-none border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full @error('link') border-red-500 @enderror" required>
            @error('link')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="imagem" class="block text-gray-700 text-sm font-bold mb-2">Imagem:</label>
            <input type="file" name="imagem" id="imagem" class="shadow appearance-none border rounded-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full @error('imagem') border-red-500 @enderror">
            @error('imagem')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                Cadastrar
            </button>
            <a href="{{ route('filmes') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                Voltar
            </a>
        </div>
    </form>
@endsection
