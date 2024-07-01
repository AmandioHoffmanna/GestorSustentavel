@extends('base')

@section('content')
    @if (isset($msg))
        <h3 style="color: red">{{ $msg }}</h3>
    @else
        <h2>Dados do Local</h2>
        <p><strong>Nome:</strong> {{ $local->nome }}</p>
        <p><strong>Endereco:</strong> {{ $local->endereco }}</p>
        <p><strong>Horário de Funcionamento:</strong> {{ $local->horario_funcionamento }}</p>
        <a href="{{ route('locais.index') }}">Voltar</a>
    @endif
@endsection

<head>
    <link rel="stylesheet" href="/css/exibir.css">
</head>
