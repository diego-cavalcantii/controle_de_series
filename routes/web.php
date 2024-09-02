<?php

use App\Http\Controllers\GenerosController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return redirect('/series');
});

//Route::resource('/series', SeriesController::class)->except('show');

 Route::controller(SeriesController::class)->group(function () {
   Route::get('/series', 'index')->name('series.index'); // Rota principal que chama o método index
   Route::get('/series/criar', 'create')->name('series.create'); // Rota para criar uma nova série
   Route::post('/series/salvar', 'store')->name('series.store'); // Rota para salvar uma nova série
   Route::get('/series/{id}/editar', 'edit')->name('series.edit'); // Rota para editar uma série existente
   Route::put('/series/{id}', 'update')->name('series.update'); // Rota para atualizar uma série existente
   Route::delete('/series/{id}', 'destroy')->name('series.destroy'); // Rota para deletar uma série existente
 });

Route::controller(GenerosController::class)->group(function () {
  Route::get('/generos', 'index')->name('generos.index'); // Rota para listar todos os gêneros
    Route::post('/generos/show', 'show')->name('generos.show');
  Route::get('/generos/criar', 'create')->name('generos.create'); // Rota para adicionar um novo gênero
  Route::post('/generos/salvar', 'store')->name('generos.store'); // Rota para salvar um novo gênero
  Route::get('/generos/{id}/editar', 'edit')->name('generos.edit'); // Rota para editar um gênero
  Route::put('/generos/{id}', 'update')->name('generos.update'); // Rota para atualizar um gênero
  Route::delete('/generos/{id}', 'destroy')->name('generos.destroy'); // Rota para deletar um gênero
});


Route::get('/series/{series}/seasons',[\App\Http\Controllers\SeasonsController::class, 'index'])->name('seasons.index');
