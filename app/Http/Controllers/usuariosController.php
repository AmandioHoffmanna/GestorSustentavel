<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;

class usuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        return view('usuarios.index')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:20|unique:usuarios', // CPF único na tabela usuarios
            'email' => 'required|string|email|unique:usuarios|max:255', // Email único na tabela usuarios
            'password' => 'required|string|min:8',
        ]);

        // Criação de um novo usuário
        $usuario = new Usuarios();
        $usuario->nome = $request->input('nome');
        $usuario->cpf = $request->input('cpf');
        $usuario->email = $request->input('email');
        $usuario->password = Hash::make($request->input('password'));
        $usuario->save();

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('usuarios.index')->with('msg', 'Usuário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = Usuarios::find($id);
        if ($usuario) {
            return view('usuarios.show')->with('usuario', $usuario);
        } else {
            return view('usuarios.show')->with('msg', 'Usuário não encontrado!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario = Usuarios::find($id);
        if ($usuario) {
            return view('usuarios.edit')->with('usuario', $usuario);
        } else {
            return redirect()->route('usuarios.index')->with('msg', 'Usuário não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:20|unique:usuarios,cpf,' . $id,
            'email' => 'required|string|email|max:255|unique:usuarios,email,' . $id,
        ]);

        // Busca o usuário pelo ID
        $usuario = Usuarios::find($id);
        if (!$usuario) {
            return redirect()->route('usuarios.index')->with('msg', 'Usuário não encontrado!');
        }

        // Atualiza os dados do usuário com base nos dados do formulário
        $usuario->nome = $request->input('nome');
        $usuario->cpf = $request->input('cpf');
        $usuario->email = $request->input('email');
        // Verifica se há uma senha nova para atualizar
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->input('password'));
        }
        $usuario->save();

        // Redireciona de volta para a lista de usuários com mensagem de sucesso
        return redirect()->route('usuarios.index')->with('msg', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Usuarios::find($id);
        if (!$usuario) {
            return redirect()->route('usuarios.index')->with('msg', 'Usuário não encontrado!');
        }

        $usuario->delete();

        return redirect()->route('usuarios.index')->with('msg', 'Usuário excluído com sucesso!');
    }
}
