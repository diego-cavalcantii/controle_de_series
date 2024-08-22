<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Serie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


# Controller - classe com ações e metodos que são executados quando uma rota é acessada
# Model - classe que representa uma tabela do banco de dados
# View - arquivo que contém o código html que será exibido ao usuário
# Route - arquivo que contém as rotas da aplicação

class SeriesController extends Controller # Recebia por parametro um requisão e retornava uma resposta
{
    /**
     * Display a listing of the resource.
     */
    public function index()  # Método index que recebe uma requisição e retorna uma resposta
    {
        //return $request -> url(); # Pegando o valor do parametro id da requisição / na url se acessa com ?id=1
        //return redirect('https://google.com'); # Redirecionando para a rota google.com
        $series = Serie::query()->orderBy('nome', 'asc')->get(); # Pegando todos os valores da tabela series
        //dd($series); # Função que exibe o valor da variavel e para a execução do código

        // return view('listar-series',[
        //     'series' => $series // variavel que vai ser passada para a view e valor que ela vai receber
        // ]); # Retornando a view listar-series

        return view('series.index')->with('series', $series); # Retornando a view listar-series
    }

    public function moviesGenero(Request $request)
    {

        $genero = $request->route('genero');

        $generoMap = [
            'acao' => 'Ação',
            'comedia' => 'Comédia',
            'drama' => 'Drama',
            'suspense' => 'Suspense',
            'terror' => 'Terror'
        ];

        // Se o gênero não estiver no mapeamento, use 'Ação' como padrão
        $generoNome = $generoMap[$genero];

        // Pegue as séries do banco de dados com o gênero especificado
        $series = Serie::where('genero', $generoNome)->orderBy('nome', 'asc')->get();

        return view('series.indexGenero', ['series' => $series, 'genero' => $generoNome]);
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
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'poster' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            session()->put('errors', $validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $serie = new Serie();
        $nomeSerie = $request->input('nome'); # Pegando o valor do parametro nome da requisição
        $serie->nome = $nomeSerie;

        $generoSerie = $request->input('genero'); # Pegando o valor do parametro nome da requisição
        $serie->genero = ucwords($generoSerie);

        $posterSerie = $request->input('poster');
        $serie->poster = $posterSerie;
        $serie->save(); # Salvando os valores na tabela series

        Session::flash('success', 'Série adicionada com sucesso!');


        //(DB::insert('INSERT INTO series (nome,genero)  VALUES (?,?)',[$nomeSerie,$generoSerie])){ # Inserindo na tabela series os valores de nome e genero
        return redirect('/'); # Redirecionando para a rota /series

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
        $serie = Serie::findOrFail($id); // Encontre a série pelo ID
        return view('series.edit')->with('serie', $serie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validação dos dados recebidos (ajuste conforme necessário)
        $request->validate([
            'nome' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'poster' => 'required|string|max:255',
        ]);

        $serie = Serie::findOrFail($id); // Encontre a série pelo ID
        $serie->nome = $request->input('nome'); // Atualize o nome
        $serie->genero = $request->input('genero'); // Atualize o gênero
        $serie->poster = $request->input('poster');
        $serie->save(); // Salve as mudanças

        return redirect('/'); // Redirecione para a lista de séries
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $serie = Serie::findOrFail($id);

        $serie->delete();

        return redirect('/');
    }
}
