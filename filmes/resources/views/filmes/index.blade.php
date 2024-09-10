{{-- resources/views/animais/index.blade.php --}}

@extends('base')

@section('titulo', 'Animais para adoção')

@section('conteudo')
<p>
    <a href="{{ route('animais.cadastrar') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"><i class="fas fa-plus mr-3"></i>Cadastrar Animal</a>
</p>
<p class="text-xl pb-3 flex items-center">
    <i class="fas fa-list mr-3"></i> Veja nossa lista de animais para adoção
</p>

<table class="min-w-full bg-white">
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Idade</th>
            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Apagar</th>
        </tr>
        </thead>

    @foreach ($animais as $animal)
    <tr>
        <td class="w-1/3 text-left py-3 px-4">{{ $animal['nome'] }}</td>
        <td class="w-1/3 text-left py-3 px-4">{{ $animal['idade'] }}</td>
        <td class="w-1/3 text-left py-3 px-4"><a href="{{ route('animais.apagar', $animal['id']) }}"><i class="fas fa-trash mr-3 "></i></a></td>
    </tr>
    @endforeach

</table>
@endsection