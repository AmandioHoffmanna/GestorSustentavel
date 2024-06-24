{{-- resources/views/auth/login.blade.php --}}
@extends('base')

@section('content')
    <div class="container">
        <h2>Login</h2>
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

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" required class="form-control" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" name="password" id="password" required class="form-control">
            </div>

            <div class="form-group">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Lembrar-me</label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
@endsection
