@extends('layouts.fepp')

@section('title')
	Estadisticas
@endsection

@section('menu6')
active
@endsection

@section('titulo')
Estadisticas
@endsection


@section('icono')
fa fa-clock-o
@endsection

@section('tituloPanel')
Datos Estadisticos
@endsection

@section('cuerpo')
<div class="panel panel-default">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-info">
					<div class="panel-heading"> Datos de consulta </div>
					<div class="panel-body">
						<form >
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
				        <div class="col-md-12">
				          <label> Horario </label>
									<select class="form-control selectpicker" data-live-search="true" name="horario" id="horario">
										@foreach($horarios as $horario)
				            	<option  value="{{$horario->id}}"> {{$horario->horario}} </option>
										@endforeach
									</select>
				        </div>

				        <div class="col-md-12">
				          <label> Stand </label>
									<select class="form-control selectpicker" data-live-search="true" name="stand" id="stand">
										@foreach($stands as $stand)
											<option  value="{{$stand->id}}"> {{$stand->nom_empresa}} </option>
										@endforeach
									</select>
				        </div>

				        <div class="col-md-12">
				          <label> Persona </label>
									<select class="form-control selectpicker" data-live-search="true" name="persona" id="persona">
										@foreach($personas as $persona)
						        	<option  value="{{$persona->id}}">{{$persona->nombres}}</option>
										@endforeach
									</select>
								</div>

								<div class="col-md-12">
								 <br/><a class="btn btn-info" id="graficar" >Generar Estadistica <i class="fa fa-fw fa-bar-chart-o"></i></a>
							 </div>
				      </div>
				    </form>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-green">
            	<div class="panel-heading"> Resumen General </div>
              <div class="panel-body">
            		<div id="morris-area-chart"></div>
              </div>
            </div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-green">
            	<div class="panel-heading"> Reporte Estadistico </div>
              <div class="panel-body" id="graficarDona">
            		<div id="morris-donut-chart"></div>
              </div>
            </div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('morris')
<script src="{{asset('assets/js/plugins/morris/raphael.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/morris/morris.min.js')}}"></script>
<script >

$('.clockpicker').clockpicker();

$(function() {
    // Area Chart
    Morris.Area({
        element: 'morris-area-chart',
        data: [
							@foreach($datos as $dato)
									{
										period: '{{$dato->fecha}}',
										<?php $ninos = $varon = $mujer = $mayor = 0;
											$ninos = \DB::table('repetitivos')->where('categoria', '=', 'niños')->where('fecha', '=', $dato->fecha)->count();
											$varon = \DB::table('repetitivos')->where('categoria', '=', 'hombres')->where('fecha', '=', $dato->fecha)->count();
											$mujer = \DB::table('repetitivos')->where('categoria', '=', 'mujeres')->where('fecha', '=', $dato->fecha)->count();
											$mayor = \DB::table('repetitivos')->where('categoria', '=', 'mayor')->where('fecha', '=', $dato->fecha)->count();
										 ?>
										infantes: {{$ninos}},
										mujeres: {{$varon}},
										varones: {{$mujer}},
										mayor:  {{$mayor}},
									},
							@endforeach
					],
        xkey: 'period',
        ykeys: ['infantes', 'mujeres', 'varones', 'mayor'],
        labels: ['Niños', 'Mujeres', 'Varones', 'Adulto Mayor'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

});

 $('#graficar').click(function(){
	 var inicio  = $('#fecha_inicio').val();
	 var fin 		 = $('#fecha_fin').val();
	 var horario = ($('#horario').val()).split(' ')[0];
	 var persona = ($('#persona').val()).split(' ')[0];
	 var link = "{{asset('index.php/estadisticaDona/')}}/"+inicio+"/"+fin+"/"+horario+"/"+persona;
	 $.get(link, function( datos ){
		 var informacion = JSON.parse(datos);
		 var donut = new Morris.Donut({
 			 element: 'morris-donut-chart',
 			 data: informacion,
 			 backgroundColor: '#ccc',
  		 	 labelColor: '#060',
  			 colors: ['#DD4B39','#4486F7','#FAC504','#019C5A'],
 			 hideHover: 'auto'
 	 	});
	 });
 });

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
</script>
@endsection
