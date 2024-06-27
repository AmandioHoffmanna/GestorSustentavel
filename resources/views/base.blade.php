<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestor Sustentável</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>Gestor Sustentável</h1>
        </header>
        <nav>
            <ul>
                <li><a href="/usuarios">Usuários</a></li>
                <li><a href="/usuarios/create">Cadastro de Usuários</a></li>
                <li><a href="/produtos">Produtos</a></li>
                <li><a href="/produtos/create">Cadastro de Produtos</a></li>
                <li><a href="/locais">Locais</a></li>
                <li><a href="/locais/create">Cadastro de Locais</a></li>
                <li><a href="/estoques">Estoque</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Sair</button>
                    </form>
                </li>
            </ul>
        </nav>
        <div class="content">
            @yield('content')
        </div>
        <footer>
            <div>
                <p>Sistemas de Informação</p>
                <p><a href="https://unidavi.edu.br/" target="_blank">Unidavi</a></p>
            </div>
            <div>
                <p>Programação Web II</p>
            </div>
        </footer>
    </div>
</body>
</html>
