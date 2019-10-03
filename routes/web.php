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
    return view('dashboard');
});
Route::get('/landingpage', function () {
    return view('landingpage');
});

Auth::routes();

Route::resource('produtos','ProdutoController')->middleware('auth');
Route::get('categorias','CategoriaController@index')->middleware('auth');

//API
Route::get('api/produtos','ProdutoController@all');
Route::post('api/import','ProdutoController@import');
Route::get('api/categorias','CategoriaController@all');

Route::get('/home', 'HomeController@index')->name('home');
