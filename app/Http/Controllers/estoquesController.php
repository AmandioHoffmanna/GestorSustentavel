<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoques;
use App\Models\Produtos;
use App\Models\Locais;
use Illuminate\Support\Facades\Auth;

class EstoquesController extends Controller
{
    public function index(Request $request)
    {
        $query = Estoques::with(['produto', 'local', 'usuario']);
    
        if ($request->has('produto') && !is_null($request->produto)) {
            $query->whereHas('produto', function ($q) use ($request) {
                $q->where('nome', 'like', '%'. $request->produto. '%');
            });
        }
    
        if ($request->has('local') && !is_null($request->local)) {
            $query->whereHas('local', function ($q) use ($request) {
                $q->where('nome', 'like', '%'. $request->local. '%');
            });
        }

        if ($request->has('usuario') && !is_null($request->usuario)) {
            $query->whereHas('usuario', function ($q) use ($request) {
            $q->where('nome', 'like', '%'. $request->usuario. '%');
            });
        }
    
        if ($request->has('min_quantidade') &&  !is_null($request->min_quantidade)) {
            $query->where('quantidade', '>=', $request->min_quantidade);
        }
    
        $estoques = $query->paginate(20);
    
        return view('estoques.index', compact('estoques'));
    }

    public function create()
    {
        $produtos = Produtos::all();
        $locais = Locais::all();
        return view('estoques.create', compact('produtos', 'locais'));
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'local_id' => 'required|exists:locais,id',
            'quantidade' => 'required|integer|min:0',
        ]);

        // Verificar se o usuário está autenticado
        $userId = Auth::id();
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Usuário não autenticado.');
        }

        // Criação de um novo estoque
        Estoques::create([
            'produto_id' => $request->produto_id,
            'local_id' => $request->local_id,
            'quantidade' => $request->quantidade,
            'usuario_id' => $userId,
        ]);

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('estoques.index')->with('msg', 'Estoque cadastrado com sucesso!');
    }

    public function show($id)
    {
        $estoque = Estoques::with(['produto', 'local', 'usuario'])->find($id);
        if ($estoque) {
            return view('estoques.show', compact('estoque'));
        } else {
            return redirect()->route('estoques.index')->with('msg', 'Estoque não encontrado!');
        }
    }

    public function edit($id)
    {
        $estoque = Estoques::find($id);
        if (!$estoque) {
            return redirect()->route('estoques.index')->with('msg', 'Estoque não encontrado!');
        }

        $produtos = Produtos::all();
        $locais = Locais::all();

        return view('estoques.edit', compact('estoque', 'produtos', 'locais'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'local_id' => 'required|exists:locais,id',
            'quantidade' => 'required|integer|min:0',
        ]);

        // Busca o estoque pelo ID
        $estoque = Estoques::find($id);
        if (!$estoque) {
            return redirect()->route('estoques.index')->with('msg', 'Estoque não encontrado!');
        }

        // Atualiza os dados do estoque com base nos dados do formulário
        $estoque->update([
            'produto_id' => $request->produto_id,
            'local_id' => $request->local_id,
            'quantidade' => $request->quantidade,
            'usuario_id' => Auth::id(), // Atualiza o usuário que fez a alteração
        ]);

        // Redireciona de volta para a lista de estoques com mensagem de sucesso
        return redirect()->route('estoques.index')->with('msg', 'Estoque atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $estoque = Estoques::find($id);
        if (!$estoque) {
            return redirect()->route('estoques.index')->with('msg', 'Estoque não encontrado!');
        }

        $estoque->delete();

        return redirect()->route('estoques.index')->with('msg', 'Estoque excluído com sucesso!');
    }
}