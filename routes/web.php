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
Auth::routes(['register' => false]);

/*Rotas Socios */
Route::get('/socio/create', 'Admin\SocioController@create')->name('socio.create');
Route::post('/socio', 'Admin\SocioController@store')->name('socio.store');
/*Fim */

/*Rotas vale socios */
Route::get('/valesocio/create', 'Admin\ValeSocioController@create')->name('valesocio.create');
Route::post('/valesocio', 'Admin\ValeSocioController@store')->name('valesocio.store');
Route::put('/valesocio', 'Admin\ValeSocioController@update')->name('valesocio.update');
Route::get('/valesocio', 'Admin\ValeSocioController@index')->name('valesocio.index');
Route::get('/valesocio/{id}/edit', 'Admin\ValeSocioController@edit')->name('valesocio.edit');
/*Fim Rotas vale socios */

/* Rotas Pagamentos e Vales */

Route::get('/vale/create', 'Admin\ValeController@create')->name('vale.create');
Route::get('/vale/{id}/edit', 'Admin\ValeController@edit')->name('vale.edit');
Route::get('/vale', 'Admin\ValeController@index')->name('vale.index');
Route::post('/vale', 'Admin\ValeController@store')->name('vale.store');
Route::put('/vale', 'Admin\ValeController@update')->name('vale.update');

/*Fim Pagamentos e Vales */

/*Rotas graficos */
Route::get('/graficos/anual', 'Admin\GraficoController@anual')->name('grafico.anual');
Route::get('/graficos/home/12dias', 'Admin\GraficoController@xdias' )->name('graficos.home.12');

/*Fim rotas graficos */

/* Rotas Funcionário */
Route::get('/funcionarios/create', 'admin\FuncionarioController@create')->name('funcionarios.create');
Route::post('/funcionarios', 'admin\FuncionarioController@store')->name('funcionarios.store');
Route::get('/funcionarios', 'admin\FuncionarioController@index')->name('funcionarios.index');
Route::get('/funcionarios/{id}/edit', 'admin\FuncionarioController@edit')->name('funcionarios.edit');
Route::get('/funcionarios/{id}/desativar', 'admin\FuncionarioController@desativar')->name('funcionarios.desativar');
Route::put('/funcionarios/update', 'admin\FuncionarioController@update')->name('funcionarios.update');
Route::get('/funcionarios/details/{id}', 'admin\FuncionarioController@details')->name('funcionarios.details');
/* FIM Rotas Funcionário */

/*Rotas Financeiro */
/*entrada */
Route::get('/financeiro/entrada/create', 'admin\FinanceiroEntradaController@create')->name('financeiro.entrada.create');
Route::post('/financeiro/entrada', 'admin\FinanceiroEntradaController@store')->name('financeiro.entrada.store');
Route::get('/financeiro/entrada', 'admin\FinanceiroEntradaController@index')->name('financeiro.entrada.index');
Route::get('/financeiro/entrada/{id}/edit', 'admin\FinanceiroEntradaController@edit')->name('financeiro.entrada.edit');
Route::put('/financeiro/entrada/update', 'admin\FinanceiroEntradaController@update')->name('financeiro.entrada.update');
/* fim entrada*/
/*entrada*/
Route::get('/financeiro/saida/create', 'admin\FinanceiroSaidaController@create')->name('financeiro.saida.create');
Route::post('/financeiro/saida/', 'admin\FinanceiroSaidaController@store')->name('financeiro.saida.store');
Route::get('/financeiro/saida/', 'admin\FinanceiroSaidaController@index')->name('financeiro.saida.index');
Route::get('/financeiro/saida/{id}/edit', 'admin\FinanceiroSaidaController@edit')->name('financeiro.saida.edit');
Route::put('/financeiro/saida/update', 'admin\FinanceiroSaidaController@update')->name('financeiro.saida.update');
/*fim entrada */
/* Fim rotas Financeiro */

/*Rotas Serviços */
Route::get('/servicos/create', 'admin\ServicoController@create')->name('servicos.create');
Route::get('/servicos', 'admin\ServicoController@index')->name('servicos.index');
Route::get('/servicos/{id}/edit', 'admin\ServicoController@edit')->name('servicos.edit');
Route::post('/servicos/store', 'admin\ServicoController@store')->name('servicos.store');
Route::put('/servicos/update', 'admin\ServicoController@update')->name('servicos.update');
/*FIM rota serviços */
Route::get('/home', 'admin\HomeController@index')->name('home')->middleware('auth');

Route::get('/', 'admin\HomeController@index')->name('init')->middleware('auth');




