@extends('base')

@section('content')
    <h2>Cadastrar Novo Estoque</h2>

    <form action="{{ route('estoques.store') }}" method="POST">
        @csrf
        <div>
            <label for="produto_id">Produto:</label>
            <select name="produto_id" id="produto_id">
                @foreach($produtos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="local_id">Local:</label>
            <select name="local_id" id="local_id">
                @foreach($locais as $local)
                    <option value="{{ $local->id }}">{{ $local->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" min="0">
        </div>

        <button type="submit">Cadastrar Estoque</button>
    </form>
@endsection
