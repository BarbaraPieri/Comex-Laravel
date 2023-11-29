<?php
namespace App\Repositories;

use App\Models\Categoria;

class CategoriasRepository implements CategoriasRepositoryInterface
{
    public function criarCategorias($dados)
    {
        return Categoria::create($dados);
    }

    public function listarCategorias()
    {
        return Categoria::all();
    }

    public function findCategorias($id)
    {
        return Categoria::find($id);
    }

    public function updateCategoria($id, $dados)
    {
        $categoria = Categoria::find($id);

        if ($categoria) {
            $categoria->update($dados);
        }

        return $categoria;
    }

    public function destroyCategoria($id)
    {
        $categoria = Categoria::find($id);

        if ($categoria) {
            $categoria->delete();
        }
    }
}
