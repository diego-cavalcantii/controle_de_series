<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Serie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Genero;

class GenerosController extends Controller
{

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

    public function index()
    {
        $generos = Genero::all();
        return view('generos.index', ['generos' => $generos]);
    }


    public function create()
    {
        $mensagemSucesso = session('success');
        return view('generos.create')->with('mensagemSucesso', $mensagemSucesso);;
    }

    public function store(Request $request)
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
        return redirect()->back()->with('success', "genero criada com sucesso!");
    }

    public function edit(string $id)
    {
        $genero = Genero::findOrFail($id);
        return view('generos.edit', ['genero' => $genero]);
    }

    public function update(Request $request, string $id)
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
        return to_route('generos.index');
    }



    public function destroy(Request $request)
    {
        Genero::destroy($request->id);
        return redirect()->back();
    }
}
