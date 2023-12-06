<?php

namespace Tests\Feature;

use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriaTest extends TestCase
{
    use RefreshDatabase;

    public function testCriarCategoria()
    {
        $categoria = Categoria::factory()->create();

        $this->assertDatabaseHas('categorias', ['id' => $categoria->id]);
    }

    public function testEditarCategoria()
    {
        $categoria = Categoria::factory()->create();

        $categoria->update(['nome' => 'Novo Nome']);

        $this->assertDatabaseHas('categorias', ['id' => $categoria->id, 'nome' => 'Novo Nome']);
    }

    public function testExcluirCategoria()
    {
        $categoria = Categoria::factory()->create();

        $categoria->delete();

        // Utilizando assertDatabaseMissing para verificar que a categoria foi removida
        $this->assertDatabaseMissing('categorias', ['id' => $categoria->id]);
    }
}
