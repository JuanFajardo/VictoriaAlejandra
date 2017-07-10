@extends('layouts.fepp')

@section('title')
Usuario Ver
@endsection

@section('menu7')
active
@endsection

@section('titulo')
Ve de Usuario
@endsection

@section('cuerpo')
<div class="container">
  <div class="row">
      <div class="col-md-10">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title"><strong>Editar  usuario</strong> </h3>
              </div>
              <div class="panel-body">
                {!! Form::model($user, [ 'id'=>'form-create', 'class'=>'form-horizontal', 'role'=>'form' ])!!}
                <h4>Datos de usuario</h4>
                <hr>
                <div class="form-group">
                    <label for="grupo" class="col-md-4 control-label">Grupo</label>
                    <div class="col-md-6">
                      {!! Form::select('grupo', ['Administrador'=>'Administrador', 'Contador'=>'Contador', 'Reportes'=>'Reportes'], null, ['id'=>'grupo ', 'class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="username" class="col-md-4 control-label">Usuario</label>
                    <div class="col-md-6">
                        {!! Form::text('username',  old('name'), ['id'=>'username', 'class'=>'form-control', 'placeholder'=>'nombre y apellidos']) !!}
                        @if ($errors->has('username'))
                            <span class="help-block">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Contraseña</label>
                    <div class="col-md-6">
                        {!! Form::password('password', ['id'=>'password', 'class'=>'form-control', 'placeholder'=>'Clave s3cr3t4']) !!}
                        @if ($errors->has('password'))
                            <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>

                <h4>Datos de personales</h4>
                <hr>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="nombres" class="col-md-4 control-label">Nombres</label>
                    <div class="col-md-6">
                        {!! Form::text('name',  old('nombres'), ['id'=>'name', 'class'=>'form-control', 'placeholder'=>'Ingrese sus nombres']) !!}
                        @if ($errors->has('nombres'))
                            <span class="help-block">{{ $errors->first('nombres') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Correo electrónico</label>
                    <div class="col-md-6">
                        {!! Form::email('email',  old('email'), ['id'=>'email', 'class'=>'form-control', 'placeholder'=>'correo@correo.com']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                    <label for="estado" class="col-md-4 control-label">Estado</label>
                    <div class="col-md-6">
                        {!! Form::checkbox('estado', 'on', true, ['id'=>'estado', 'class'=>'form-control']) !!}
                    </div>
                </div>
                  <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                          <a href="{{asset('/usuarios')}}" class="btn btn-primary">
                            <i class="fa fa-btn fa-times-circle"></i> Cancelar</a>
                      </div>
                  </div>
          {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
