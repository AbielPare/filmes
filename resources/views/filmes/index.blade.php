{{-- resources/views/animais/index.blade.php --}}

@extends('base')

@section('titulo', 'Seus filmes')

@section('conteudo')
<p>
    <a href="{{ route('filmes.cadastrar') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"><i class="fas fa-plus mr-3"></i>Cadastrar Filme</a>
</p>
<p class="text-xl pb-3 flex items-center">
    <i class="fas fa-list mr-3"></i> Veja sua lista de filmes
</p>

<table class="min-w-full bg-white">
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Sinopse</th>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Ano</th>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Categoria</th>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Link</th>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Apagar</th>
        </tr>
        </thead>

    @foreach ($filmes as $filme)
    <tr>
        <td class="w-1/3 text-left py-3 px-4">{{ $filme['nome'] }}</td>
        <td class="w-1/3 text-left py-3 px-4">{{ $filme['sinopse'] }}</td>
        <td class="w-1/3 text-left py-3 px-4">{{ $filme['ano'] }}</td>
        <td class="w-1/3 text-left py-3 px-4">{{ $filme['categoria'] }}</td>
        <td class="w-1/3 text-left py-3 px-4">{{ $filme['link'] }}</td>
        <td class="w-1/3 text-left py-3 px-4"><a href="{{ route('filmes.apagar', $filme['id']) }}"><i class="fas fa-trash mr-3 "></i></a></td>
    </tr>
    @endforeach

</table>
@endsection