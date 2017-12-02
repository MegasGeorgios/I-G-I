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

Route::get('/home', function () {
    return view('home');
});

Route::resource('/italiano', 'ItalianController');

Route::resource('/griego', 'GriegoController');

Route::resource('/ingles', 'InglesController');

Route::resource('/categoria', 'CategoriaController');

Route::resource('/cuestionario', 'CuestionarioController');

Route::get('/repasoitaliano', 'ItalianController@repaso');

Route::get('/repasogriego', 'GriegoController@repaso');

Route::get('/repasoingles', 'InglesController@repaso');

Route::get('/buscar_in', 'InglesController@buscar_in');

Route::get('/buscar_it', 'ItalianController@buscar_it');

Route::get('/buscar_gr', 'GriegoController@buscar_gr');
