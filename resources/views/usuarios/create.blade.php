@extends('base')

@section('content')
    <h2>Cadastrar Novo Usuário</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form" method="POST" action="{{ route('usuarios.store') }}">
        @csrf

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}" required>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Cadastrar Usuário</button>
    </form>
@endsection
