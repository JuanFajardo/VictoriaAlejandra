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
				          <input type="text" class="form-control" name="horario" id="horario" list="horario-lista">
				          <datalist id="horario-lista">
										@foreach($horarios as $horario)
				            	<option  value="{{$horario->id}} {{$horario->horario}}">
										@endforeach
				          </datalist>
				        </div>
				        <!--<div class="col-md-12">
				          <label> Stand </label>
				          <input type="text" class="form-control" name="stand" id="stand" list="stand-lista">
				          <datalist id="stand-lista">
										@foreach($stands as $stand)
					          	<option  value="{{$stand->id}} {{$stand->nom_empresa}}">
										@endforeach
				          </datalist>
				        </div>-->
				        <div class="col-md-12">
				          <label> Persona </label>
				          <input type="text" class="form-control" name="persona" id="persona" list="persona-lista">
				          <datalist id="persona-lista">
										@foreach($personas as $persona)
						        	<option  value="{{$persona->id}} {{$persona->nombres}}">
										@endforeach
				          </datalist>
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
</script>

@endsection
