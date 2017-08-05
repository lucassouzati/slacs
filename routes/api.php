<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('entes', 'CidadaoController@apiEntes')->name('cidadao.api-entes');

Route::get('licitacoes', 'CidadaoController@apiLicitacoes')->name('cidadao.api-licitacoes');
Route::get('contratos', 'CidadaoController@apiContratos')->name('cidadao.api-contratos');

Route::get('licitacoes/{id}/itens', 'CidadaoController@apiItensDaLicitacao')->name('cidadao.api-itens_licitacao');
Route::get('contratos/{id}/itens', 'CidadaoController@apiItensDoContrato')->name('cidadao.api-itens_contrato');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


