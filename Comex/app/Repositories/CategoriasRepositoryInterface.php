<?php
namespace App\Repositories;

interface CategoriasRepositoryInterface
{
    public function criarCategorias($dados);
    public function listarCategorias();
    public function findCategorias($id);
    public function updateCategoria($id, $dados);
    public function destroyCategoria($id);

}
