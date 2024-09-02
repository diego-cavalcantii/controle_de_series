<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
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

        $series = Serie::with(['generos','seasons'])->get();
        $generos = Genero::all();
        $mensagemSucesso = session('success');


        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso)
            ->with('genero',$generos); # Retornando a view listar-series

    }

    public function create()
    {
        $generos = Genero::all();
        return view('series.create', ['generos' => $generos]);
    }

    public function store(SeriesFormRequest $request)
    {

//        dd($request->all());
        $serie = Serie::create($request->all());
        $seasons = [];
        for ($i = 1; $i <= $request->seasonsQty; $i++) {
            $seasons[] = [
                'series_id' => $serie->id,
                'numero' => $i
            ];
        }
        Season::insert($seasons);

        $episodes = [];
        foreach($serie->seasons as $season){
            for($j = 1; $j <= $request->episodesPerSeason; $j++){
                $episodes[] = [
                    'season_id' => $season->id,
                    'numero' => $j
                ];
            }
        }
        Episode::insert($episodes);

        // Redireciona com uma mensagem de sucesso
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
