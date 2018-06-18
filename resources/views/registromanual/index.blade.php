@extends('layouts.fepp')

@section('title')
	Registro Manual
@endsection

@section('menu9')
active
@endsection

@section('titulo')
Registro Manual
@endsection


@section('icono')
fa fa-user
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
          templateUrl: '../angular/views/registro/registroManual.html',
          controller: 'CrearCtrl'
        })
});

var va = angular.module('AdycttoBett0');
va.factory('registroManualRecursos', function($resource){
  return $resource('../index.php/registromanual/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
.controller('CrearCtrl', ['$scope', '$http', 'registroManualRecursos', '$location', '$timeout', function($scope, $http, registroManualRecursos, $location, $timeout){
  $scope.titulo ='Registro Manual FEIPOBOL';
  $scope.boton = "Reserva";
	$scope.botonIcono = "material-icons"
  $scope.accion = "btn btn-primary";
	$scope.RegistroManual={};
  $scope.registroManual1 = function(){
		$scope.RegistroManual.opcion = 1;
		console.log($scope.RegistroManual);
  	registroManualRecursos.save($scope.RegistroManual, function(data){
					var respuesta = data['respuesta'];
          if(respuesta == '200_OK'){
            $scope.panel = "alert alert-info";
						$timeout(function(){
							$scope.msj = "Correcto Niño";
							$location.path('/crear');
            }, 3000);
          }else{
						$scope.panel = "alert alert-danger";
            $scope.msj = respuesta;
          }
    });
  };
	$scope.RegistroManual={};
	$scope.registroManual2 = function(){
		$scope.RegistroManual.opcion = 2;
		console.log($scope.RegistroManual);
		registroManualRecursos.save($scope.RegistroManual, function(data){
					var respuesta = data['respuesta'];
					if(respuesta == '200_OK'){
						$scope.panel = "alert alert-info";
						$timeout(function(){
							$scope.msj = "Correcto Mujer";
							$location.path('/crear');
						}, 3000);
					}else{
						$scope.panel = "alert alert-danger";
						$scope.msj = respuesta;
					}
		});
	};
	$scope.RegistroManual={};
  $scope.registroManual3 = function(){
		$scope.RegistroManual.opcion = 3;
		console.log($scope.RegistroManual);
  	registroManualRecursos.save($scope.RegistroManual, function(data){
					var respuesta = data['respuesta'];
          if(respuesta == '200_OK'){
            $scope.panel = "alert alert-info";
						$timeout(function(){
							$scope.msj = "Correcto Hombre";
							$location.path('/crear');
            }, 3000);
          }else{
						$scope.panel = "alert alert-danger";
            $scope.msj = respuesta;
          }
    });
  };
	$scope.RegistroManual={};
  $scope.registroManual4 = function(){
		$scope.RegistroManual.opcion = 4;
		console.log($scope.RegistroManual);
  	registroManualRecursos.save($scope.RegistroManual, function(data){
					var respuesta = data['respuesta'];
          if(respuesta == '200_OK'){
            $scope.panel = "alert alert-info";
						$timeout(function(){
							$scope.msj = "Correcto Anciano";
							$location.path('/crear');
            }, 3000);
          }else{
						$scope.panel = "alert alert-danger";
            $scope.msj = respuesta;
          }
    });
  };
}]);
</script>

@endsection
