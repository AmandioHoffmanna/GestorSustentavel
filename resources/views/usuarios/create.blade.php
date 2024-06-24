{{-- herda a view 'base' --}}
@extends('base')
{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
    <h2>Cadastrar Novo Usuário</h2>

    {{-- Exibir mensagens de erro de validação --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- o atributo action aponta para a rota que está direcionada ao método store do controlador --}}
    <form class="form" method="POST" action="{{ route('usuarios.store') }}">
        {{-- CSRF é um token de segurança para validar o formulário --}}
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}" required>
        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>
@endsection
