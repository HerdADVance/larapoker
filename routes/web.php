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

Route::get('/games/create', 'GamesController@create');
Route::get('/games/{game}', 'GamesController@show');
Route::get('/games/edit/{game}', 'GamesController@edit');
Route::put('/games/{game}', 'GamesController@update');