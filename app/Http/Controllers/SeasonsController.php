<?php

namespace App\Http\Controllers;

use App\Models\Series; 

class SeasonsController extends Controller {
    public function index(Series $series){
        $seasons = $series->seasons()->with('episodes')->get(); //->with('episodes')->get();
            //dd(view('seasons.index')->with('seasons', $seasons)->with('series', $series));
        return view('seasons.index')->with('seasons', $seasons)->with('series', $series);
    }
}