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
Route::get('/', 'HomeController@index')->name('/');
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/perfil', 'AdminController@perfil')->name('admin.perfil');
Route::post('/admin/perfil/alterar', 'AdminController@alterarperfil')->name('admin.perfil.alterar');
Route::get('/admin/logout', 'AdminController@logoutadm')->name('admin.logout');

//secoes
Route::get('/secoes', 'SecaoController@secoes_listar')->name('secoes.listar');
Route::get('/secoes/adicionar', 'SecaoController@form_inserir_secao')->name('secoes.adicionar');
Route::post('/secoes/salvarsecao', 'SecaoController@salvarsecao')->name('secoes.salvar');
Route::get('/secoes/visualizar/{id}', 'SecaoController@visualizarsecao')->name('secoes.visualizar');
Route::get('/secoes/atualizar/{id}', 'SecaoController@form_atualizar_secao')->name('secoes.atualizar');
Route::post('/secoes/alterarsecao', 'SecaoController@alterarsecao')->name('secoes.alterar');
Route::get('/secoes/excluir/{id}', 'SecaoController@excluirsecao')->name('secoes.excluir');

//Notícias
Route::get('/noticias', 'SecaoController@noticia_listar')->name('noticias.listar');
Route::get('/noticias/adicionar', 'SecaoController@form_inserir_noticia')->name('noticias.adicionar');
Route::post('/noticias/salvarnoticia', 'SecaoController@salvarnoticia')->name('noticias.salvar');
Route::get('/noticias/visualizar/{id}', 'SecaoController@visualizarnoticia')->name('noticias.visualizar');
Route::get('/noticias/atualizar/{id}', 'SecaoController@form_atualizar_noticia')->name('noticias.atualizar');
Route::post('/noticias/alterarnoticia', 'SecaoController@alterarnoticia')->name('noticias.alterar');
Route::get('/noticias/excluir/{id}', 'SecaoController@excluirnoticia')->name('noticias.excluir');
Route::get('/noticias/gerenciararquivos/{id}', 'SecaoController@gerenciar_arquivos')->name('noticias.gerenciararquivos');
Route::post('/noticias/ajax.gerenciararquivos', 'SecaoController@ajax_gerenciar_arquivos')->name('noticias.ajax.gerenciararquivos');
