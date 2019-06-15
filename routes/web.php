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

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('principal',function(){
	return redirect()->route('categorias.index');
});

Route::resource('categorias','CategoriaController',['except' => ['create','show','edit','destroy']]);
Route::resource('articulos','ArticuloController',['except' => ['create','show','edit','destroy']]);
Route::put('articulo/desactivar/{id}','ArticuloController@desactivar');
Route::put('articulo/activar/{id}','ArticuloController@activar');
