<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuarios; 
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all();
        return view('usuarios.index')->with('usuarios', $usuarios);
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:20|unique:usuarios',
            'email' => 'required|string|email|unique:usuarios|max:255',
            'password' => 'required|string|min:8',
        ]);

        $usuario = new Usuarios();
        $usuario->nome = $request->input('nome');
        $usuario->cpf = $request->input('cpf');
        $usuario->email = $request->input('email');
        $usuario->password = Hash::make($request->input('password'));
        $usuario->save();

        return redirect()->route('usuarios.index')->with('msg', 'Usuário cadastrado com sucesso!');
    }

    public function show($id)
    {
        $usuario = Usuarios::find($id);
        if ($usuario) {
            return view('usuarios.show')->with('usuario', $usuario);
        } else {
            return view('usuarios.show')->with('msg', 'Usuário não encontrado!');
        }
    }

    public function edit($id)
    {
        $usuario = Usuarios::find($id);
        if ($usuario) {
            return view('usuarios.edit')->with('usuario', $usuario);
        } else {
            return redirect()->route('usuarios.index')->with('msg', 'Usuário não encontrado!');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:20|unique:usuarios,cpf,' . $id,
            'email' => 'required|string|email|max:255|unique:usuarios,email,' . $id,
        ]);

        $usuario = Usuarios::find($id);
        if (!$usuario) {
            return redirect()->route('usuarios.index')->with('msg', 'Usuário não encontrado!');
        }

        $usuario->nome = $request->input('nome');
        $usuario->cpf = $request->input('cpf');
        $usuario->email = $request->input('email');
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->input('password'));
        }
        $usuario->save();

        return redirect()->route('usuarios.index')->with('msg', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $usuario = Usuarios::find($id);
        if (!$usuario) {
            return redirect()->route('usuarios.index')->with('msg', 'Usuário não encontrado!');
        }

        $usuario->delete();

        return redirect()->route('usuarios.index')->with('msg', 'Usuário excluído com sucesso!');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Faz o logout do usuário
        $request->session()->invalidate(); // Invalida a sessão
        $request->session()->regenerateToken(); // Regenera o token de sessão

        return redirect('/login'); // Redireciona para a página de login após o logout
    }
}
