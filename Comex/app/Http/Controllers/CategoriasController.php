<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriasFormRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoriasController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::query()->orderBy('nome')->get();
        $mensagemSucesso = session('mensagem.sucesso');


        return view('categorias.index')->with('categorias', $categorias)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(CategoriasFormRequest $request)
    {
            $categoria = Categoria::create($request->all());

            return to_route('categorias.index')
                ->with('mensagem.sucesso', "Categoria '{$categoria->nome}' ' adicionada com sucesso.");
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



