@extends('base')

@section('content')
    <h2>Gerenciamento estoque</h2>

    <form method="GET" action="{{ route('estoques.index') }}">
        <div class="filtro">
            <span class="input-group-text">Produto:</span>
            <input type="text" name="produto" value="{{ request('produto') }}" class="form-control">
        </div>
        <div class="filtro">
            <span class="input-group-text">Local:</span>
            <input type="text" name="local" value="{{ request('local') }}" class="form-control">
        </div>
        <div class="filtro">
            <span class="input-group-text">Quantidade Mínima:</span>
            <input type="number" name="min_quantidade" value="{{ request('min_quantidade') }}" class="form-control">
        </div>
        <div class="filtro">
            <span class="input-group-text">Usuário:</span>
            <input type="text" name="usuario" value="{{ request('usuario') }}" class="form-control">
        </div>
        <button type="submit" class="btn-consultar">Consultar</button>
    </form>
    <form class="btn-incluir" action="{{ route('estoques.create') }}" method="GET">
        <button type="submit" class="btn btn-success">Incluir</button>
    </form>

    @if ($estoques->isEmpty())
        <h3 style="color: red">Nenhum Estoque Encontrado!</h3>
    @else
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Local</th>
                    <th>Quantidade</th>
                    <th>Usuário</th>
                    <th colspan="3">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estoques as $estoque)
                    <tr>
                        <td id="tdId">{{ $estoque->id }}</td>
                        <td id="tdProdutoNome">{{ $estoque->produto->nome }}</td>
                        <td id="tdLocalNome">{{ $estoque->local->nome }}</td>
                        <td id="tdQuantidade">{{ $estoque->quantidade }}</td>
                        <td id="tdUsuarioNome">{{ $estoque->usuario->nome }}</td> 
                        <td><button onclick="window.location.href='{{ route('estoques.show', $estoque->id) }}'">Exibir</button></td>
                        <td><button onclick="window.location.href='{{ route('estoques.edit', $estoque->id) }}'">Editar</button></td>
                        <td>
                            <form action="{{ route('estoques.destroy', $estoque->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Estoques Cadastrados: {{ $estoques->count() }}</td>
                </tr>
            </tfoot>
        </table>
    @endif

    @if (session('msg'))
        <script>
            alert("{{ session('msg') }}");
        </script>
    @endif
@endsection

<head>
    <link rel="stylesheet" href="/css/gerenciamento.css">
</head>