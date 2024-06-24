<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locais;

class LocaisController extends Controller
{
    public function index()
    {
        $locais = Locais::all();
        return view('Locais.index')->with('locais', $locais);
    }

    public function create()
    {
        return view('Locais.create');
    }

    public function store(Request $request)
    {
    // Validação dos dados
    $request->validate([
        'nome' => 'required|string|max:255',
        'endereco' => 'required|string|max:255',
    ]);

    // Criação de um novo local
    $local = new Locais();
    $local->nome = $request->input('nome');
    $local->endereco = $request->input('endereco');
    $local->save();

    // Redirecionamento com mensagem de sucesso
    return redirect()->route('locais.index')->with('msg', 'Local cadastrado com sucesso!');
    }

    public function show($id)
    {
        $local = Locais::find($id);
        if ($local) {
            return view('Locais.show')->with('local', $local);
        } else {
            return view('Locais.show')->with('msg', 'Local não encontrado!');
        }
    }

    public function edit($id)
    {
        $local = Locais::find($id);
        if (!$local) {
            return redirect()->route('locais.index')->with('msg', 'Local não encontrado!');
        }
    
        return view('Locais.edit')->with('local', $local);
    }
    

    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
        ]);
    
        // Busca o local pelo ID
        $local = Locais::find($id);
        if (!$local) {
            return redirect()->route('locais.index')->with('msg', 'Local não encontrado!');
        }
    
        // Atualiza os dados do local com base nos dados do formulário
        $local->nome = $request->input('nome');
        $local->endereco = $request->input('endereco');
        $local->save();
    
        // Redireciona de volta para a lista de locais com mensagem de sucesso
        return redirect()->route('locais.index')->with('msg', 'Local atualizado com sucesso!');
    }
    

    public function destroy($id)
    {
        $local = Locais::find($id);
        if (!$local) {
            return redirect()->route('locais.index')
                             ->with('msg', 'Local não encontrado!');
        }

        $local->delete();

        return redirect()->route('locais.index')
                         ->with('msg', 'Local excluído com sucesso!');
    }
}
