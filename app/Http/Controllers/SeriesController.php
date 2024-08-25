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
        return to_route('series.index');
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

        return to_route('series.index');
    }

    public function destroy(string $id)
    {
        $serie = Serie::findOrFail($id);
        $serie->delete();
        return to_route('series.index');
    }
}
