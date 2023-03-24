<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';//pasta pra onde foram os routes

// abaixo vai pra página laravel inicial
//Route::get('/', function () {
//    return view('welcome');
//});

//forma antiga do redirecionamento
//Route::get('/series/lista', [SeriesController::class, 'index']);
//Route::get('/series/criar', [SeriesController::class, 'show']);
//Route::post('/series/salvar', [SeriesController::class, 'store']);
//Route::post('/series/deletar', [SeriesController::class, 'destroy']);
