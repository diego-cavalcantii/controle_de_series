<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Controller - classe com ações e metodos que são executados quando uma rota é acessada
# Model - classe que representa uma tabela do banco de dados
# View - arquivo que contém o código html que será exibido ao usuário
# Route - arquivo que contém as rotas da aplicação

class SeriesController extends Controller # Recebia por parametro um requisão e retornava uma resposta
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)  # Método index que recebe uma requisição e retorna uma resposta
    {
        //return $request -> url(); # Pegando o valor do parametro id da requisição / na url se acessa com ?id=1
        //return redirect('https://google.com'); # Redirecionando para a rota google.com
        $series = [
            'Punisher',
            'Lost',
            'Breaking Bad',
            'This is Us'
          ];
      
        // return view('listar-series',[
        //     'series' => $series // variavel que vai ser passada para a view e valor que ela vai receber
        // ]); # Retornando a view listar-series

        return view('series.index') -> with('series',$series); # Retornando a view listar-series
    }
        //

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('series.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
