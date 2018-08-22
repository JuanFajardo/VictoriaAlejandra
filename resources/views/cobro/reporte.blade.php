@extends('layouts.venta')

@section('1') btn btn-default @endsection
@section('2') btn btn-default @endsection
@section('3') btn btn-default @endsection
@section('4') btn btn-default @endsection
@section('5') btn btn-default @endsection
@section('6') btn btn-default @endsection

@section('cuerpo')

<div id="modalAgregar" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content panel panel-primary">

      <div class="modal-header panel-heading">
        <b>Insertar nueva Empresa</b>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body panel-body">
        {!! Form::open(['accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}

        <div class="form-group">
          <label for="empresa_" >Nombre de la Empresa</label>
          {!! Form::text('empresa', null, ['class'=>'form-control', 'placeholder'=>'Empresa', 'id'=>'empresa_', 'required']) !!}
        </div>
        <div class="form-group">
          <label for="celular_" >Numero de Celular de la Empresa o  Encargado</label>
          {!! Form::text('celular', null, ['class'=>'form-control', 'placeholder'=>'Celular', 'id'=>'celular_', 'required']) !!}
        </div>
        <div class="form-group">
          <label for="direccion_" >Direccion de la Empresa</label>
          {!! Form::text('direccion', null, ['class'=>'form-control', 'placeholder'=>'Direccion', 'id'=>'direccion_', 'required']) !!}
        </div>
        <div class="form-group">
          <label for="representante_" >Represntante legal de la Empresa</label>
          {!! Form::text('representante', null, ['class'=>'form-control', 'placeholder'=>'Representante', 'id'=>'representante_', 'required']) !!}
        </div>

        {!! Form::hidden('id_usuario', '1') !!}
        {!! Form::submit('A&ntilde;adir', ['class'=>'agregar btn btn-primary']) !!}
        {!! Form::close() !!}
      </div>

    </div>
  </div>
</div>



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
            <td> <!--<a href="{{asset('index.php/Cobro/EliminarVenta/'.$dato->nro_venta)}}"> <i class="fa fa-trash">Elimnar</i> </a> -->
              <center><a href="#modalAgregar"   data-toggle="modal" data-target=""> <li class="fa fa-edit"></li> Edit </a></center>
            </td>
          </tr>
        @endforeach
        <tr> <td colspan='4'>&nbsp;</td> <td> <b>{{$alto}}x{{$ancho}} m.<b/> </td> <td><b>{{$suma}}<b/></td> </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">

$('.eliminar').click(function(event) {
  event.preventDefault();
  var fila = $(this).parents('tr');
  var id = fila.data('id');
  var form = $('#form-delete');
  var url = form.attr('action').replace(':DATO_ID',id);
  var data = form.serialize();

  if(confirm('Esta seguro de eliminar la Empresa'))
  {
    $.post(url, data, function(result, textStatus, xhr) {
      alert(result);
      fila.fadeOut();
    }).fail(function(esp){
      fila.show();
    });
  }
});
</script>
@endsection
