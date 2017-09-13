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
  $scope.titulo = 'Preventa Entradas FEIPOBOL';
  $scope.boton = "Reservar";
	$scope.botonIcono = "material-icons"
  $scope.accion = "btn btn-primary";
	$scope.numero1 = Math.round((Math.random()*10+1));
	$scope.numero2 = Math.round((Math.random()*10+1));
$scope.Preventa={};
  $scope.guardarPreventa = function(){
		$scope.Preventa.num1 = $scope.numero1;
		$scope.Preventa.num2 = $scope.numero2;
		console.log($scope.Preventa);
    PreventaRecursos.save($scope.Preventa, function(data){
					var respuesta = data['respuesta'];
          if(respuesta == '200_OK'){
            $scope.panel = "alert alert-info";
						Materialize.toast('Se realizo correctamente a reserva, tiene un plazo de 7 dias para confirmar ', 3000, 'rounded')
						$('.collapsible').collapsible('close', 0);
						$scope.Preventa  = "";
						$scope.numero1 = Math.round((Math.random()*10+1));
						$scope.numero2 = Math.round((Math.random()*10+1));
						$timeout(function(){
							$scope.msj = "";
							$('#crear').modal('close');
              $location.path('/crear');
            }, 3000);
          }else{
						$scope.numero1 = Math.round((Math.random()*10+1));
						$scope.numero2 = Math.round((Math.random()*10+1));
            $scope.panel = "alert alert-danger";
            $scope.msj = respuesta;
          }
    });
  };

}]);
</script>

@endsection
