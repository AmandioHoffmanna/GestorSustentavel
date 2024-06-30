<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gestor Sustentável</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Cor de fundo suave */
            font-family: 'Arial', sans-serif; /* Fonte padrão */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Centraliza verticalmente na tela */
        }
        .login-container {
            max-width: 400px; /* Largura máxima do formulário */
            padding: 20px;
            background-color: #ffffff; /* Fundo do formulário */
            border-radius: 8px; /* Borda arredondada */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Sombra suave */
        }
        .login-container h2 {
            margin-bottom: 20px; /* Espaçamento inferior do título */
            text-align: center;
        }
        .login-container h6 {
            margin-bottom: 20px; /* Espaçamento inferior do título */
            text-align: center;
            color: #0056b3;
        }
        .login-container form {
            display: flex;
            flex-direction: column;
        }
        .login-container form label {
            margin-bottom: 6px; /* Espaçamento inferior do label */
        }
        .login-container form input {
            padding: 10px;
            margin-bottom: 15px; /* Espaçamento inferior do input */
            border: 1px solid #ccc; /* Borda cinza */
            border-radius: 4px; /* Borda arredondada */
            font-size: 16px;
        }
        .login-container form button {
            padding: 10px;
            background-color: #007bff; /* Cor de fundo do botão */
            color: #ffffff; /* Cor do texto do botão */
            border: none;
            border-radius: 4px; /* Borda arredondada */
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Transição suave de cor de fundo */
        }
        .login-container form button:hover {
            background-color: #0056b3; /* Cor de fundo do botão ao passar o mouse */
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <h6>Gestor Sustentável</h6>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mb-3">Login</button>
        <p class="text-center mb-0">Não tem uma conta? <a href="{{ route('register') }}">Registrar-se</a></p>
    </form>
</div>

<!-- Scripts do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
