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
					<select class="form-control selectpicker" data-live-search="true" name="horario" id="horario">
						@foreach($horarios as $horario)
							<option value="{{$horario->id}}">{{$horario->horario}}</option>
						@endforeach
					</select>
        </div>
        <div class="col-md-4">
          <label> Stand </label>
					<select class="form-control selectpicker" data-live-search="true" name="stand" id="stand">
						@foreach($stands as $stand)
            	<option  value="{{$stand->id}}">{{$stand->descripcion}}</option>
						@endforeach
					</select>
        </div>
        <div class="col-md-4">
          <label> Persona </label>
					<select class="form-control selectpicker" data-live-search="true" name="persona" id="persona">
						@foreach($personas as $persona)
            	<option  value="{{$persona->id}}">{{$persona->nombres}}</option>
						@endforeach
					</select>

        </div>
      </div>

      <br><br>
      <div class="row">
        <div class="col-md-4">
					<button type="submit" name="button" class="btn btn-primary">
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
	$.datepicker.regional['es'] = {
     closeText: 'Cerrar',
     prevText: '< Ant',
     nextText: 'Sig >',
     currentText: 'Hoy',
     monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
     dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
     weekHeader: 'Sm',
     dateFormat: 'dd/mm/yy',
     firstDay: 1,
     isRTL: false,
     showMonthAfterYear: false,
     yearSuffix: ''
   };
  $.datepicker.setDefaults($.datepicker.regional['es']);

	$( "#fecha_inicio" ).datepicker({ dateFormat: 'yy-mm-dd' });
	$( "#fecha_fin" ).datepicker({ dateFormat: 'yy-mm-dd' });
});
</script>
@endsection
