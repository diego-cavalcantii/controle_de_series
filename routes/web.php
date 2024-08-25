<?php

use App\Http\Controllers\GenerosController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return redirect('/series');
});

Route::get('/series', [SeriesController::class, 'index']); // Rota principal que chama o método index
Route::get('/series/todos', [SeriesController::class, 'index']); // Rota principal que chama o método index
Route::get('/series/criar', [SeriesController::class, 'create']); // Rota para criar uma nova série
Route::post('/series/salvar', [SeriesController::class, 'store']); // Rota para salvar uma nova série
Route::get('/series/{id}/editar', [SeriesController::class, 'edit']); // Rota para editar uma série existente
Route::put('/series/{id}', [SeriesController::class, 'update']); // Rota para atualizar uma série existente
Route::delete('/series/{id}', [SeriesController::class, 'destroy']); // Rota para deletar uma série existente





Route::get('/generos', [GenerosController::class, 'indexGenero']); // Rota para listar todos os gêneros
Route::get('/generos/criar', [GenerosController::class, 'createGenero']); // Rota para adicionar um novo gênero
Route::post('/generos/salvar', [GenerosController::class, 'storeGenero']); // Rota para salvar um novo gênero
Route::get('/generos/{id}/editar', [GenerosController::class, 'editGenero']); // Rota para editar um gênero
Route::put('/generos/{id}', [GenerosController::class, 'updateGenero']); // Rota para atualizar um gênero
Route::delete('/generos/{id}', [GenerosController::class, 'destroyGenero']); // Rota para deletar um gênero
Route::get('/series/{genero}', [GenerosController::class, 'moviesGenero']); // Rota para filtrar séries por gênero
