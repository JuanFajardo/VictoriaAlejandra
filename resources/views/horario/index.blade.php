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
  $scope.Horario={
		tolerancia: 0
	};

  $scope.guardarHorario = function(){
    HorarioRecursos.save($scope.Horario, function(data){
          var respuesta = data['respuesta'];
          if(respuesta == '200_OK'){
            $scope.panel = "alert alert-info";
            $scope.msj = "Se inserto el dato correctamente ";
          }else{
            $scope.panel = "alert alert-danger";
            $scope.msj = "Error: Intente nuevamente ";
          }
    });

    $timeout(function(){
      $location.path('/lista');
    }, 1500);
  };
}])
.controller('EditarCtrl', ['$scope', 'HorarioRecursos', '$location', '$timeout', '$routeParams', function($scope, HorarioRecursos, $location, $timeout, $routeParams){
  $scope.titulo = " Editar Horario";
  $scope.botonIcono = "fa fa-pencil";
  $scope.boton = "Actualizar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-warning";
  $scope.Horario = HorarioRecursos.get({
    id: $routeParams.id
  });

  $scope.guardarHorario = function(){
    HorarioRecursos.update($scope.Horario, function(data){
          var respuesta = data['respuesta'];
          if(respuesta == '200_OK'){
            $scope.panel = "alert alert-info";
            $scope.msj = "Se inserto el dato correctamente ";
          }else{
            $scope.panel = "alert alert-danger";
            $scope.msj = "Error: Intente nuevamente ";
          }
    });

    $timeout(function(){
      $location.path('/lista');
    }, 1500);
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
