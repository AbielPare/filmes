@extends('base')

@section('titulo', 'Seus filmes')

@section('conteudo')
<p>
    @if(Auth::check() && Auth::user()->is_admin)
    <a href="{{ route('filmes.cadastrar') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
        <i class="fas fa-plus mr-3"></i>Cadastrar Filme
    </a>
    @endif
</p>

<p class="text-xl pb-3 flex items-center">
    <i class="fas fa-list mr-3"></i> Veja sua galeria de filmes
</p>

<!-- Filtros -->
<div class="mb-6">
    <form action="{{ route('filmes') }}" method="GET" class="flex gap-4">
        <select name="ano" class="bg-white border border-gray-300 p-2 rounded">
            <option value="">Selecione o ano</option>
            @foreach($anos as $ano)
                <option value="{{ $ano }}" {{ request('ano') == $ano ? 'selected' : '' }}>{{ $ano }}</option>
            @endforeach
        </select>
        
        <select name="categoria" class="bg-white border border-gray-300 p-2 rounded">
            <option value="">Selecione a categoria</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria }}" {{ request('categoria') == $categoria ? 'selected' : '' }}>{{ $categoria }}</option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Filtrar
        </button>
    </form>
</div>

<!-- Cards dos filmes -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach ($filmes as $filme)
    <div class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden">
        @if($filme->imagem)
            <img src="{{ asset('img/' . $filme->imagem) }}" alt="Imagem de {{ $filme->nome }}" class="w-full h-48 object-cover">
        @else
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                <p class="text-gray-600">Sem imagem</p>
            </div>
        @endif
        <div class="p-4">
            <h3 class="text-lg font-semibold">{{ $filme->nome }}</h3>
            <p class="text-gray-600">{{ $filme->sinopse }}</p>
            <p class="text-gray-800 mt-2"><strong>Ano:</strong> {{ $filme->ano }}</p>
            <p class="text-gray-800"><strong>Categoria:</strong> {{ $filme->categoria }}</p>
            <a href="{{ $filme->link }}" target="_blank" class="mt-4 inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Ver Trailer
            </a>
            @if(Auth::check() && Auth::user()->is_admin)
            <div class="flex mt-4">
                <a href="{{ route('filmes.editar', $filme->id) }}" class="text-blue-500 hover:text-blue-700 mr-4">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <a href="{{ route('filmes.apagar', $filme->id) }}" class="text-red-500 hover:text-red-700">
                    <i class="fas fa-trash"></i>
                </a>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endsection
