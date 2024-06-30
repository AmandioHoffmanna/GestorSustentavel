@extends('base')

@section('content')
    <h2>Locais Cadastrados</h2>

    @if ($locais->isEmpty())
        <h3 style="color: red">Nenhum Local Encontrado!</h3>
    @else
        <table class="data-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locais as $local)
                    <tr>
                        <td>{{ $local->nome }}</td>
                        <td>{{ $local->endereco }}</td>
                        <td><button onclick="window.location.href='{{ route('locais.show', $local->id) }}'">Exibir</button></td>
                        <td><button onclick="window.location.href='{{ route('locais.edit', $local->id) }}'">Editar</button></td>
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
