@extends('layouts.fepp')

@section('title')
Personal
@endsection

@section('menu2')
active
@endsection

@section('titulo')
Personal
@endsection


@section('icono')
glyphicon glyphicon-user
@endsection

@section('tituloPanel')
Lista del Personal
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
          templateUrl: '../angular/views/trabajador/lista.html',
          controller: 'ListaCtrl'
        })
        .when('/crear', {
          templateUrl: '../angular/views/trabajador/crear.html',
          controller: 'CrearCtrl'
        })
        .when('/editar/:id', {
          templateUrl: '../angular/views/trabajador/crear.html',
          controller: 'EditarCtrl'
        })
        .when('/ver/:id', {
          templateUrl: '../angular/views/trabajador/ver.html',
          controller: 'VerCtrl'
        })
        .when('/eliminar/:id', {
          templateUrl: '../angular/views/trabajador/eliminar.html',
          controller: 'EliminarCtrl'
        })
});
///Servicio de Angular para Dosificaciones
var va = angular.module('AdycttoBett0');
va.factory('TrabajadorRecursos', function($resource){
  return $resource('../index.php/trabajador/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
///Controladores de Angular para Dosificaciones
.controller('ListaCtrl', ['$scope', 'TrabajadorRecursos', '$location', '$timeout', 'DTOptionsBuilder', 'DTColumnBuilder', function($scope, TrabajadorRecursos, $location, $timeout, DTOptionsBuilder, DTColumnBuilder){
  $scope.trabajadores = TrabajadorRecursos.query();
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
.controller('CrearCtrl', ['$scope', 'TrabajadorRecursos', '$location', '$timeout', function($scope, TrabajadorRecursos, $location, $timeout){
  $scope.titulo = 'Crear Personal';
  $scope.boton = "Guardar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-primary";
  $scope.trabajador={};

  $scope.guardarTrabajador = function(){
    console.log($scope.Trabajador);
    TrabajadorRecursos.save($scope.Trabajador, function(data){
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
  /*$timeout(function(){
  $location.path('/lista');
  }, 1500);*/
  };
}])
.controller('EditarCtrl', ['$scope', 'TrabajadorRecursos', '$location', '$timeout', '$routeParams', function($scope, TrabajadorRecursos, $location, $timeout, $routeParams){
  $scope.titulo = " Editar Personal";
  $scope.botonIcono = "fa fa-pencil";
  $scope.boton = "Actualizar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-warning";
  $scope.Trabajador = TrabajadorRecursos.get({
    id: $routeParams.id
  });

  $scope.guardarTrabajador = function(){
    TrabajadorRecursos.update($scope.trabajador, function(data){
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
.controller('EliminarCtrl', ['$scope', 'TrabajadorRecursos', '$routeParams', '$location', '$timeout', function($scope, TrabajadorRecursos, $routeParams, $location, $timeout){
  $scope.titulo = "Eliminar Personal";
  $scope.icono = "file-text-o";
  $scope.Trabajador = TrabajadorRecursos.get({
    id: $routeParams.id
  });
  $scope.eliminarTrabajador = function(id){
    TrabajadorRecursos.delete({
      id: id
    });
    $timeout(function(){
      $location.path('/lista');
    }, 100);
  };
}]);

</script>
@endsection
