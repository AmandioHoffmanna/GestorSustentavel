@extends('base')

@section('content')
    @if (isset($msg))
        <h3 style="color: red">{{ $msg }}</h3>
    @else
        <h2>Dados do Estoque</h2>
        <p><strong>ID:</strong> {{ $estoque->id }}</p>
        <p><strong>Produto:</strong> {{ $estoque->produto->nome }}</p>
        <p><strong>Local:</strong> {{ $estoque->local->nome }}</p>
        <p><strong>Quantidade:</strong> {{ $estoque->quantidade }}</p>
        <p><strong>Usuário:</strong> {{ $estoque->usuario->nome }}</p>
        <a href="{{ route('estoques.index') }}">Voltar</a>
    @endif
@endsection
