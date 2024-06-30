@extends('base')

@section('content')
    <h2>Locais</h2>

    <form method="GET" action="{{ route('locais.index') }}">
        <div class="filtro">
            <span class="input-group-text">Local:</span>
            <input type="text" name="local" value="{{ request('local') }}" class="form-control">
        </div>
        <button type="submit" class="btn-consultar">Consultar</button>
    </form>

    <form class="btn-incluir" action="{{ route('locais.create') }}" method="GET">
        <button type="submit" class="btn btn-success">Incluir</button>
    </form>

    @if ($locais->isEmpty())
        <h3 style="color: red">Nenhum Local Encontrado!</h3>
    @else
        <table class="data-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th colspan="3">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locais as $local)
                    <tr>
                        <td>{{ $local->nome }}</td>
                        <td>{{ $local->endereco }}</td>
                        <td><button onclick="window.location.href='{{ route('locais.show', $local->id) }}'">Exibir</button></td>
                        <td><button onclick="window.location.href='{{ route('locais.edit', $local->id) }}'">Editar</button></td>
                        <td>
                            <form action="{{ route('locais.destroy', $local->id) }}" method="POST">
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
                    <td colspan="3">Locais Cadastrados: {{ $locais->count() }}</td>
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
