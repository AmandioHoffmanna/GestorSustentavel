{{-- herda a view 'base' --}}
@extends('base')
{{-- cria a seção content, definida na base, para injetar o código --}}
@section('content')
    <h2>Atualizar um Usuário</h2>
    {{-- o atributo action aponta para a rota que está direcionada ao método update do controlador --}}
    <form class="form" id="update-form" method="POST" action="{{ route('usuarios.update', $usuarios->id) }}">
        {{-- CSRF é um token de segurança para validar o formulário --}}
        @csrf
        {{-- o método de atualização é o PUT --}}
        @method('PUT')
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required value="{{ $usuarios->nome }}">
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" required value="{{ $usuarios->cpf }}">
    </form>
    {{-- note que os botões estão fora dos forms. O atributo form indica qual form o botão pertence --}}
    <button form="update-form" type="submit">Salvar</button>
    <button form="delete-form" type="submit" value="Excluir" >Excluir</button>
    {{-- form para exclusão --}}
    <form method="POST" class="form" id="delete-form" action="{{ route('usuarios.destroy', $usuarios->id) }}">
        @csrf
        {{-- o método HTTP para exclusão deve ser o DELETE --}}
        @method('DELETE')
    </form>
@endsection
