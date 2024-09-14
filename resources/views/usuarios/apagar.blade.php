{{-- views/usuarios/apagar.blade.php --}}
@extends('base')

@section('titulo', 'Apagar | Usuarios Cadastrados')

@section('conteudo')
<p>Tem certeza que quer apagar?</p>
<p><em>{{ $usuario->name }}</em></p>

<form action="{{ route('usuarios.deletar', $usuario['id']) }}" method="post">
@method('delete')
@csrf

<input type="submit" value="Pode apagar sem medo" style="background-color:red;color:white;">

</form>

<a href="{{ route('usuarios') }}">Cancelar</a>
@endsection