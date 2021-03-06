@extends('layouts.fepp')

@section('title')
Costos
@endsection

@section('menu13')
active
@endsection

@section('titulo')
Costos
@endsection


@section('icono')
glyphicon glyphicon-list-alt
@endsection

@section('tituloPanel')
Lista de Costos
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
          templateUrl: '../angular/views/costo/lista.html',
          controller: 'ListaCtrl'
        })
        .when('/crear', {
          templateUrl: '../angular/views/costo/crear.html',
          controller: 'CrearCtrl'
        })
        .when('/editar/:id', {
          templateUrl: '../angular/views/costo/crear.html',
          controller: 'EditarCtrl'
        })
        .when('/ver/:id', {
          templateUrl: '../angular/views/costo/ver.html',
          controller: 'VerCtrl'
        })
        .when('/eliminar/:id', {
          templateUrl: '../angular/views/costo/eliminar.html',
          controller: 'EliminarCtrl'
        })
});
///Servicio de Angular para Dosificaciones
var va = angular.module('AdycttoBett0');
va.factory('CostoRecursos', function($resource){
  return $resource('../index.php/costo/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
///Controladores de Angular para Dosificaciones
.controller('ListaCtrl', ['$scope', 'CostoRecursos', '$location', '$timeout', 'DTOptionsBuilder', 'DTColumnBuilder', function($scope, CostoRecursos, $location, $timeout, DTOptionsBuilder, DTColumnBuilder){
  $scope.Costos = CostoRecursos.query();
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
.controller('CrearCtrl', ['$scope', 'CostoRecursos', '$location', '$timeout', function($scope, CostoRecursos, $location, $timeout){
  $scope.titulo = 'Crear Costo';
  $scope.boton = "Guardar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-primary";
  $scope.Costo={};
  $scope.mostrar = "SI";
  var base64="";

  $scope.guardarCosto = function(){
    $scope.mostrar = "NO";
    CostoRecursos.save($scope.Costo, function(data){
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
.controller('EditarCtrl', ['$scope', 'CostoRecursos', '$location', '$timeout', '$routeParams', function($scope, CostoRecursos, $location, $timeout, $routeParams){
  $scope.titulo = " Editar Costo";
  $scope.botonIcono = "fa fa-pencil";
  $scope.boton = "Actualizar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-warning";
  $scope.mostrar = "SI";
  var base64 = "";
  $scope.Costo = CostoRecursos.get({
    id: $routeParams.id
  });
  $scope.img = $scope.Costo.logo;

  $scope.guardarCosto = function(){
    $scope.mostrar = "NO";
    CostoRecursos.update($scope.Costo, function(data){
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
.controller('EliminarCtrl', ['$scope', 'CostoRecursos', '$routeParams', '$location', '$timeout', function($scope, CostoRecursos, $routeParams, $location, $timeout){
  $scope.titulo = "Eliminar Costo";
  $scope.icono = "file-text-o";
  $scope.Costo = CostoRecursos.get({
    id: $routeParams.id
  });
  $scope.eliminarCosto = function(id){
    CostoRecursos.delete({
      id: id
    });
    $timeout(function(){
      $location.path('/lista');
    }, 100);
  };
}]);

</script>
@endsection
