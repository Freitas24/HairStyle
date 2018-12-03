<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/atendimentos','AtendimentoController@index');
Route::get('/atendimentos/create','AtendimentoController@create');
Route::post('/atendimentos','AtendimentoController@store');

Route::get('/servicos','ServicoController@index');
Route::get('/servicos/create','ServicosController@create');
Route::post('/servicos','ServicosController@store');