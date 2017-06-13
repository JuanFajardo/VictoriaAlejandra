@extends('layouts.preventa')

@section('title')
	preventa
@endsection

@section('titulo')
Pre-Venta FEIPOBOL
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
        .when('/crear', {
          templateUrl: '../angular/views/preventa/crear.html',
          controller: 'CrearCtrl'
        })
});
///Servicio de Angular para Dosificaciones
var va = angular.module('AdycttoBett0');
va.factory('PreventaRecursos', function($resource){
  return $resource('../index.php/registro/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
///Controladores de Angular para Dosificaciones
.controller('CrearCtrl', ['$scope', '$http', 'PreventaRecursos', '$location', '$timeout', function($scope, $http, PreventaRecursos, $location, $timeout){
  $scope.titulo = 'Preventa';
  $scope.boton = "Reservar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-primary";


  $scope.guardarPreventa = function(){
  };
}]);

</script>

@endsection
