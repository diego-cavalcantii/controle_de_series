<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Genero;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $generos = Genero::all(); // Obtenha todos os gêneros do banco de dados
            $view->with('generos', $generos); // Compartilhe a variável `$generos` com a view
        });
    }
}
