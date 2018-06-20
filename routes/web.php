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

Route::group(['middleware' => ['web']], function () {




Route::get('/', function () {
  if (Auth::guest())
    return view('auth.login');
  else
    return view('home');
});

Auth::routes();
/*
Route::get('login', 'Auth\\LoginController@showLoginForm');
Route::post('login', 'Auth\\LoginController@login');
Route::get('logout', 'Auth\\LoginController@logout');
*/
Route::get('logout', 'Auth\\LoginController@logout');

/*Rutas para Usuarios*/
Route::get('usuarios', 'UsuarioController@index');
Route::get('usuarios/create', 'UsuarioController@showRegistrationForm');
Route::post('usuarios', 'UsuarioController@create');
Route::get('usuarios/{id}', 'UsuarioController@viewuser');
Route::get('usuarios/{id}/edit', 'UsuarioController@edit');
Route::patch('usuarios/{id}', 'UsuarioController@update');
Route::get('usuarios/info/ver', 'UsuarioController@profile');
Route::post('usuarios/info/ver', 'UsuarioController@profileActulizar');


Route::get('Personal', 'PersonaController@angular');
Route::get('personal', 'PersonaController@index');
Route::get('personal/{id}', 'PersonaController@show');
Route::post('personal', 'PersonaController@store');
Route::put('personal/{id}', 'PersonaController@update');
Route::delete('personal/{id}', 'PersonaController@destroy');


Route::get('Registro', 'RegistroController@angular');
Route::get('RegistroRFID', 'RegistroController@angularfid');
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

Route::put('stand/{id}', 'StandController@update');
Route::get('Stand', 'StandController@angular');
Route::get('stand', 'StandController@index');
Route::get('stand/{id}', 'StandController@show');
Route::post('stand', 'StandController@store');
Route::delete('stand/{id}', 'StandController@destroy');

Route::get('Preventa', 'PreventaController@angular');
Route::put('preventa/{id}', 'PreventaController@update');
Route::get('preventas/{id}/{cantidades}', 'PreventaController@credito');
Route::get('PreventaLista', 'PreventaController@angularlistar');
Route::get('preventa', 'PreventaController@index');
Route::get('preventa/{id}', 'PreventaController@show');
Route::post('preventa', 'PreventaController@store');

Route::get('RegistroManual','RegistroManualController@angular');
Route::get('registromanual', 'RegistroManualController@index');
Route::post('registromanual', 'RegistroManualController@store');

/*
Route::get('trabajador/crear', 'TrabajadorController@create');
Route::get('Trabajador', 'TrabajadorController@angular');
Route::get('trabajador', 'TrabajadorController@index');
Route::get('trabajador/{id}', 'TrabajadorController@show');
Route::post('trabajador', 'TrabajadorController@store');
Route::put('trabajador/{id}', 'TrabajadorController@update');
Route::delete('trabajador/{id}', 'TrabajadorController@destroy');
*/
Route::get('Estadistica', 'EstadisticaController@angular');
Route::get('estadistica', 'EstadisticaController@index');
Route::get('estadistica/{id}', 'EstadisticaController@show');
Route::get('estadisticaDona/{inicio}/{fin}/{horario}/{persona}', 'EstadisticaController@dona');

Route::get('Reporte', 'ReporteController@angular');
Route::get('reporte', 'ReporteController@index');
Route::post('reporte', 'ReporteController@store');


Route::get('Cargo', 'CargoController@angular');
Route::get('cargo', 'CargoController@index');
Route::get('cargo/{id}', 'CargoController@show');
Route::post('cargo', 'CargoController@store');
Route::put('cargo/{id}', 'CargoController@update');
Route::delete('cargo/{id}', 'CargoController@destroy');


Route::get('Costo', 'CostoController@angular');
Route::get('costo', 'CostoController@index');
Route::get('costo/{id}', 'CostoController@show');
Route::post('costo', 'CostoController@store');
Route::put('costo/{id}', 'CostoController@update');
Route::delete('costo/{id}', 'CostoController@destroy');

Route::get('Nivel', 'NivelController@angular');
Route::get('nivel', 'NivelController@index');
Route::get('nivel/{id}', 'NivelController@show');
Route::post('nivel', 'NivelController@store');
Route::put('nivel/{id}', 'NivelController@update');
Route::delete('nivel/{id}', 'NivelController@destroy');

Route::get('Puesto', 'PuestoController@angular');
Route::get('puesto', 'PuestoController@index');
Route::get('puesto/{id}', 'PuestoController@show');
Route::post('puesto', 'PuestoController@store');
Route::put('puesto/{id}', 'PuestoController@update');
Route::delete('puesto/{id}', 'PuestoController@destroy');

Route::get('Cobro', 'CobroController@angular');
Route::get('cobro', 'CobroController@index');
Route::get('cobro/{id}', 'CobroController@show');
Route::post('cobro', 'CobroController@store');
Route::put('cobro/{id}', 'CobroController@update');
Route::delete('cobro/{id}', 'CobroController@destroy');

Route::get('Cobro/Piso/{id}', 'CobroController@piso');
Route::get('Cobro/Reserva/{id}', 'CobroController@reserva');
Route::get('Cobro/Eliminar/{id}', 'CobroController@eliminar');
Route::post('Cobro/Vender', 'CobroController@vender');
Route::get('Cobro/Reporte/{id}', 'CobroController@reporte');


Route::get('Log', 'LogController@angular');
Route::get('log', 'LogController@index');
Route::get('log/{id}', 'LogController@show');
Route::post('log', 'LogController@store');
Route::put('log/{id}', 'LogController@update');
Route::delete('log/{id}', 'LogController@destroy');

});
