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
Route::get('/captura-artigo', 'CapturaArtigoController@init')->name('captura_artigo');
Route::get('/artigo', 'ArtigoController@index')->name('artigo');
Route::post('/artigo/post', 'ArtigoController@saveArtigo')->name('artigo-post');
Route::post('/artigo/delete/{id_artigo}', 'ArtigoController@destroy')->name('artigo-del');
