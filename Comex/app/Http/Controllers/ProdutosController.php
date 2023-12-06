<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoRequest;
use Illuminate\Http\Request;


class ProdutosController extends Controller
{
    public function index(Categoria $categoria)
    {
        $produtos = Produto::where('categorias_id', $categoria->id)->get();

        if (request()->ajax()) {
            return view('produtos.lista', ['produtos' => $produtos])->render();
        }

        return view('produtos.index', ['produtos' => $produtos, 'categoria' => $categoria]);
    }


    public function create(Categoria $categoria)
    {
        return view('produtos.create', compact('categoria'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nome' => 'required',
            // Adicione outras validações conforme necessário
        ]);

        $categoria = Categoria::findOrFail($request->categoria_id);

        $produto = Produto::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco_un' => $request->preco_un,
            'quantidade_est' => $request->quantidade_est,
            'categorias_id' => $categoria->id,
        ]);


        return redirect()->route('produtos.index', $categoria->id)->with('mensagemSucesso', 'Produto criado com sucesso.');
    }
    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(ProdutoRequest $request, Produto $produto)
    {
        $produto->update($request->validated());

        return redirect()->route('produtos.index', ['categoria' => $produto->categorias_id])
                         ->with('mensagemSucesso', 'Produto atualizado com sucesso.');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

    return redirect()->route('produtos.index', ['categoria' => $produto->categorias_id])
                     ->with('mensagemSucesso', 'Produto removido com sucesso.');
    }

}
