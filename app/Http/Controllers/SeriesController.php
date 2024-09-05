<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Repositories\EloquentSeriesRepository;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Series;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Genero;

class SeriesController extends Controller
{

    public function index()
    {

        $series = Series::with(['generos','seasons'])->get();
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
        $request->merge(['nome' => ucwords($request->nome)]);
        $serie = Series::create($request->all());
        $seasons = [];
        for ($i = 1; $i <= $request->seasonsQty; $i++) {
            $seasons[] = [
                'series_id' => $serie->id,
                'numero' => $i,
            ];
        }
        Season::insert($seasons);

        $episodes = [];
        foreach ($serie->seasons as $season) {
            for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                $episodes[] = [
                    'season_id' => $season->id,
                    'numero' => $j
                ];
            }
        }
        Episode::insert($episodes);
        return to_route('series.index')->with('success', "Série {$serie->nome} criada com sucesso!");
    }

    public function edit(Series $series)
    {

        $generos = Genero::all();
        return view('series.edit', ['serie' => $series, 'generos' => $generos]);

    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->update($request->all());

        return to_route('series.index')->with('success', "Série {$series->nome} atualizada com sucesso!");
    }

    public function destroy(Series $series)
    {

        $series->delete();

        return to_route('series.index')->with('success', "Série {$series->nome} deletada com sucesso!");
    }
}
