@extends('base')

@section('content')
<div class="formEdit">
    <h1>Editar Produto</h1>

    <form class="form" method="POST" action="{{ route('produtos.update', $produto->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $produto->nome }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

<head>
    <link rel="stylesheet" href="/css/edit.css">
</head>
