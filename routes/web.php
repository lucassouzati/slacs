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

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::resource('colaboradores', 'ColaboradoresController');
Route::get('colaboradores/{id}/mudastatus/{ativo}', 'ColaboradoresController@mudaStatus')->name('colaboradores.mudaStatus');
Route::get('colaboradores/{id}/aprovacaodocadastro/{aprovacao_cadastro}', 'ColaboradoresController@aprovacaoCadastro')->name('colaboradores.aprovacao_cadastro');





Route::resource('entes', 'EntesController');
Route::resource('licitacoes', 'LicitacoesController');