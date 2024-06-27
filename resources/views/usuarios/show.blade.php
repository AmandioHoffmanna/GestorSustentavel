{{-- herda a view base --}}
@extends('base')
{{-- define o conteúdo --}}
@section('content')
    {{-- caso exista a variável msg, exibe uma mensagem --}}
    @if (isset($msg))
        <h3 style="color: red">Usuário não encontrado!</h3>
    @else
    {{-- senão, mostra os daddos --}}
        <h2>Mostrando dados dos Usuários</h2>
        <p><strong>Nome:</strong> {{ $usuario->nome }} </p>
        <p><strong>Cpf:</strong> {{ $usuario->cpf }} </p>
        <a href="{{ route('usuarios.index') }}">Voltar</a>
    @endif
@endsection