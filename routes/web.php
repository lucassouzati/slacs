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
Route::group(['prefix' => 'licitacoes/{licitacao_id}'], function(){
	Route::resource('item-licitacao', 'ItemLicitacaoController');

	});



Route::group(['prefix' => 'contratos/{contrato_id}'], function(){
	Route::resource('item-contrato', 'ItemContratoController');

});

Route::get('contratos/importar', 'ContratosController@formImportar')->name('contratos.formImportar');
Route::post('contratos/importar', 'ContratosController@importar')->name('contratos.importar');
Route::resource('contratos', 'ContratosController');

// Route::resource('cidadao', 'CidadaoController');

Route::group(['prefix' => 'consulta'], function(){
	Route::get('licitacoes', 'CidadaoController@consultaLicitacoes')->name('cidadao.consulta-licitacoes');
	Route::get('contratos', 'CidadaoController@consultaContratos')->name('cidadao.consulta-contratos');
});