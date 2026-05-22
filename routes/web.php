<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/crud/adicionar', [
    'as' => 'admin.crud.adicionar',
    'uses' => 'App\Http\Controllers\Admin\CursoController@adicionar'
]);

Route::post('/admin/crud/salvar', [
    'as' => 'admin.crud.salvar',
    'uses' => 'App\Http\Controllers\Admin\CursoController@salvar'
]);

Route::get('/admin/crud/editar/{id}', [
    'as' => 'admin.crud.editar',
    'uses' => 'App\Http\Controllers\Admin\CursoController@editar'
]);

Route::get('/admin/crud/excluir/{id}', [
    'as' => 'admin.crud.excluir',
    'uses' => 'App\Http\Controllers\Admin\CursoController@excluir'
]);