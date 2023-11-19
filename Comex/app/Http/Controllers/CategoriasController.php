<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
            Categoria::create($request->all());
            $request->session()->flash('mensagem.sucesso', 'Categoria adicionada com sucesso.');

            return to_route('categorias.index');
    }


    public function destroy(Request $request)
    {
       Categoria::destroy($request->categoria);
       $request->session()->flash('mensagem.sucesso', 'Categoria removida com sucesso');

       return to_route('categorias.index');
    }
}


