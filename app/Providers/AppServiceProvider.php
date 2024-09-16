<?php

namespace App\Providers;

use App\Models\Series;
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
        View::composer('components.header', function ($view) {
            $generos = Genero::all();
            $avaliacoes = Series::select('avaliacao')->distinct()->pluck('avaliacao');
            $assistidos = Series::select('assistido')->distinct()->pluck('assistido');
            $view->with('generos', $generos)->with('avaliacoes', $avaliacoes)->with('assistidos', $assistidos);        });
    }
}
