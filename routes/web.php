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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');//Criado apenas para redirecionar a home com "/" ou "/home"

Route::group(['prefix' => 'link'], function () {
    Route::post('/store', 'SistemaController@store')->name('link.store');
    Route::get('/{id}/edit', 'SistemaController@edit')->name('link.edit');
    Route::post('/{id}', 'SistemaController@update')->name('link.update');
    Route::get('/{link}/delete', 'SistemaController@delete')->name('link.delete');
    Route::get('/search', 'SistemaController@search');
});

Route::get('/notes', 'NoteController@index')->name('note');

Route::group(['prefix' => 'notes'], function () {
    Route::get('/create', 'NoteController@create')->name('note.create');
    Route::post('/store', 'NoteController@store')->name('note.store');
    Route::get('/{id}/edit', 'NoteController@edit')->name('note.edit');
    Route::post('/{id}', 'NoteController@update')->name('note.update');
    Route::get('/{note}/delete', 'NoteController@delete')->name('note.delete');
});
