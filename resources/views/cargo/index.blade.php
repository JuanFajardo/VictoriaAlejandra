@extends('layouts.fepp')

@section('title')
	Cargos
@endsection

@section('menu9')
active
@endsection

@section('titulo')
Cargo
@endsection


@section('icono')
glyphicon glyphicon-lock
@endsection

@section('tituloPanel')
Lista de Cargos
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
          templateUrl: '../angular/views/cargo/listar.html',
          controller: 'ListaCtrl'
        })
        .when('/crear', {
          templateUrl: '../angular/views/cargo/crear.html',
          controller: 'CrearCtrl'
        })
        .when('/editar/:id', {
          templateUrl: '../angular/views/cargo/crear.html',
          controller: 'EditarCtrl'
        })
        .when('/ver/:id', {
          templateUrl: '../angular/views/cargo/ver.html',
          controller: 'VerCtrl'
        })
        .when('/eliminar/:id', {
          templateUrl: '../angular/views/cargo/eliminar.html',
          controller: 'EliminarCtrl'
        })
});
///Servicio de Angular para Dosificaciones
var va = angular.module('AdycttoBett0');
va.factory('CargoRecursos', function($resource){
  return $resource('../index.php/cargo/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
va.factory('HorarioRecursos', function($resource){
  return $resource('../index.php/horario/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
///Controladores de Angular para Dosificaciones
.controller('ListaCtrl', ['$scope', 'CargoRecursos', 'HorarioRecursos', '$location', '$timeout', 'DTOptionsBuilder', 'DTColumnBuilder', function($scope, CargoRecursos, HorarioRecursos, $location, $timeout, DTOptionsBuilder, DTColumnBuilder){
  $scope.cargos = CargoRecursos.query();
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
.controller('CrearCtrl', ['$scope', 'HorarioRecursos', 'CargoRecursos', '$location', '$timeout', function($scope, HorarioRecursos, CargoRecursos, $location, $timeout){
	$scope.horarios = HorarioRecursos.query();
  $scope.titulo = 'Crear Cargo';
  $scope.boton = "Guardar";
  $scope.accion = "btn btn-primary";
  $scope.Cargo={};
  $scope.guardarCargo = function(){
    CargoRecursos.save($scope.Cargo);
    $scope.panel = "alert alert-info";
    $scope.msj = "Se inserto el dato correctamente!";
    $timeout(function(){
      $location.path('/lista');
    }, 1000);
  };
}])
.controller('EditarCtrl', ['$scope', 'HorarioRecursos', '$location', '$timeout', '$routeParams', function($scope, CargoRecursos, $location, $timeout, $routeParams){
  $scope.titulo = " Editar Cargo";
  $scope.botonIcono = "fa fa-pencil";
  $scope.boton = "Actualizar";
  $scope.accion = "btn btn-primary";
  $scope.Cargo = CargoRecursos.get({
    id: $routeParams.id
  });
  $scope.guardarCargo = function(){
    CargoRecursos.update($scope.Cargo);
    $scope.msj = "Se Actualizo correctamente!";
    $scope.panel = "alert alert-warning";
    $timeout(function(){
      $location.path('/lista');
    }, 1000);
  }
}])
.controller('EliminarCtrl', ['$scope', 'CargoRecursos', '$routeParams', '$location', '$timeout', function($scope, CargoRecursos, $routeParams, $location, $timeout){
  $scope.titulo = "Eliminar horario";
  $scope.icono = "file-text-o";
  $scope.Cargo = HorarioCargo.get({
    id: $routeParams.id
  });
  $scope.eliminarCargo = function(id){
    CargoRecursos.delete({
      id: id
    });
    $timeout(function(){
      $location.path('/lista');
    }, 100);
  };
}]);

</script>
@endsection
