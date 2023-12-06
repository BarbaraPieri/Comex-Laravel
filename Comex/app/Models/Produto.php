<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'preco_un', 'quantidade_est', 'categorias_id'];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }
}
