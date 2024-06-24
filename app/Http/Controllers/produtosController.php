<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produtos::all();
        return view('Produtos.index')->with('produtos', $produtos);
    }

    public function create()
    {
        return view('Produtos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $produto = new Produtos();
        $produto->nome = $request->input('nome');
        $produto->save();

        return redirect()->route('produtos.index')
                         ->with('msg', 'Produto cadastrado com sucesso!');
    }

    public function show($id)
    {
        $produto = Produtos::find($id);
        if ($produto) {
            return view('Produtos.show')->with('produto', $produto);
        } else {
            return view('Produtos.show')->with('msg', 'Produto não encontrado!');
        }
    }

    public function edit($id)
    {
        $produto = Produtos::find($id);
        if (!$produto) {
            return redirect()->route('produtos.index')->with('msg', 'Produto não encontrado!');
        }
    
        return view('Produtos.edit')->with('produto', $produto);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $produto = Produtos::find($id);
        if (!$produto) {
            return redirect()->route('produtos.index')
                             ->with('msg', 'Produto não encontrado!');
        }

        $produto->nome = $request->input('nome');
        $produto->save();

        return redirect()->route('produtos.index')
                         ->with('msg', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $produto = Produtos::find($id);
        if (!$produto) {
            return redirect()->route('produtos.index')
                             ->with('msg', 'Produto não encontrado!');
        }

        $produto->delete();

        return redirect()->route('produtos.index')
                         ->with('msg', 'Produto excluído com sucesso!');
    }
}
