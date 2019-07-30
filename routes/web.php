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


Route::get('/empresas', [
    'uses' => 'Bludata\EmpresaController@index',
    'as' => 'empresa.index'
]);

Route::get('/empresas/novo', [
    'uses' => 'Bludata\EmpresaController@create',
    'as' => 'empresa.create'
]);

Route::post('/empresas/novo/salvar', [
    'uses' => 'Bludata\EmpresaController@store',
    'as' => 'empresa.store'
]);

Route::get('/empresas/{id}/editar', [
    'uses' => 'Bludata\EmpresaController@edit',
    'as' => 'empresa.edit'
]);

Route::post('/empresas/{id}/update', [
    'uses' => 'Bludata\EmpresaController@update',
    'as' => 'empresa.update'
]);

Route::get('/empresas/{id}/deletar', [
    'uses' => 'Bludata\EmpresaController@destroy',
    'as' => 'empresa.destroy'
]);





Route::get('/fornecedores', [
    'uses' => 'Bludata\FornecedorController@index',
    'as' => 'fornecedor.index'
]);

Route::get('/fornecedores/novo', [
    'uses' => 'Bludata\FornecedorController@create',
    'as' => 'fornecedor.create'
]);

Route::post('/fornecedores/novo/salvar', [
    'uses' => 'Bludata\FornecedorController@store',
    'as' => 'fornecedor.store'
]);

Route::get('/fornecedores/{id}/edit', [
    'uses' => 'Bludata\FornecedorController@edit',
    'as' => 'fornecedor.edit'
]);

Route::post('/fornecedores/{id}/update', [
    'uses' => 'Bludata\FornecedorController@update',
    'as' => 'fornecedor.update'
]);

Route::get('/fornecedores/{id}/delete', [
    'uses' => 'Bludata\FornecedorController@destroy',
    'as' => 'fornecedor.destroy'
]);

Route::get('/fornecedores/search', [
    'uses' => 'Bludata\FornecedorController@busca',
    'as' => 'fornecedor.busca'
]);