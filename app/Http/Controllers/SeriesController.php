<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
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
        $mensagemSucesso = session('success');



        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso); # Retornando a view listar-series
    }

    public function create()
    {
        $generos = Genero::all();
        return view('series.create', ['generos' => $generos]);
    }

    public function store(SeriesFormRequest $request)
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


        $serie = Serie::create($request->all());

        return to_route('series.index')->with('success', "Série {$serie->nome} criada com sucesso!");
    }

    public function edit(Serie $id)
    {
        $generos = Genero::all();
        return view('series.edit', ['serie' => $id, 'generos' => $generos]);
    }

    public function update(Serie $id, SeriesFormRequest $request)
    {
//        $validator = Validator::make($request->all(), [
//            'nome' => 'required|string|max:255',
//            'genero' => 'required|string|max:255',
//            'poster' => 'required|string|max:255',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect()->back()->withErrors($validator)->withInput();
//        }
//        $serie = Serie::findOrFail($id);
//        $serie->nome = $request->input('nome');
//        $serie->genero = $request->input('genero');
//        $serie->poster = $request->input('poster');
//        $serie->save();

        $id->update($request->all());


        return to_route('series.index')->with('success', "Série {$id->nome} atualizada com sucesso!");
    }

    public function destroy(Serie $id)
    {

        $id->delete();

        return to_route('series.index')->with('success', "Série {$id->nome} deletada com sucesso!");
    }
}
