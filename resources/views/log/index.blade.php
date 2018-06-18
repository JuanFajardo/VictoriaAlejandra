@extends('layouts.fepp')

@section('title')
Logs
@endsection

@section('menu8')
active
@endsection

@section('titulo')
Logs
@endsection


@section('icono')
glyphicon glyphicon-list-alt
@endsection

@section('tituloPanel')
Lista de Logs
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
          templateUrl: '../angular/views/log/lista.html',
          controller: 'ListaCtrl'
        })
        .when('/crear', {
          templateUrl: '../angular/views/log/crear.html',
          controller: 'CrearCtrl'
        })
        .when('/editar/:id', {
          templateUrl: '../angular/views/log/crear.html',
          controller: 'EditarCtrl'
        })
        .when('/ver/:id', {
          templateUrl: '../angular/views/log/ver.html',
          controller: 'VerCtrl'
        })
        .when('/eliminar/:id', {
          templateUrl: '../angular/views/log/eliminar.html',
          controller: 'EliminarCtrl'
        })
});
///Servicio de Angular para Dosificaciones
var va = angular.module('AdycttoBett0');
va.factory('LogRecursos', function($resource){
  return $resource('../index.php/log/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
///Controladores de Angular para Dosificaciones
.controller('ListaCtrl', ['$scope', 'LogRecursos', '$location', '$timeout', 'DTOptionsBuilder', 'DTColumnBuilder', function($scope, LogRecursos, $location, $timeout, DTOptionsBuilder, DTColumnBuilder){
  $scope.Logs = LogRecursos.query();
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
.controller('CrearCtrl', ['$scope', 'LogRecursos', '$location', '$timeout', function($scope, LogRecursos, $location, $timeout){
  $scope.titulo = 'Crear Log';
  $scope.boton = "Guardar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-primary";
  $scope.Log={};
  $scope.mostrar = "SI";
  var base64="";

  $scope.guardarLog = function(){
    $scope.mostrar = "NO";
    LogRecursos.save($scope.Log, function(data){
          var respuesta = data['respuesta'];
          if(respuesta == '200_OK'){
            $scope.panel = "alert alert-info";
            $scope.msj = "Se inserto el dato correctamente ";
            $timeout(function(){
              $location.path('/lista');
            }, 1500);
          }else{
            $scope.panel = "alert alert-danger";
            $scope.msj = respuesta;
          }
    });
  };

}])
.controller('EditarCtrl', ['$scope', 'LogRecursos', '$location', '$timeout', '$routeParams', function($scope, LogRecursos, $location, $timeout, $routeParams){
  $scope.titulo = " Editar Log";
  $scope.botonIcono = "fa fa-pencil";
  $scope.boton = "Actualizar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-warning";
  $scope.mostrar = "SI";
  var base64 = "";
  $scope.Log = LogRecursos.get({
    id: $routeParams.id
  });
  $scope.img = $scope.Log.logo;

  $scope.guardarLog = function(){
    $scope.mostrar = "NO";
    LogRecursos.update($scope.Log, function(data){
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
    /*$timeout(function(){
      $location.path('/lista');
    }, 1500);*/
  }
}])
.controller('EliminarCtrl', ['$scope', 'LogRecursos', '$routeParams', '$location', '$timeout', function($scope, LogRecursos, $routeParams, $location, $timeout){
  $scope.titulo = "Eliminar Log";
  $scope.icono = "file-text-o";
  $scope.Log = LogRecursos.get({
    id: $routeParams.id
  });
  $scope.eliminarLog = function(id){
    LogRecursos.delete({
      id: id
    });
    $timeout(function(){
      $location.path('/lista');
    }, 100);
  };
}]);

</script>
@endsection
