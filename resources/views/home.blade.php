@extends('layouts.fepp')

@section('title')
	Inicio
@endsection

@section('menu1')
active
@endsection

@section('titulo')
Federacion de Empresarios Privados Potosí
@endsection

@section('icono')
fa fa-fw fa-file-pdf-o
@endsection

@section('tituloPanel')
Listar
@endsection

@section('cuerpo')
<div class="panel panel-default">
    <div class="panel-heading">
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-4">
          <img src="{{asset('img/logo_fepp.jpg')}}" alt="">
        </div>
        <div class="col-md-8">
          <b>Misión</b><br>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
          <b>Visión</b><br>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>
    </div>
</div>
@endsection
