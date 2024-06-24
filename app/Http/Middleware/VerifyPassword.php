<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyPassword
{
    public function handle($request, Closure $next)
    {
        // Verifica se o usuário está autenticado
        if (Auth::check()) {
            // Verifica se a senha foi digitada corretamente
            if ($request->user()->password == $request->input('password')) {
                return $next($request);
            }
        }

        // Redireciona de volta com uma mensagem de erro, se necessário
        return redirect()->back()->with('error', 'Senha incorreta.');
    }
}
