@extends('base')

@section('content')
    <h2>Cadastrar Novo Local</h2>

    {{-- Exibir mensagens de erro de validação --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulário de cadastro --}}
    <form class="form" method="POST" action="{{ route('locais.store') }}">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required>
        </div>
        <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" id="endereco" value="{{ old('endereco') }}" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Salvar">
            <input type="reset" value="Limpar">
        </div>
    </form>
@endsection
