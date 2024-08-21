<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/ola', function(){ #Definindo uma rota para o endereço /ola e assim exibindo a mensagem Olá Mundo! ou exebir qualquer codigo php
//     echo "Olá Mundo!";
// });


Route::get('/',[SeriesController::class,'index']); #Definindo uma rota para  - usando o controller SeriesController e o método index
# criei uma rota para o endereço /series que vai chamar o método index do controller SeriesController

Route::get('/series/criar',[SeriesController::class,'create']); 

Route::post('/series/salvar',[SeriesController::class,'store']); 
// Route::get('/series/{id}/editar', [SeriesController::class, 'edit']); // Mostrar formulário de edição
Route::get('/series/{id}/editar',[SeriesController::class,'edit']);

Route::put('/series/{id}', [SeriesController::class, 'update']); // Atualizar série

Route::delete('/series/{id}',[SeriesController::class,'destroy']); # Rota para deletar uma serie
# essa rota espera receber um id no url, e assim que acessar a rota ela executa o método destroy do controller SeriesController



