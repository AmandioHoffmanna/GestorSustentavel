{{-- herda a view 'base' --}}
@extends('base')
{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
    <h2>Usuários</h2>
    {{-- se a variável $usuarios não existir, mostra um h3 com uma mensagem --}}
   
    <form class="btn-incluir" action="{{ route('usuarios.create') }}" method="GET">
        <button type="submit" class="btn btn-success">Incluir</button>
    </form>

    @if (!isset($usuarios))
        <h3 style="color: red">Nenhum Registro Encontrado!</h3>
        {{-- senão, monta a tabela com o dados --}}
    @else
    <table class="data-table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th colspan="3">Opções</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->nome }}</td>
                <td>{{ $usuario->cpf }}</td>
                <td><button onclick="window.location.href='{{ route('usuarios.show', $usuario->id) }}'">Exibir</button></td>
                <td><button onclick="window.location.href='{{ route('usuarios.edit', $usuario->id) }}'">Editar</button></td>
                <td>
                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
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
            <td colspan="5">Usuários Cadastrados: {{ $usuarios->count() }}</td>
        </tr>
    </tfoot>
</table>

    @endif
    @if(isset($msg))
        <script>
            alert("{{$msg}}");
        </script>
    @endif
@endsection