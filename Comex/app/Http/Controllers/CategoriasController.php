<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriasFormRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;



class CategoriasController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        $mensagemSucesso = session('mensagem.sucesso');


        return view('categorias.index')->with('categorias', $categorias)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('categorias.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:2',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O campo nome deve ter pelo menos 2 caracteres.',
        ]);

        try {
            $categoria = Categoria::create($request->all());

            return redirect()->route('categorias.index')
                ->with('mensagem.sucesso', "Categoria '{$categoria->nome}' criada com sucesso.");
        } catch (\Exception $e) {
            if ($e instanceof \Illuminate\Database\QueryException) {
                return redirect()->back()
                    ->withInput($request->all())
                    ->withErrors(['nome' => 'Erro ao criar a categoria. Certifique-se de fornecer um nome válido.']);
            }

            throw $e;
        }
    }

    public function destroy(Categoria $categoria)
    {
       $categoria->DELETE();

       return to_route('categorias.index')
       ->with('mensagem.sucesso', "Categoria '{$categoria->nome}' removida com sucesso.");
    }

    public function edit(Categoria $categoria)
    {
            return view('categorias.edit')->with('categoria', $categoria);
    }

    public function update(Categoria $categoria, CategoriasFormRequest $request)
    {
        $categoria->fill($request->all());
        $categoria->save();

        return to_route('categorias.index')
            ->with('mensagem.sucesso', "Categoria '{$categoria->nome}' atualizada com sucesso.");
    }


}



