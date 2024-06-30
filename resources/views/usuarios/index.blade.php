{{-- herda a view 'base' --}}
@extends('base')
{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
    <h2>Usuários Cadastrados</h2>
    {{-- se a variável $usuarios não existir, mostra um h3 com uma mensagem --}}
    @if (!isset($usuarios))
        <h3 style="color: red">Nenhum Registro Encontrado!</h3>
        {{-- senão, monta a tabela com o dados --}}
    @else
    <table class="data-table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th colspan="2">Opções</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $v)
            <tr>
                <td>{{ $v->nome }}</td>
                <td>{{ $v->cpf }}</td>
                <td><button onclick="window.location.href='{{ route('usuarios.show', $v->id) }}'">Exibir</button></td>
                <td><button onclick="window.location.href='{{ route('usuarios.edit', $v->id) }}'">Editar</button></td>
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