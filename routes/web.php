<?php

use Illuminate\Support\Facades\Route;

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
    return view('Principal');
});

Route::get('/home', function () {
    return view('welcome')->middleware('auth');
});

Route::resource('cliente','ClienteController')->middleware('auth');
Route::post('/cliente/buscar', 'ClienteController@indexBuscar')->name('buscar')->middleware('auth');
Route::post('/cliente/editar/actualizar', 'ClienteController@update')->middleware('auth');
Route::get('/cliente/{id}/eliminar', 'ClienteController@destroy')->middleware('auth');
Route::get('/cliente/{id}/PDF', 'ClienteController@PDF')->middleware('auth');
Route::post('/cliente/actualizar', 'ClienteController@actualizar')->middleware('auth');

Route::get('/seleccionar', 'ClienteController@seleccionar')->middleware('auth');
Route::post('/seleccionar/buscar', 'ClienteController@seleccionarBuscar')->name('buscarSel')->middleware('auth');

Route::get('/equipo', 'ClienteController@createEquipo')->name('crearEquipo')->middleware('auth');
Route::post('/equipo', 'ClienteController@selectCliente')->middleware('auth');
Route::post('/equipo/create', 'ClienteController@store2')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
