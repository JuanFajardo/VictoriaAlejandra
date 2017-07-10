@extends('layouts.fepp')

@section('title')
Usuarios
@endsection

@section('menu7')
active
@endsection

@section('titulo')
Administracion de Usuarios
@endsection

@section('cuerpo')
<div class="container">
<div class="row">
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{url('usuarios/create')}}" class="btn  btn-info pull-right">Nuevo <i class="fa fa-plus"></i></a>
            </div>
            <div class="panel-body">
                <table id="datos" class="table datatable">
                    <thead>
                        <tr>
                            <th>Nombres y Apellidos</th>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Grupo</th>
                            <th>Estado</th>
                            <th>Ver</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->name}} </td>
                            <td>{{$usuario->username}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->grupo}}</td>
                            <td> @if ($usuario->estado)  <span class="label label-success">Activo</span> @else <span class="label label-danger">Inactivo</span> @endif</td>
                            <td><a href="{{ url('usuarios/'.$usuario->id) }}">  <i class="fa fa-eye" aria-hidden="true"></i> </a></td>
                            <td><a href="{{ url('usuarios/'.$usuario->id.'/edit') }}" style="color:#f0ad4e;"> <i class="fa fa-pencil" aria-hidden="true"></i>  </a></td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('js')
@endsection
