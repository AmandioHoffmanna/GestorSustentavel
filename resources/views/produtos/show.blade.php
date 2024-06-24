@extends('base')

@section('content')
    @if (isset($msg))
        <h3 style="color: red">{{ $msg }}</h3>
    @else
        <h2>Dados do Produto</h2>
        <p><strong>Nome:</strong> {{ $produto->nome }}</p>
        <a href="{{ route('produtos.index') }}">Voltar</a>
    @endif
@endsection
