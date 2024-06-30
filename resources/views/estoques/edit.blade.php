@extends('base')

@section('content')
<div class="container">
    <h1>Editar Estoque</h1>

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
    <form class="form" method="POST" action="{{ route('estoques.update', $estoque->id) }}">
        @csrf
        @method('PUT') {{-- Método HTTP PUT para atualização --}}
        
        <div class="form-group">
            <label for="produto_id">Produto:</label>
            <select name="produto_id" id="produto_id" required>
                @foreach ($produtos as $produto)
                    <option value="{{ $produto->id }}" {{ $estoque->produto_id == $produto->id ? 'selected' : '' }}>
                        {{ $produto->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="local_id">Local:</label>
            <select name="local_id" id="local_id" required>
                @foreach ($locais as $local)
                    <option value="{{ $local->id }}" {{ $estoque->local_id == $local->id ? 'selected' : '' }}>
                        {{ $local->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" value="{{ $estoque->quantidade }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Estoque</button>
    </form>
</div>
@endsection
