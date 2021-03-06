@extends('layouts.fepp')

@section('title')
Cobros
@endsection

@section('menu12')
active
@endsection

@section('titulo')
Cobros
@endsection


@section('icono')
glyphicon glyphicon-list-alt
@endsection

@section('tituloPanel')
Lista de Cobros
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
          templateUrl: '../angular/views/cobro/lista.html',
          controller: 'ListaCtrl'
        })
        .when('/editar/:id', {
          templateUrl: '../angular/views/cobro/crear.html',
          controller: 'EditarCtrl'
        })
        .when('/eliminar/:id', {
          templateUrl: '../angular/views/cobro/eliminar.html',
          controller: 'EliminarCtrl'
        })
});
///Servicio de Angular para Dosificaciones
var va = angular.module('AdycttoBett0');
va.factory('CobroRecursos', function($resource){
  return $resource('../index.php/cobro/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
///Controladores de Angular para Dosificaciones
.controller('ListaCtrl', ['$scope', 'CobroRecursos', '$location', '$timeout', 'DTOptionsBuilder', 'DTColumnBuilder', function($scope, CobroRecursos, $location, $timeout, DTOptionsBuilder, DTColumnBuilder){
  $scope.cobros = CobroRecursos.query();
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

.controller('EditarCtrl', ['$scope', 'CobroRecursos', '$location', '$timeout', '$routeParams', function($scope, CobroRecursos, $location, $timeout, $routeParams){
  $scope.titulo = " Editar Cobro";
  $scope.botonIcono = "fa fa-pencil";
  $scope.boton = "Actualizar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-warning";
  $scope.mostrar = "SI";
  var base64 = "";
  $scope.Cobro = CobroRecursos.get({
    id: $routeParams.id
  });
  $scope.img = $scope.Cobro.logo;

  $scope.guardarCobro = function(){
    $scope.mostrar = "NO";
    CobroRecursos.update($scope.Cobro, function(data){
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
.controller('EliminarCtrl', ['$scope', 'CobroRecursos', '$routeParams', '$location', '$timeout', function($scope, CobroRecursos, $routeParams, $location, $timeout){
  $scope.titulo = "Eliminar Cobro";
  $scope.icono = "file-text-o";
  $scope.Cobro = CobroRecursos.get({
    id: $routeParams.id
  });
  $scope.eliminarCobro = function(id){
    CobroRecursos.delete({
      id: id
    });
    $timeout(function(){
      $location.path('/lista');
    }, 100);
  };
}]);

</script>
@endsection
