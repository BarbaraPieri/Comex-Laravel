<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();

        return view('categorias.index')->with('categorias', $categorias);
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
            $nomeCategoria = $request->input('nome');
            $categoria = new Categoria();
            $categoria->nome = $nomeCategoria;
            $categoria->save();

            return redirect('/categorias');
    }
}




