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


Route::get('Personal', 'PersonalController@angular');
Route::get('personal', 'PersonalController@index');
Route::get('personal/{id}', 'PersonalController@show');
Route::post('personal', 'PersonalController@store');
Route::put('personal', 'PersonalController@update');
Route::delete('personal/{id}', 'PersonalController@destroy');


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
