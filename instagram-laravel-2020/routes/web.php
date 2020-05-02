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

//Rota para criar um novo post;
Route::post('p', 'PostController@create');

//Rota um unico perfil do usuário;
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');

