<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    public function index(Series $series)
    {
        $mensagemSucesso = session('mensagemSucesso');
        $seasons = $series->seasons()->with('episodes')->get();
        return view('seasons.index')->with('seasons', $seasons)
            ->with('serie', $series)->with('mensagemSucesso', $mensagemSucesso);
    }
}
