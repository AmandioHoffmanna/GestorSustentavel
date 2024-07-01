@extends('base')

@section('content')
<div class="formEdit">
    <h1>Editar Local</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulário de edição --}}
    <form class="form" method="POST" action="{{ route('locais.update', $local->id) }}">
        @csrf
        @method('PUT') {{-- Método HTTP PUT para atualização --}}
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ $local->nome }}" required>
        </div>
        <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" id="endereco" value="{{ $local->endereco }}" required>
        </div>
        <div class="form-group">
            <label for="horario_funcionamento">Horário de Funcionamento:</label>
            <input type="text" name="horario_funcionamento" id="horario_funcionamento" value="{{ $local->horario_funcionamento }}" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Salvar">
            <a href="{{ route('locais.index') }}">Cancelar</a>
        </div>
    </form>
</div>

@endsection

<head>
    <link rel="stylesheet" href="/css/edit.css">
</head>
