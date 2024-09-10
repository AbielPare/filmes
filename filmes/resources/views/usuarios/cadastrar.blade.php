{{-- views/animais/cadastrar.blade.php --}}

@extends('base')

@section('titulo', 'Cadastrar | Animais para adoção')

@section('conteudo')

@if($errors->any())
<div>
    <h4>Deu ruim</h4>
    @foreach($errors->all() as $erro)
        <p>{{ $erro }}</p>
    @endforeach
</div>  
@endif

<form method="post" action="{{ route('usuarios.gravar') }}">
    @csrf
    <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}">
    <br>
    <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
    <br>
    <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
    <br>
    <input type="password" name="password" placeholder="Senha" value="{{ old('password') }}">
    <br>
    Admin
    <select name="admin">
        <option value="0">Não</option>
        <option value="1">Sim</option>
    </select>
    <br>
    <input type="submit" value="Gravar">
</form>
@endsection