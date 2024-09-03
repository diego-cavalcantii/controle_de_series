<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;


class EpisodesController extends Controller
{

    public function index(Season $season)
    {
        $mensagemSucesso = session('mensagemSucesso');
        return view('episodes.index',['episodes' => $season->episodes, 'season' => $season, 'serie' => $season->series, 'mensagemSucesso' => $mensagemSucesso]);
    }

    public function update(Request $request, Season $season)
    {
        $watchedEpisodes = $request->episodes;
        $season->episodes->each(function (Episode $episode) use($watchedEpisodes) {
            $episode->watched = in_array($episode->id, $watchedEpisodes);
        });




        $season->push();

        return to_route('seasons.index', $season->series)->with('mensagemSucesso', 'Episódios marcados como assistidos');
    }
}
