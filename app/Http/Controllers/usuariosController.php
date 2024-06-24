<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class usuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //..recuperando os usuarios do banco de dados
        $usuarios = Usuarios::all();
        //..retorna a view index passando a variável $usuarios
        return view('usuarios.index')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         //..mostrando o formulário de cadastro
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
        'cpf' => 'required|string|max:20', 
    ]);

    // Instancia um novo model usuario
    $usuarios = new Usuarios(); // Note que a classe Usuarios deve estar capitalizada corretamente
    // Pega os dados vindos do form e seta no model
    $usuarios->nome = $request->input('nome');
    $usuarios->cpf = $request->input('cpf');
    // Persiste o model na base de dados
    $usuarios->save();
    // Retorna a view com uma variável msg que será tratada na própria view
    $usuarios = Usuarios::all();
    return view('usuarios.index')->with('usuarios', $usuarios)
        ->with('msg', 'Usuário cadastrado com sucesso!'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //..recupera o usuario da base de dados
         $usuarios = usuarios::find($id);
        //..se encontrar o usuario, retorna a view com o objeto correspondente
        if ($usuarios) {
         return view('usuarios.show')->with('usuarios', $usuarios);
        } else {
         //..senão, retorna a view com uma mensagem que será exibida.
         return view('usuarios.show')->with('msg', 'Usuarios não encontrado!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       //..recupera o usuario da base de dados
       $usuarios = usuarios::find($id);
        //..se encontrar o usuario, retorna a view de ediçãcom com o objeto correspondente
        if ($usuarios) {
           return view('usuarios.edit')->with('usuarios', $usuarios);
        } else {
         //..senão, retorna a view de edição com uma mensagem que será exibida.
         $usuarios = usuarios::all();            
         return view('usuarios.index')->with('usuarios', $usuarios)
             ->with('msg', 'Usuário não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //..recupera o usuario mediante o id
        $usuarios = usuarios::find($id);
        //..atualiza os atributos do objeto recuperado com os dados do objeto Request
        $usuarios->nome = $request->input('nome');
        $usuarios->cpf = $request->input('cpf');
        //..persite as alterações na base de dados
        $usuarios->save();
        //..retorna a view index com uma mensagem
        $usuarios = usuarios::all();
        return view('usuarios.index')->with('usuarios', $usuarios)
            ->with('msg', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //..recupeara o recurso a ser excluído
        $usuarios = usuarios::find($id);
        //..exclui o recurso
        $usuarios->delete();
        //..retorna à view index.
        $usuarios = usuarios::all();
        return view('usuarios.index')->with('usuarios', $usuarios)
         ->with('msg', "Usuário excluído com sucesso!");
    }
}
