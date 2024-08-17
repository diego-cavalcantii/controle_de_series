<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola', function(){ #Definindo uma rota para o endereço /ola e assim exibindo a mensagem Olá Mundo! ou exebir qualquer codigo php
    echo "Olá Mundo!";
});


Route::get('/series',[SeriesController::class,'index']); #Definindo uma rota para  - usando o controller SeriesController e o método index
# criei uma rota para o endereço /series que vai chamar o método index do controller SeriesController

Route::get('/series/criar',[SeriesController::class,'create']); 

