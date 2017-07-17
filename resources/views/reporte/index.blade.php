@extends('layouts.fepp')

@section('title')
	Reportes
@endsection

@section('menu5')
active
@endsection

@section('titulo')
Reportes
@endsection


@section('icono')
fa fa-fw fa-file-pdf-o
@endsection

@section('tituloPanel')
Listar
@endsection

@section('cuerpo')
<!--<div ng-view></div> -->


<div class="panel panel-default">
    <div class="panel-heading">
    </div>
    <div class="panel-body">
      <form action="{{asset('index.php/reporte')}}" method="post" autocomplete="off">
				  {{ csrf_field() }}
      <div class="row">
        <div class="col-md-6">
          <label> Fecha Inicio</label>
          <input type="text"  class="form-control" name="fecha_inicio" id="fecha_inicio" required>
        </div>
        <div class="col-md-6">
          <label> Fecha Fin</label>
          <input type="text"  class="form-control" name="fecha_fin" id="fecha_fin" required>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <label> Horario </label>
          <input type="text" class="form-control" name="horario" id="horario" list="horario-lista">
          <datalist id="horario-lista">
						@foreach($horarios as $horario)
            	<option   value="{{$horario->id}} {{$horario->horario}}">
						@endforeach
          </datalist>
        </div>
        <div class="col-md-4">
          <label> Stand </label>
          <input type="text" class="form-control" name="stand" id="stand" list="stand-lista">
          <datalist id="stand-lista">
						@foreach($stands as $stand)
            	<option  value="{{$stand->id}} {{$stand->descripcion}}">
						@endforeach
          </datalist>
        </div>
        <div class="col-md-4">
          <label> Persona </label>
          <input type="text" class="form-control" name="persona" id="persona" list="persona-lista">
          <datalist id="persona-lista">
						@foreach($personas as $persona)
            	<option  value="{{$persona->id}} {{$persona->nombres}}">
						@endforeach
          </datalist>
        </div>
      </div>

      <br><br>
      <div class="row">
        <div class="col-md-4">
					<button type="submit" name="button">
						Generar Reporte  PDF <i class="fa fa-fw fa-file-pdf-o"></i>
					</button>
        </div>
        <div class="col-md-4">
          <a class="btn btn-success pull-right" >Generar Reporte XLS <i class="fa fa-fw fa-file-excel-o"></i></a>
        </div>
      </div>
    </form>
    </div>
</div>
<script type="text/javascript">
$( function() {
	$( "#fecha_inicio" ).datepicker();
		$( "#fecha_fin" ).datepicker();
});
</script>
@endsection
