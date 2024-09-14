<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Series;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Genero;
use function PHPUnit\Framework\isEmpty;

class SeriesController extends Controller
{

    public function index()
    {

        $series = Series::with(['generos'])->get();
//        dd($series);
        $mensagemSucesso = session('success');


        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso); # Retornando a view listar-series

    }

    public function filter(Request $request)
    {

        $query = Series::query();
        $mensagemSucesso = session('mensagemSucesso');

        if($request->filled('genero')){
            $query->where('genero_id', $request->genero);
        }
        if($request->filled('avaliacao')){
            $query->where('avaliacao', $request->avaliacao);
        }
        if($request->filled('assistido')){
            $query->where('assistido', $request->assistido);
        }

        $series = $query->get();

        return view('series.index', ['series' => $series])->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        $generos = Genero::all();
        return view('series.create', ['generos' => $generos]);
    }


    public function store(SeriesFormRequest $request)
    {


        if (!$request->has('assistido')) {
            $request->merge(['assistido' => 'Não Assistido']);
        }
        if(!$request->has('avaliacao')){
            $request->merge(['avaliacao' => 'Sem Avaliação']);
        }
        $request->merge(['nome' => ucwords($request->nome)]);

        $serieJaExistente = Series::where('nome', $request->nome)->where('genero_id', $request->genero_id)->where('poster', $request->poster)->where('avaliacao', $request->avaliacao)->exists();

        if($serieJaExistente){
            return back()->withErrors('Série já cadastrada!');
        }

        $serie = Series::create($request->all());

        return to_route('series.index')->with('success', "Série {$serie->nome} criada com sucesso!");
    }

    public function edit(Series $series)
    {

        $generos = Genero::all();
        return view('series.edit', ['serie' => $series, 'generos' => $generos]);

    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        if (!$request->has('assistido')) {
            $request->merge(['assistido' => 'Não Assistido']);
        }

        $series->update($request->all());

        return to_route('series.index')->with('success', "Série {$series->nome} atualizada com sucesso!");
    }

    public function destroy(Series $series)
    {

        $series->delete();

        return to_route('series.index')->with('success', "Série {$series->nome} deletada com sucesso!");
    }
}
