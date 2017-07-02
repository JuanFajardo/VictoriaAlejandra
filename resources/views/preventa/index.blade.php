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
angular.module('AdycttoBett0', ['ngResource', 'ngRoute', 'ngAnimate', 'vcRecaptcha'])
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
		// $scope.response = null;
		// $scope.widgetId = null;
		// $scope.model = {
		// 	key: '6LdGVycUAAAAADYk0vbqvt2-ZPEuYTaB6quUoXXQ'
		// };
		// $scope.setResponse = function (response) {
		// 	 console.info('Response available');
		// 	 $scope.response = response;
	 // 	};
	  // $scope.setWidgetId = function (widgetId) {
	  //    console.info('Created widget ID: %s', widgetId);
	  //    $scope.widgetId = widgetId;
	  // };
		// $scope.cbExpiration = function() {
	  //   console.info('Captcha expired. Resetting response object');
	  //   vcRecaptchaService.reload($scope.widgetId);
	  //   $scope.response = null;
	  // };
$scope.Preventa={};
  $scope.guardarPreventa = function(){


		// var valid;
    // console.log('sending the captcha response to the server', $scope.response);
    // if (valid) {
    //     console.log('Success');
    // } else {
    //     console.log('Failed validation');
    //     vcRecaptchaService.reload($scope.widgetId);
    // }

    PreventaRecursos.save($scope.Preventa, function(data){
					var respuesta = data['respuesta'];
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
