<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;


Route::get('/', [SeriesController::class, 'index']); // Rota principal que chama o método index

Route::get('/series/todos', [SeriesController::class, 'index']); // Rota principal que chama o método index

Route::get('/series/criar', [SeriesController::class, 'create']); // Rota para criar uma nova série

Route::post('/series/salvar', [SeriesController::class, 'store']); // Rota para salvar uma nova série

Route::get('/series/{id}/editar', [SeriesController::class, 'edit']); // Rota para editar uma série existente

Route::put('/series/{id}', [SeriesController::class, 'update']); // Rota para atualizar uma série existente

Route::delete('/series/{id}', [SeriesController::class, 'destroy']); // Rota para deletar uma série existente

Route::get('/series/add-genero', [SeriesController::class, 'editGenero']); // Rota para adicionar um novo gênero

Route::post('/series/salvar-genero', [SeriesController::class, 'storeGenero']); // Rota para salvar um novo gênero

Route::get('/series/{genero}', [SeriesController::class, 'moviesGenero']); // Rota para filtrar séries por gênero
