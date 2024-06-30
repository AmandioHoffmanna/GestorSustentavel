@extends('base')
@section('content')
    <h2>Usuários</h2>
    <form method="GET" action="{{ route('usuarios.index') }}">
        <div class="filtro">
            <span class="input-group-text">Usuário:</span>
            <input type="text" name="usuario" value="{{ request('usuario') }}" class="form-control">
        </div>
        <button type="submit" class="btn-consultar">Consultar</button>
    </form>

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
                <td id="tdNomeUsuario">{{ $usuario->nome }}</td>
                <td id="tdCpfUsuario">{{ $usuario->cpf }}</td>
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
            <td colspan="2">Usuários Cadastrados: {{ $usuarios->count() }}</td>
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

<head>
    <link rel="stylesheet" href="/css/usuario.css">
</head>
