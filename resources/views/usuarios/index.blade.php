{{-- resources/views/animais/index.blade.php --}}

@extends('base')

@section('titulo', 'Usuários')

@section('conteudo')
<p>
    <a href="{{ route('usuarios.inserir') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"><i class="fas fa-plus mr-3"></i>Cadastrar usuário</a>
</p>
<p class="text-xl pb-3 flex items-center">
    <i class="fas fa-list mr-3"></i> Lista de Usuários
</p>

<table class="min-w-full bg-white">
    <thead class="bg-gray-800 text-white">
        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">ID</th>
        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Admin</th>
        <th>Apagar</th>
    </thead>

    @foreach ($usuarios as $usuario)
    <tr>
        <td>{{ $usuario->id }}</td>
        <td>{{ $usuario->name }}</td>
        <td>{{ $usuario->email }}</td>
        <td>{{ $usuario->admin ? 'Sim' : 'Não' }}</td>
        <td class="w-1/3 text-left py-3 px-4"><a href="{{ route('usuarios.apagar', $usuario->id) }}"><i class="fas fa-trash mr-3 "></i></a></td>
    </tr>
    @endforeach

</table>
@endsection
