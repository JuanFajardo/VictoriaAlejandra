@extends('layouts.fepp')

@section('title')
Puesto
@endsection

@section('menu15')
active
@endsection

@section('titulo')
Puesto
@endsection


@section('icono')
glyphicon glyphicon-list-alt
@endsection

@section('tituloPanel')
Lista de Puesto
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
          templateUrl: '../angular/views/puesto/listar.html',
          controller: 'ListaCtrl'
        })
        .when('/crear', {
          templateUrl: '../angular/views/puesto/crear.html',
          controller: 'CrearCtrl'
        })
        .when('/editar/:id', {
          templateUrl: '../angular/views/puesto/crear.html',
          controller: 'EditarCtrl'
        })
        .when('/ver/:id', {
          templateUrl: '../angular/views/puesto/ver.html',
          controller: 'VerCtrl'
        })
        .when('/eliminar/:id', {
          templateUrl: '../angular/views/puesto/eliminar.html',
          controller: 'EliminarCtrl'
        })
});
///Servicio de Angular para Dosificaciones
var va = angular.module('AdycttoBett0');
va.factory('PuestoRecursos', function($resource){
  return $resource('../index.php/puesto/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
.factory('NivelRecursos', function($resource){
  return $resource('../index.php/nivel/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
.factory('CostoRecursos', function($resource){
  return $resource('../index.php/costo/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
///Controladores de Angular para Dosificaciones
.controller('ListaCtrl', ['$scope', 'PuestoRecursos', '$location', '$timeout', 'DTOptionsBuilder', 'DTColumnBuilder', function($scope, PuestoRecursos, $location, $timeout, DTOptionsBuilder, DTColumnBuilder){
  $scope.Puestos = PuestoRecursos.query();
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
.controller('CrearCtrl', ['$scope', 'PuestoRecursos', 'NivelRecursos', 'CostoRecursos', '$location', '$timeout', function($scope, PuestoRecursos, NivelRecursos, CostoRecursos, $location, $timeout){
  $scope.Nivels  = NivelRecursos.query();
  $scope.Costos  = CostoRecursos.query();
  $scope.titulo = 'Crear Puesto';
  $scope.boton = "Guardar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-primary";
  $scope.Puesto={};
  $scope.mostrar = "SI";
  var base64="";

  $scope.guardarPuesto = function(){
    $scope.mostrar = "NO";
    PuestoRecursos.save($scope.Puesto, function(data){
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
.controller('EditarCtrl', ['$scope', 'PuestoRecursos', '$location', '$timeout', '$routeParams', function($scope, PuestoRecursos, $location, $timeout, $routeParams){
  $scope.titulo = " Editar Puesto";
  $scope.botonIcono = "fa fa-pencil";
  $scope.boton = "Actualizar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-warning";
  $scope.mostrar = "SI";
  var base64 = "";
  $scope.Puesto = PuestoRecursos.get({
    id: $routeParams.id
  });

  $scope.guardarPuesto = function(){
    $scope.mostrar = "NO";
    PuestoRecursos.update($scope.Puesto, function(data){
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
.controller('EliminarCtrl', ['$scope', 'PuestoRecursos', '$routeParams', '$location', '$timeout', function($scope, PuestoRecursos, $routeParams, $location, $timeout){
  $scope.titulo = "Eliminar Puesto";
  $scope.icono = "file-text-o";
  $scope.Puesto = PuestoRecursos.get({
    id: $routeParams.id
  });
  $scope.eliminarPuesto = function(id){
    PuestoRecursos.delete({
      id: id
    });
    $timeout(function(){
      $location.path('/lista');
    }, 100);
  };
}]);

</script>
@endsection
