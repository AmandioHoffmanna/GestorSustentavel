@extends('base')

@section('content')
    <h2>Gerenciamento estoque</h2>

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
                        <td>{{ $estoque->id }}</td>
                        <td>{{ $estoque->produto->nome }}</td>
                        <td>{{ $estoque->local->nome }}</td>
                        <td>{{ $estoque->quantidade }}</td>
                        <td>{{ $estoque->usuario->nome }}</td> 
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
                    <td colspan="6">Estoques Cadastrados: {{ $estoques->count() }}</td>
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
