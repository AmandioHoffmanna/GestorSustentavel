@extends('base')

@section('content')
    <h2>Editar Usuário</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form" method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
        @csrf
        @method('PUT')

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ $usuario->nome }}" required>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" value="{{ $usuario->cpf }}" required>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="{{ $usuario->email }}" required>

        <label for="password">Nova Senha (opcional):</label>
        <input type="password" name="password" id="password">

        <button type="submit">Atualizar Usuário</button>
    </form>
@endsection
