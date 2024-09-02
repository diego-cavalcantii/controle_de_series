<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerosFormRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Series;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Genero;
use function GuzzleHttp\json_decode;

class GenerosController extends Controller
{

    public function index()
    {
        $generos = Genero::all();
        return view('generos.index', ['generos' => $generos]);
    }

    public function show(Request $request)
    {
        if ($request->genero) {
            $generoEscolhido = Genero::find($request->genero);
            $serieGenero = Series::where('genero_id', $generoEscolhido->id)->get();
            return view('series.index', ['genero' => $generoEscolhido, 'series' => $serieGenero]);
        }else {
            $series = Series::all();
            return view('series.index', ['series' => $series]);
        }
    }


    public function create()
    {
        $mensagemSucesso = session('success');
        return view('generos.create')->with('mensagemSucesso', $mensagemSucesso);
    }

    public function store(GenerosFormRequest $request)
    {
        $genero = ucwords($request->nome_genero);
        $generoExistente = Genero::where('nome_genero', $genero)->first();
        if ($generoExistente) {
            return redirect()->back()->withErrors(['genero' => 'Esse gênero já existe no banco de dados.'])->withInput();
        }
        Genero::create($request->all());
        return redirect()->back()->with('success', "genero criada com sucesso!");
    }

    public function edit(string $id)
    {
        $genero = Genero::findOrFail($id);
        return view('generos.edit', ['genero' => $genero]);
    }

    public function update(GenerosFormRequest $request, string $id)
    {
        $genero = Genero::findOrFail($id);
        $genero->nome_genero = ucwords($request->nome_genero);
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
