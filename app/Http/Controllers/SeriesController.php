<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Serie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Genero;

class SeriesController extends Controller
{

    public function index()
    {
        $series = Serie::query()->orderBy('nome', 'asc')->get();

        return view('series.index')->with('series', $series); # Retornando a view listar-series
    }

    public function create()
    {
        $generos = Genero::all();
        return view('series.create', ['generos' => $generos]);
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        // $validator = Validator::make($request->all(), [
        //     'nome' => 'required|string|max:255',
        //     'genero' => 'required|string|max:255',
        //     'poster' => 'required|string|max:255',
        // ]);

        // // Verifica se a validação falhou
        // if ($validator->fails()) {
        //     // Armazena os erros na sessão e redireciona de volta com os erros e os inputs antigos
        //     session()->put('errors', $validator->errors());
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        Serie::create($request->all());
        return redirect('/');
    }

    public function edit(string $id)
    {
        $generos = Genero::all();
        $serie = Serie::findOrFail($id);
        return view('series.edit', ['serie' => $serie, 'generos' => $generos]);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'poster' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $serie = Serie::findOrFail($id);
        $serie->nome = $request->input('nome');
        $serie->genero = $request->input('genero');
        $serie->poster = $request->input('poster');
        $serie->save();

        return redirect('/');
    }

    public function destroy(string $id)
    {
        $serie = Serie::findOrFail($id);
        $serie->delete();
        return redirect('/');
    }

    public function moviesGenero(Request $request)
    {
        $generoSlug = $request->route('genero');

        // Busca o gênero na tabela 'genero' usando o slug fornecido na URL
        $genero = Genero::whereRaw('LOWER(nome_genero) = ?', [strtolower($generoSlug)])->first();

        $generoNome = $genero ? $genero->nome_genero : null;
        if ($generoSlug === 'todos') {
            $series = Serie::orderBy('nome', 'asc')->get();
        } else {
            $series = Serie::where('genero', $generoNome)->orderBy('nome', 'asc')->get();
        }
        return view('series.indexGenero', ['series' => $series, 'genero' => $generoNome]);
    }

    public function indexGenero()
    {
        $generos = Genero::all();
        return view('generos.index', ['generos' => $generos]);
    }


    public function createGenero()
    {
        return view('generos.create');
    }

    public function storeGenero(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'genero' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $genero = ucwords($request->input('genero'));
        $generoExistente = Genero::where('nome_genero', $genero)->first();
        if ($generoExistente) {
            return redirect()->back()->withErrors(['genero' => 'Esse gênero já existe no banco de dados.'])->withInput();
        }
        Genero::create([
            'nome_genero' => $genero
        ]);
        return redirect()->back();
    }

    public function editGenero(string $id)
    {
        $genero = Genero::findOrFail($id);
        return view('generos.edit', ['genero' => $genero]);
    }

    public function updateGenero(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'genero' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $genero = Genero::findOrFail($id);
        $genero->nome_genero = ucwords($request->input('genero'));

        $generoExistente = Genero::where('nome_genero', $genero->nome_genero)->first();
        if ($generoExistente) {
            return redirect()->back()->withErrors(['genero' => 'Esse gênero já existe no banco de dados.'])->withInput();
        }
        $genero->save();
        return redirect('/generos');
    }



    public function destroyGenero(string $id)
    {
        $genero = Genero::findOrFail($id);
        $genero->delete();
        return redirect()->back();
    }
}
