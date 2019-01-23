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

/*
*   Routes Idioma Controller
*/
Route::get('/idioma/{idioma}', 'IdiomaController@index');
Route::get('/idioma/{idioma}/agregar', 'IdiomaController@add_word');
Route::get('/idioma/{idioma}/repaso', 'IdiomaController@repaso')->name('idiomas.repaso');
Route::get('/idioma/{idioma}/buscar', 'IdiomaController@search');
Route::get('/idioma/{idioma}/pdf','IdiomaController@export_pdf');
Route::get('/interseccion','IdiomaController@intersection');
Route::get('/repetidas/{idioma}','IdiomaController@repeat_words');
Route::get('/favorita/{id}/{idioma}','IdiomaController@favorita');
Route::post('/validar/palabra','IdiomaController@validar_palabra');
Route::post('/idioma/agregar/palabra', 'IdiomaController@store')->name('idioma.store');
Route::post('/eliminar/palabra', 'IdiomaController@destroy')->name('idioma.destroy');

/*
*   Routes Categoria Controller
*/
Route::get('/categorias/{idioma}', 'CategoriaController@index');
Route::get('/idioma/{idioma}/categoria/{categoria_id}', 'CategoriaController@show');
Route::post('/categorias', 'CategoriaController@store')->name('categoria.store');
Route::post('/editar/categoria/{id}', 'CategoriaController@update')->name('categoria.update');

/*
*   Routes Recursos Controller
*/
Route::get('/recursos/{idioma}', 'RecursosController@recursos');
Route::get('/categoria/{id}/recursos/{idioma}', 'RecursosController@mostrar_recursos');
Route::post('/guardar/recurso', 'RecursosController@guardar_recurso');
