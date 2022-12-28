<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller {
    
    public function index(Request $request)  {
        $series = Series::all();
        $mensagemSucesso = session('mensagem.sucesso');
//        $request->session()->forget('mensagem.sucesso');// se na linha do destrow usar o put teria que usar $request->session()->put('mensagem.sucesso',"Série removida com sucesso")
        
        return view('series.index')->with('series', $series)->with('mensagem.sucesso', $mensagemSucesso);
        //antigo -->return view('series.index', compact('series'));
    }
    
    public function create() {
        return view('series.create');
    }
    
    public function store(SeriesFormRequest $request){
//        dd($request->all());
        $serie = Series::create($request->all());
        $seasons = [];
        
        for ($i = 1; $i <= $request->seasonQty; $i++){
            $season [] = [
                'series_id' => $serie->id,
                'number' => $i];
        }
        Season::insert($seasons);
        
        $episodes = [];
        foreach ($serie->seasons as $season) {
            for ($j = 1; $j <= $request->episodesPerSeason; $j++){
                $episodes[] = [
                    'season_id' => $season-> id,
                    'number' => $j];
            }
        }
        Episode::insert($episodes);
        
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso!");

//        forma antiga, acima é uma forma mais limpa, dai no model serie utiliza o protected $fillable = ['nome'];
//        $nomeSerie = $request->input('nome');
//        $serie = new Serie();
//        $serie->nome = $nomeSerie;
//        $serie->save();
    }
    
    public function destroy(Series $series, Request $request){
//        dd($request);
//        Serie::destroy($request->series);
//        Serie::find($id)->delete();
        $series->delete();
        

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
//          atribuo dentro do to_route acima a mensagem abaixo do request->session->flash abaixo
//        $request->session()->flash('mensagem.sucesso', "Série '{$serie->nome}' removida com sucesso");
//        return redirect('/series/lista');;
//        return redirect()->to_route('series.index');//outra forma de direcionamento
    }
    
    public function edit(Series $series) {
//        dd($series->temporadas);    

        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request){
        $series->fill($request ->all());
        $series->save();
        
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' adicionada com sucesso!");
    }
}