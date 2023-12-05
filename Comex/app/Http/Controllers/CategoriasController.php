<?php

namespace App\Http\Controllers;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriasFormRequest;
use App\Repositories\CategoriasRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CategoriasController extends Controller
{
    private $categoriasRepository;

    public function __construct(CategoriasRepositoryInterface $categoriasRepository)
    {
        $this->categoriasRepository = $categoriasRepository;
    }

    public function index()
    {
         $categorias = $this->categoriasRepository->listarCategorias();
        return view('categorias.index', compact('categorias'));
    }

    public function store(CategoriasFormRequest $request)
    {
        $dados = $request->only('nome');
        $this->categoriasRepository->criarCategorias($dados);
        session()->flash('success', "Categoria '$dados[nome]' criada com sucesso");

        return redirect()->route('categorias.index');
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function edit($id)
    {
        $categoria = $this->categoriasRepository->findCategorias($id);

        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $dados = $request->only('nome');
    $categoria = $this->categoriasRepository->findCategorias($id);

    if (!$categoria) {
        // Trate o caso em que a categoria não foi encontrada
        return redirect()->route('categorias.index')->with('error', 'Categoria não encontrada');
    }

    $nomeAntigo = $categoria->nome;

    $this->categoriasRepository->updateCategoria($id, $dados);

    // Mensagem de sucesso com o nome da categoria
    session()->flash('success', "Categoria '$nomeAntigo' atualizada com sucesso");

    return redirect()->route('categorias.index');
    }

    public function destroy($id)
    {
        $categoria = $this->categoriasRepository->findCategorias($id);

    if (!$categoria) {
        // Trate o caso em que a categoria não foi encontrada
        return redirect()->route('categorias.index')->with('error', 'Categoria não encontrada');
    }

    $nomeCategoria = $categoria->nome;

    $this->categoriasRepository->destroyCategoria($id);

    // Mensagem de sucesso com o nome da categoria
    session()->flash('success', "Categoria '$nomeCategoria' excluída com sucesso");

    return redirect()->route('categorias.index');
    }
}
