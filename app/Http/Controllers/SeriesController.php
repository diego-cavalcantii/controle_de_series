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

    public function  __construct(private EloquentSeriesRepository $repository)
    {

    }

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
        $serie = $this->repository->add($request);
        return to_route('series.index')->with('success', "Série {$serie->nome} criada com sucesso!");
    }

    public function edit(Series $serie)
    {
        $seasons = $serie->seasons()->with('episodes')->get();
        $generos = Genero::all();
        return view('series.edit', ['serie' => $serie, 'generos' => $generos, 'seasons' => $seasons]);

    }

    public function update(Series $id, SeriesFormRequest $request)
    {

        $id->update($request->all());


        return to_route('series.index')->with('success', "Série {$id->nome} atualizada com sucesso!");
    }

    public function destroy(Series $id)
    {

        $id->delete();

        return to_route('series.index')->with('success', "Série {$id->nome} deletada com sucesso!");
    }
}
