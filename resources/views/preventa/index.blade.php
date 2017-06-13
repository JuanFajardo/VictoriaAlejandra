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
	$scope.Preventa={};
	$scope.mostrar = "SI";
	var base64="";


	$(document).ready(function(){
	$("#imagen").change(function(){
			var ArchivoSeleccionado = document.getElementById("imagen").files;
			if(ArchivoSeleccionado.length > 0){
				var FileToLoad = ArchivoSeleccionado[0];
				var fileReader = new FileReader();
				fileReader.onload = function(fileLoadedEvent){
					base64 = fileLoadedEvent.target.result;
					$scope.img = base64;
					//document.getElementById("preview").setAttribute("src",base64);
					//$("#preview").show();
				};
				fileReader.readAsDataURL(FileToLoad);
			}
		});


  $scope.guardarPreventa = function(){
		$scope.Preventa.imagen = $scope.img;
    StandRecursos.save($scope.Preventa, function(data){
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
