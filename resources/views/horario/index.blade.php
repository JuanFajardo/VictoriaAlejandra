@extends('layouts.fepp')

@section('title')
	Horarios
@endsection

@section('menu4')
active
@endsection

@section('titulo')
Horario
@endsection


@section('icono')
fa fa-clock-o
@endsection

@section('tituloPanel')
Lista de Horarios
@endsection

@section('cuerpo')
<div ng-view></div>
@endsection


@section('js')
<script type="text/javascript">
'use strict';
///Rutas de Angular para Dosificaciones
angular.module('AdycttoBett0', ['ngResource', 'ngRoute', 'ngAnimate', 'datatables'])
.config(function($routeProvider){
        $routeProvider
        .when('/lista', {
          templateUrl: '../angular/views/horario/lista.html',
          controller: 'ListaCtrl'
        })
        .when('/crear', {
          templateUrl: '../angular/views/horario/crear.html',
          controller: 'CrearCtrl'
        })
        .when('/editar/:id', {
          templateUrl: '../angular/views/horario/crear.html',
          controller: 'EditarCtrl'
        })
        .when('/ver/:id', {
          templateUrl: '../angular/views/horario/ver.html',
          controller: 'VerCtrl'
        })
        .when('/eliminar/:id', {
          templateUrl: '../angular/views/horario/eliminar.html',
          controller: 'EliminarCtrl'
        })
});
///Servicio de Angular para Dosificaciones
var va = angular.module('AdycttoBett0');
va.factory('HorarioRecursos', function($resource){
  return $resource('../index.php/horario/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
///Controladores de Angular para Dosificaciones
.controller('ListaCtrl', ['$scope', 'HorarioRecursos', '$location', '$timeout', 'DTOptionsBuilder', 'DTColumnBuilder', function($scope, HorarioRecursos, $location, $timeout, DTOptionsBuilder, DTColumnBuilder){
  $scope.horarios = HorarioRecursos.query();
	$scope.vm = {};
  $scope.vm.dtOptions = DTOptionsBuilder.newOptions()
  .withOption(
    "language",{
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      }
    )
  .withOption('order', [0, 'asc']);
}])
.controller('CrearCtrl', ['$scope', 'HorarioRecursos', '$location', '$timeout', function($scope, HorarioRecursos, $location, $timeout){
  $scope.titulo = 'Crear Horario';
  $scope.boton = "Guardar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-primary";
	$scope.mostrar = "SI";
  $scope.Horario={
		tolerancia: 0
	};

	$scope.ingresos1 = [ {hora:'00:00:00'}, { hora:'01:00:00'}, { hora:'02:00:00'}, { hora:'03:00:00'}, { hora:'04:00:00'}, { hora:'05:00:00'}, { hora:'06:00:00'}, { hora:'07:00:00'}, { hora:'08:00:00'}, { hora:'09:00:00'}, { hora:'10:00:00'}, { hora:'11:00:00'}, { hora:'12:00:00'}, { hora:'13:00:00'}, { hora:'14:00:00'},
	{ hora:'15:00:00'}, { hora:'16:00:00'}, { hora:'17:00:00'}, { hora:'18:00:00'}, { hora:'19:00:00'}, { hora:'20:00:00'}, { hora:'21:00:00'}, { hora:'22:00:00'}, { hora:'23:00:00'}, { hora:'24:00:00'} ];

	$scope.ingresoAm = function(){
		var horario = $scope.Horario.ingreso_am;
		horario = horario.split(':');
		var tiempos = [{hora:"00:00:00"}];
		var inicio = parseInt(horario[0]) + 1;
		for(var i=inicio; i<=24; i++){
			if(tiempos[0].hora == '00:00:00')
        tiempos.shift();
			if(i.length < 10)
				tiempos.push({hora: "0"+i+":00:00"});
			else
				tiempos.push({hora: i+":00:00"});
		}
		$scope.ingresos2 = tiempos;
	}

	$scope.salidaAm = function(){
		var horario = $scope.Horario.salida_am;
		horario = horario.split(':');
		var tiempos= [{hora:"00:00:00"}];
		var inicio = parseInt(horario[0]) + 1;
		var valor  = "";
		for(var i=inicio; i<=24; i++){
			if(tiempos[0].hora == '00:00:00')
        tiempos.shift();
			if(i.length < 10)
				tiempos.push({hora: "0"+i+":00:00" });
			else
				tiempos.push({hora: i+":00:00"});
		}
		$scope.ingresos3 = tiempos;
	}

	$scope.ingresoPm = function(){
		var horario = $scope.Horario.ingreso_pm;
		horario = horario.split(':');
		var tiempos = [{hora:"00:00:00"}];
		var inicio = parseInt(horario[0]) + 1;
		for(var i=inicio; i<=24; i++){
			if(tiempos[0].hora == '00:00:00')
        tiempos.shift();
			if(i.length < 10)
				tiempos.push({hora: "0"+i+":00:00"});
			else
				tiempos.push({hora: i+":00:00"});
		}
		$scope.ingresos4 = tiempos;
	}

  $scope.guardarHorario = function(){
		$scope.mostrar = "NO";
    HorarioRecursos.save($scope.Horario, function(data){
          var respuesta = data['respuesta'];
					if(respuesta == '200_OK'){
            $scope.panel = "alert alert-info";
            $scope.msj = "Se inserto el dato correctamente ";
						    $timeout(function(){
						      $location.path('/lista');
						    }, 1500);
          }else{
            $scope.panel = "alert alert-danger";
            $scope.msj = "Error: Intente nuevamente ";
          }
    });

  };
}])
.controller('EditarCtrl', ['$scope', 'HorarioRecursos', '$location', '$timeout', '$routeParams', function($scope, HorarioRecursos, $location, $timeout, $routeParams){
  $scope.titulo = " Editar Horario";
  $scope.botonIcono = "fa fa-pencil";
  $scope.boton = "Actualizar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-warning";
	$scope.mostrar = "SI";
  $scope.Horario = HorarioRecursos.get({
    id: $routeParams.id
  });

  $scope.guardarHorario = function(){
		$scope.mostrar = "NO";
    HorarioRecursos.update($scope.Horario, function(data){
          var respuesta = data['respuesta'];
          if(respuesta == '200_OK'){
            $scope.panel = "alert alert-warning";
            $scope.msj = "Se Actualizo el dato correctamente ";
						    $timeout(function(){
						      $location.path('/lista');
						    }, 1500);
          }else{
            $scope.panel = "alert alert-danger";
            $scope.msj = "Error: Intente nuevamente ";
          }
    });

  }
}])
.controller('EliminarCtrl', ['$scope', 'HorarioRecursos', '$routeParams', '$location', '$timeout', function($scope, HorarioRecursos, $routeParams, $location, $timeout){
  $scope.titulo = "Eliminar horario";
  $scope.icono = "file-text-o";
  $scope.Horario = HorarioRecursos.get({
    id: $routeParams.id
  });
  $scope.eliminarHorario = function(id){
    HorarioRecursos.delete({
      id: id
    });
    $timeout(function(){
      $location.path('/lista');
    }, 100);
  };
}]);

</script>
@endsection
