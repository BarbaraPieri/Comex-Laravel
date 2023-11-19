<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = [
            'CELULARES',
            'INFORMÁTICA',
            'MÓVEIS',
            'AUTOMOTIVA',
            'LIVROS',
            'BELEZA',
            'ESPORTE',
            'LUXO',
        ];

        return view('categorias.index')->with('categorias', $categorias);
    }

    public function create()
    {
        return view('categorias.create');
    }
}
