@extends('layouts.fepp')

@section('title')
Stands
@endsection

@section('menu8')
active
@endsection

@section('titulo')
Stand
@endsection


@section('icono')
glyphicon glyphicon-list-alt
@endsection

@section('tituloPanel')
Lista de Stands
@endsection

@section('cuerpo')

<div class="panel panel-default">
    <div class="panel-heading">

      <div class="row">
        <div class="col-md-6">
          <h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> Nuevo Stand </h3>
        </div>
      </div>

    </div>
    <div class="panel-body">
      <form autocomplete="off" action="{{asset('index.php/stand')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-4">
                    <label>Nombre de la Empresa</label>
                    <input type="text" class="form-control"  placeholder="Nombre de la empresa "   id="nom_empresa" name="nom_empresa" required>
                  </div>
                  <div class="col-md-4">
                    <label>Direccion</label>
                    <input type="text" class="form-control"  placeholder="Direccion de la empresa"  id="direccion" name="direccion" required>
                  </div>
                  <div class="col-md-4">
                    <label>Telefono</label>
                    <input type="text" class="form-control"  value="0" placeholder="Telefono"  id="telefono" name="telefono" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label>Descripcion</label>
                    <textarea class="form-control" placeholder="Descripcion de la empresa"  id="descripcion" name="descripcion" rows="8" cols="80"></textarea>
                  </div>
                  <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-12">
                        <label>Encargado de la empresa</label>
                        <input type="text" class="form-control" placeholder="Nombre del encargado"  id="encargado" name="encargado" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <label>Cantidad de personal</label>
                          <input type="text" class="form-control" placeholder="Cantidad del personal"  id="cant_personal" name="cant_personal" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Logotipo de la empresa</label>
                          <input type="file" class="form-control" ng-model="Stand.logo" fileread="Stand.logo" spinner-on-load name="logo" id="logo" accept="image/jpeg|image/png">
                        </div>
                      </div>
                      <div class="row">
                        <div   class="col-md-12">
                          <img src="" id="preview" class="img-responsive" style="display:none;" >
                        </div>
                      </div>
                  </div>
                </div>

                <div class="row" style="margin-top:15px;">
                  <div class="col-md-3">
                    <button type="submit" name="button" class="btn btn-primary" >
                      <i class="fa fa-pencil" aria-hidden="true"></i> Insertar
                    </button>
                  </div>

                  <div class="col-md-3">
                    <a href="../../index.php/Stand#/lista" class="btn btn-info pull-right"> <i class="fa fa-times-circle" aria-hidden="true"></i> Cancelar</a>
                  </div>
                </div>
              </form>

    </div>
</div>

@endsection
