@extends('base')

@section('content')
    <h2>Produtos/resíduos coletáveis</h2>
    <form method="GET" action="{{ route('produtos.index') }}">
    <div class="filtro">
        <span class="input-group-text">Produto:</span>
        <input type="text" name="produto" value="{{ request('produto') }}" class="form-control">
    </div>
    <button type="submit" class="btn-consultar" title="Use este campo para filtrar os produtos por nome.">Consultar</button>
    </form>

    <form class="btn-incluir" action="{{ route('produtos.create') }}" method="GET">
        <button type="submit" class="btn btn-success">Incluir</button>
    </form>

    @if ($produtos->isEmpty())
        <h3 style="color: red">Nenhum Produto Encontrado!</h3>
    @else
        <table class="data-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th colspan="3">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td><button onclick="window.location.href='{{ route('produtos.show', $produto->id) }}'">Exibir</button></td>
                        <td><button onclick="window.location.href='{{ route('produtos.edit', $produto->id) }}'">Editar</button></td>
                        <td>
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
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
                    <td colspan="1">Produtos Cadastrados: {{ $produtos->count() }}</td>
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
