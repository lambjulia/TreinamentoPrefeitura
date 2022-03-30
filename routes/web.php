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

use Illuminate\Database\Eloquent\Collection;

Route::get('/', 'HomeController@index')->middleware('auth');

Route::get('/cadastro', 'PessoaController@cadastro')->name('cadastro')->middleware('auth');

Route::post('/store', 'PessoaController@store')->name('store')->middleware('auth');

Route::get('/tabela', 'PessoaController@index')->name('tabela')->middleware('auth');

Route::get('/cadastro/ver/{id}', 'PessoaController@show')->name('show')->middleware('auth');

Route::get('/cadastro/edit/{id}', 'PessoaController@edit')->name('edit')->middleware('auth');

Route::post('/cadastro/{id}', 'PessoaController@update')->name('alterar_cadastro')->middleware('auth');

Route::delete('/delete/{id}',  'PessoaController@delete')->middleware('auth');

Route::get('/search', 'PessoaController@search')->middleware('auth');

Route::get('/cadastroprotocolo', 'ProtocoloController@cadastro')->name('cadastroprotocolo')->middleware('auth');

Route::post('/saveprot', 'ProtocoloController@store')->name('saveprot')->middleware('auth'); 

Route::get('/tabelaprotocolo', 'ProtocoloController@index')->name('tabelaprotocolo')->middleware('auth'); 

Route::get('/cadastroprotocolo/ver/{numeroprot}', 'ProtocoloController@show')->name('showprot')->middleware('auth');

Route::get('/cadastroprotocolo/edit/{numeroprot}', 'ProtocoloController@edit')->name('editprot')->middleware('auth');

Route::post('/cadastroprotocolo/{numeroprot}', 'ProtocoloController@update')->name('alterar_protocolo')->middleware('auth');

Route::delete('/deleteprot/{numeroprot}',  'ProtocoloController@delete')->middleware('auth');

Route::get('/searchprot', 'ProtocoloController@searchprot')->middleware('auth');

Route::get('/pdf/{numeroprot}', 'ProtocoloController@generatePDF');




Auth::routes();


