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


Route::get('colaboradores/create', 'ColaboradoresController@create')->name('colaboradores.create');
Route::post('colaboradores', 'ColaboradoresController@store')->name('colaboradores.store');


Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::group(['middleware' => 'can:isAdmin'], function() {
		Route::resource('colaboradores', 'ColaboradoresController', ['except' => ['create', 'store']]);
		Route::get('colaboradores/{id}/mudastatus/{ativo}', 'ColaboradoresController@mudaStatus')->name('colaboradores.mudaStatus');
		Route::get('colaboradores/{id}/aprovacaodocadastro/{aprovacao_cadastro}', 'ColaboradoresController@aprovacaoCadastro')->name('colaboradores.aprovacao_cadastro');
	});
	

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
});

Auth::routes();



Route::group(['prefix' => 'consulta'], function(){
	Route::get('licitacoes', 'CidadaoController@consultaLicitacoes')->name('cidadao.consulta-licitacoes');
	Route::get('contratos', 'CidadaoController@consultaContratos')->name('cidadao.consulta-contratos');
	Route::get('estatisticas', 'CidadaoController@consultaEstatisticas')->name('cidadao.consulta-estatisticas');

	Route::get('licitacoes/{id}', 'CidadaoController@mostraLicitacao')->name('cidadao.mostra-licitacao');
	Route::get('contratos/{id}', 'CidadaoController@mostraContrato')->name('cidadao.mostra-contrato');
});





// Route::get('cidadao/login', 'CidadaoController@formLogin')->name('cidadao.formLogin');
Route::group(['namespace' => 'Cidadao', 'prefix' => 'cidadao'], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login')->name('cidadao.login');
    Route::post('logout', 'Auth\LoginController@logout')->name('cidadao.logout');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('cidadao.formRegister');
    Route::post('register', 'Auth\RegisterController@register')->name('cidadao.register');
    Route::get('home', 'HomeController@index')->name('cidadao.home');


});

Route::resource('cidadao', 'CidadaoController');