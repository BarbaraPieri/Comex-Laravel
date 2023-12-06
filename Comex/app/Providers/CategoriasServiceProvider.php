<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoriasRepository;
use App\Repositories\CategoriasRepositoryInterface;


class CategoriasServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CategoriasRepositoryInterface::class, CategoriasRepository::class);
    }
}
