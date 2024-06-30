@extends('base')

@section('content')
    <h2>Produtos Cadastrados</h2>

    @if ($produtos->isEmpty())
        <h3 style="color: red">Nenhum Produto Encontrado!</h3>
    @else
        <table class="data-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td><button onclick="window.location.href='{{ route('produtos.show', $produto->id) }}'">Exibir</button></td>
                        <td><button onclick="window.location.href='{{ route('produtos.edit', $produto->id) }}'">Editar</button></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Produtos Cadastrados: {{ $produtos->count() }}</td>
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
