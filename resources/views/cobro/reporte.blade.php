@extends('layouts.venta')

@section('1') btn btn-default @endsection
@section('2') btn btn-default @endsection
@section('3') btn btn-default @endsection
@section('4') btn btn-default @endsection
@section('5') btn btn-default @endsection

@section('cuerpo')
<div class="row">
  <div class="col-md-3">
    <select class="form-control" name="usuario" id="usuario">
      <option value=""></option>
      @foreach($usuarios as $usuario)
        <option value="{{$usuario->id}}"> {{$usuario->username}} </option>
      @endforeach
    </select>
  </div>
  <div class="col-md-3">
    <select class="form-control" name="stand" id="stand">
      <option value=""></option>
      @foreach($stands as $stand)
        <option value="{{$stand->id}}"> {{$stand->nom_empresa}} </option>
      @endforeach
    </select>
  </div>
  <div class="col-md-2">
    <input type="date" name="fecha_inicio" value="">
  </div>
  <div class="col-md-2">
    <input type="date" name="fecha_inicio" value="">
  </div>

  <div class="col-md-2">
    <button type="button" name="button" class="btn btn-primary"> Ejecutar </button>
  </div>

</div>
<div class="row">
  <div class="col-md-12">
    <table class="table table-striped" border='0' width="100%">
      <thead>
        <tr>
          <td rowspan="2"> <img src="{{asset('img/logo_fepp.jpg')}}" width="150" /> </td>
          <th colspan="5"> <h1>Federacion de Empresarios Privados Potosí</h1> </th>
        </tr>
        <tr>
          <th colspan="7"> <h1>FEIPOBOL {{date('Y')}}</h1> </th>
        </tr>
        <tr>
          <th> Fecha y Hora </th> <th> Nombre del Puesto</th> <th> Empresa</th> <th> Encargado</th> <th> Dimension</th>
          <th> Nro Venta </th> <th> Monto Unidad</th> <th> Monto Total</th>  <th> Usuario </th> <th> Eliminar </th>
        </tr>
      </thead>
      <tbody>
        <?php $alto = $ancho = $suma = $img = 0; ?>
        @foreach($datos as $dato)
        <?php
          $metros = explode(" x ", $dato->dimension);
          $alto  = $alto  + $metros[0];
          $ancho = $ancho + $metros[1];
          $suma  = $suma  + $dato->monto;
          //$img = $f[9];
        ?><tr>
            <td>{{$dato->created_at}}</td>
            <td>Puesto {{$dato->puestoId}}</td>
            <td>{{$dato->empresa}}</td>
            <td>{{$dato->encargado}}</td>
            <td>{{$dato->dimension}}</td>
            <td>{{$dato->nro_venta}}</td>
            <td>{{$dato->precio}}</td>
            <td>{{$dato->monto}}</td>
            <td>{{$dato->username}}</td>
            <td> <a href="{{asset('index.php/Cobro/EliminarVenta/'.$dato->nro_venta)}}"> <i class="fa fa-trash">Elimnar</i> </a></td>
          </tr>
        @endforeach
        <tr> <td colspan='4'>&nbsp;</td> <td> <b>{{$alto}}x{{$ancho}} m.<b/> </td> <td><b>{{$suma}}<b/></td> </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
