@extends('base')

@section('content')
<div class="formEdit">
    <h1>Editar Usuário</h1>

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

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ $usuario->nome }}" required>
        </div>
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" value="{{ $usuario->cpf }}" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" value="{{ $usuario->email }}" required>
        </div>
        <div class="form-group">
            <label for="password">Nova Senha (opcional):</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Atualizar Usuário</button>
        <button onclick="window.location.href='{{ route('usuarios.index') }}'">Cancelar</button>
    </form>
</div>
@endsection

<head>
    <link rel="stylesheet" href="/css/edit.css">
</head>