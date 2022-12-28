<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;

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
//esse route acima substituiu todo esses comandos abaixo:
//Route::controller(SeriesController::class)->group(function(){
//    Route::get('/series/', 'index')->name('series.index'); 
//    Route::get('/series/criar', 'show')->name('series.create');;
//    Route::post('/series/salvar','store')->name('series.store');;
//});
//Route::delete('/series/destroy/{id}', [SeriesController::class, 'destroy'])->name('series.destroy'); 

Route::get('/series/{series)/seasons', [SeasonsController::class, 'index'])->name('seasons.index');
