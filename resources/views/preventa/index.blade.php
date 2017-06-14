@extends('layouts.preventa')

@section('title')
	Pre Venta
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
angular.module('AdycttoBett0', ['ngResource', 'ngRoute', 'ngAnimate'])
.config(function($routeProvider){
        $routeProvider
        .when('/crear', {
          templateUrl: '../angular/views/preventa/crear.html',
          controller: 'CrearCtrl'
        })
});

var va = angular.module('AdycttoBett0');
va.factory('PreventaRecursos', function($resource){
  return $resource('../index.php/preventa/:id', { id:"@id"}, { update: { method: "PUT" } } );
})

.controller('CrearCtrl', ['$scope', '$http', 'PreventaRecursos', '$location', '$timeout', function($scope, $http, PreventaRecursos, $location, $timeout){
  $scope.titulo = 'Preventa';
  $scope.boton = "Reservar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-primary";
	$scope.Preventa={};

  $scope.guardarPreventa = function(){
    PreventaRecursos.save($scope.Preventa, function(data){
					$scope.Preventa.imagen = "";
					var respuesta = data['respuesta'];
					console.log(respuesta);
          if(respuesta == '200_OK'){
            $scope.panel = "alert alert-info";
            $scope.msj = "Se realizo correctamente la reserva";
            $timeout(function(){
              $location.path('/crear');
            }, 1500);
          }else{
            $scope.panel = "alert alert-danger";
            $scope.msj = respuesta;
          }
    });
  };

}]);
</script>

@endsection
