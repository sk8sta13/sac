<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'sac.home', 'uses' => 'SacController@index']);
Route::post('/enviar', ['as' => 'sac.send', 'uses' => 'SacController@send']);
Route::get('/getCliente', ['as' => 'cliente.show', 'uses' => 'ClienteController@show']);
Route::get('/cliente/create', ['as' => 'cliente.create', 'uses' => 'ClienteController@create']);
Route::post('/cliente', ['as' => 'cliente.store', 'uses' => 'ClienteController@store']);
Route::get('/getPedido', ['as' => 'pedido.exists', 'uses' => 'PedidoController@exists']);
Route::get('/report', ['as' => 'chamado.report', 'uses' => 'SacController@report']);
Route::get('/exportar', ['as' => 'chamado.export', 'uses' => 'SacController@export']);
