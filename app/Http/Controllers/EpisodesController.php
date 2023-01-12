<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use illuminate\Http\Request;

class EpisodesController {
    public function index(Season $season) {
        return view('episodes.index', ['episodes' => $season->episodes]);
    }

    public function update(Request $request, Season $season) {
        dd($uri = $request->method());
//dd($uri = $request->all('episode'));

        $watchedEpisodes = $request->episodes;
        $season->episodes->each(function (Episode $episode) use ($watchedEpisodes) {
            $episode->whatched = in_array($episode->id, $watchedEpisodes);
        });
        $season->push();//salva as alterações da model atual e seus relacionamentos

    return to_route('episodes.index', $season->id)->with('mensagem.sucesso', 'Episódios marcados como assistidos');    }
}