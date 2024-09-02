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
        $serieExistente = Serie::where('nome', $request->nome)->first();
        if ($serieExistente) {
            return redirect()->back()->withErrors(['nome' => 'Essa série já existe no banco de dados.'])->withInput();
        }
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
        return to_route('series.index')->with('success', "Série {$serie->nome} criada com sucesso!")->with('series', Serie::all())->with('genero', Genero::all());
    }

    public function edit(Serie $serie)
    {
        $seasons = $serie->seasons()->with('episodes')->get();
        $generos = Genero::all();
        return view('series.edit', ['serie' => $serie, 'generos' => $generos, 'seasons' => $seasons]);

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

        dd($request->all());
        $id->update($request->all());


        return to_route('series.index')->with('success', "Série {$id->nome} atualizada com sucesso!");
    }

    public function destroy(Serie $id)
    {

        $id->delete();

        return to_route('series.index')->with('success', "Série {$id->nome} deletada com sucesso!");
    }
}
