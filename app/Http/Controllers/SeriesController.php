<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Serie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Genero;


# Controller - classe com ações e metodos que são executados quando uma rota é acessada
# Model - classe que representa uma tabela do banco de dados
# View - arquivo que contém o código html que será exibido ao usuário
# Route - arquivo que contém as rotas da aplicação

class SeriesController extends Controller # Recebia por parametro um requisão e retornava uma resposta
{

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
        $generoSlug = $request->route('genero');

        // Busca o gênero na tabela 'genero' usando o slug fornecido na URL
        $genero = Genero::whereRaw('LOWER(nome_genero) = ?', [strtolower($generoSlug)])->first();

        // Se o gênero for encontrado, use o nome dele, caso contrário, defina como null
        $generoNome = $genero ? $genero->nome_genero : null;

        // Se 'todos' for selecionado, busca todas as séries; caso contrário, busca as séries do gênero especificado
        if ($generoSlug === 'todos') {
            $series = Serie::orderBy('nome', 'asc')->get();
        } else {
            $series = Serie::where('genero', $generoNome)->orderBy('nome', 'asc')->get();
        }

        return view('series.indexGenero', ['series' => $series, 'genero' => $generoNome]);
    }
    public function create()
    {
        $generos = Genero::all();
        return view('series.create', ['generos' => $generos]);
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

    public function edit(string $id)
    {
        $generos = Genero::all();
        $serie = Serie::findOrFail($id); // Encontre a série pelo ID
        return view('series.edit', ['serie' => $serie, 'generos' => $generos]);
    }

    public function update(Request $request, string $id)
    {
        // Validação dos dados recebidos (ajuste conforme necessário)
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'poster' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            session()->put('errors', $validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $serie = Serie::findOrFail($id); // Encontre a série pelo ID
        $serie->nome = $request->input('nome'); // Atualize o nome
        $serie->genero = $request->input('genero'); // Atualize o gênero
        $serie->poster = $request->input('poster');
        $serie->save(); // Salve as mudanças

        return redirect('/'); // Redirecione para a lista de séries
    }
    public function editGenero()
    {
        return view('series.addGenero');
    }
    public function storeGenero(Request $request)
    {
        // Validação básica
        $request->validate([
            'genero' => 'required|string|max:255',
        ]);

        $genero = ucwords($request->input('genero'));

        Genero::create([
            'nome_genero' => $genero
        ]);

        return redirect('/')->with('success', 'Gênero adicionado com sucesso!');
    }


    public function destroy(string $id)
    {
        $serie = Serie::findOrFail($id);

        $serie->delete();

        return redirect('/');
    }
}
