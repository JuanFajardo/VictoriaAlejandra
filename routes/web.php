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
    return view('layouts.fepp');
});



Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('Personal', 'PersonaController@angular');
Route::get('personal', 'PersonaController@index');
Route::get('personal/{id}', 'PersonaController@show');
Route::post('personal', 'PersonaController@store');
Route::put('personal', 'PersonaController@update');
Route::delete('personal/{id}', 'PersonaController@destroy');



Route::get('Registro', 'RegistroController@angular');
Route::get('registro', 'RegistroController@index');
Route::get('registro/{id}', 'RegistroController@show');
Route::get('registroPersona/{id}', 'RegistroController@showPersona');
Route::get('registroTarjeta/{id}', 'RegistroController@showTarjeta');
Route::post('registro', 'RegistroController@store');
Route::put('registro', 'RegistroController@update');
Route::delete('registro/{id}', 'RegistroController@destroy');



Route::get('Horario', 'HorarioController@angular');
Route::get('horario', 'HorarioController@index');
Route::get('horario/{id}', 'HorarioController@show');
Route::post('horario', 'HorarioController@store');
Route::put('horario/{id}', 'HorarioController@update');
Route::delete('horario/{id}', 'HorarioController@destroy');


Route::get('Cargo', 'CargoController@angular');
Route::get('cargo', 'CargoController@index');
Route::get('cargo/{id}', 'CargoController@show');
Route::post('cargo', 'CargoController@store');
Route::put('cargo/{id}', 'CargoController@update');
Route::delete('cargo/{id}', 'CargoController@destroy');


Route::get('Stand', 'StandController@angular');
Route::get('stand', 'StandController@index');
Route::get('stand/{id}', 'StandController@show');
Route::post('stand', 'StandController@store');
Route::put('stand/{id}', 'StandController@update');
Route::delete('stand/{id}', 'StandController@destroy');



Route::get('Trabajador', 'TrabajadorController@angular');
Route::get('trabajador', 'TrabajadorController@index');
Route::get('trabajador/crear', 'TrabajadorController@create');
Route::get('trabajador/{id}', 'TrabajadorController@show');
Route::post('trabajador', 'TrabajadorController@store');
Route::put('trabajador/{id}', 'TrabajadorController@update');
Route::delete('trabajador/{id}', 'TrabajadorController@destroy');
