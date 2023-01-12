<?php

use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;
use illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// abaixo vai pra página laravel inicial
//Route::get('/', function () {
//    return view('welcome');
//});

//forma antiga do redirecionamento
//Route::get('/series/lista', [SeriesController::class, 'index']); 
//Route::get('/series/criar', [SeriesController::class, 'show']);
//Route::post('/series/salvar', [SeriesController::class, 'store']);
//Route::post('/series/deletar', [SeriesController::class, 'destroy']); 

Route::get('/', function () {
    return redirect('/series');
});

Route::resource('/series', SeriesController::class)->except(['show']);

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');
//route::post('/seasons/{season}/episodes', function (\Illuminate\Http\Request $request){ dd($request->all('episodes')); });
//route::post('/seasons/{season}/episodes', function (\Illuminate\Http\Request $request){ dd($request->all()); });

//esse route acima substituiu todo esses comandos abaixo:
//Route::controller(SeriesController::class)->group(function(){
//    Route::get('/series/', 'index')->name('series.index'); 
//    Route::get('/series/criar', 'show')->name('series.create');;
//    Route::post('/series/salvar','store')->name('series.store');;
//});
//Route::delete('/series/destroy/{id}', [SeriesController::class, 'destroy'])->name('series.destroy'); 