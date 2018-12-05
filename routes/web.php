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
Route::get('/servicos/create','ServicoController@create');
Route::post('/servicos','ServicoController@store');

Route::get('/atendimentos/{id}/edit', 'AtendimentoController@edit');
Route::get('/servicos/{id}/edit', 'ServicoController@edit');

Route::get('/atendimentos/{id}/delete', 'AtendimentoController@delete');
Route::get('/servicos/{id}/delete', 'ServicoController@delete');