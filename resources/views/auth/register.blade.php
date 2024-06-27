<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar - Gestor Sustentável</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Cor de fundo suave */
            font-family: 'Arial', sans-serif; /* Fonte padrão */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Centraliza verticalmente na tela */
            margin: 0;
            padding: 0;
        }
        .card {
            width: 100%; /* Largura máxima do card */
            max-width: 400px; /* Limita a largura para um tamanho razoável */
            padding: 20px;
            background-color: #ffffff; /* Fundo do card */
            border-radius: 8px; /* Borda arredondada */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Sombra suave */
        }
        .card-header {
            background-color: #007bff; /* Cor de fundo do cabeçalho */
            color: #ffffff; /* Cor do texto do cabeçalho */
            border-radius: 8px 8px 0 0; /* Borda arredondada apenas no topo */
            padding: 12px;
            text-align: center;
            font-size: 1.25rem; /* Tamanho da fonte do cabeçalho */
        }
        .form-control {
            padding: 10px;
            font-size: 16px;
        }
        .btn-primary {
            background-color: #007bff; /* Cor de fundo do botão */
            border: none;
            border-radius: 4px; /* Borda arredondada */
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Transição suave de cor de fundo */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Cor de fundo do botão ao passar o mouse */
        }
    </style>
</head>
<body>

<div class="card">
    <div class="card-header">{{ __('Registrar') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome:</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-Mail:</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password-confirm" class="form-label">Confirmar Senha:</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">{{ __('Registrar') }}</button>
            </div>
        </form>
    </div>
</div>

<!-- Scripts do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
