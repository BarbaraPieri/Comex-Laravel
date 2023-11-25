<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];
    protected $with = ['produtos'];

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'categorias_id');
    }

    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $querryBuilder) {
            $querryBuilder->orderBy('nome');
        });
    }
}
