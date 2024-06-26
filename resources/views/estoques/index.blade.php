@extends('base')

@section('content')
    <h2>Estoques Cadastrados</h2>

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
                    <th colspan="2">Opções</th>
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
                        <td><a href="{{ route('estoques.show', $estoque->id) }}">Exibir</a></td>
                        <td><a href="{{ route('estoques.edit', $estoque->id) }}">Editar</a></td>
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
