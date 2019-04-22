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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function(){ });

Route::group(['prefix' => '/v1','middleware' => 'cors'], function() { 
    //Route::apiResource('/consultas', 'ConsultaController');

    Route::apiResource('/imoveis', 'ImovelController');

    Route::apiResource('/bairros', 'VizinhancaController');

    Route::apiResource('/estados', 'EstadoController', ['except' => ['show']]);    
    Route::apiResource('estados.cidades', 'CidadeController', ['only' => 'index']);

    Route::apiResource('/cidades', 'CidadeController');
    Route::apiResource('cidades.bairros', 'VizinhancaController', ['only' => 'index']);

    Route::apiResource('/consultas', 'ConsultaController');

    Route::apiResource('/tipos', 'TipoController');
});