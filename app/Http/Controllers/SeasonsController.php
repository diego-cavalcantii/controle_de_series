<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    public function index(Serie $series)
    {
        $serie = $series;
        $seasons = $series->seasons;
        return view('seasons.index')->with('seasons', $seasons)
            ->with('serie', $serie);
    }
}
