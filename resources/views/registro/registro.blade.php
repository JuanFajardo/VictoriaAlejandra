@extends('layouts.blank')

@section('title')
	Registro
@endsection

@section('menu3')
active
@endsection

@section('titulo')
Registro
@endsection

@section('icono')
fa fa-user
@endsection

@section('tituloPanel')
Lista de Personas para administracion de registro
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
          templateUrl: '../angular/views/registro/crear.html',
          controller: 'CrearCtrl'
        })
});
///Servicio de Angular para Dosificaciones
var va = angular.module('AdycttoBett0');
va.factory('RegistroRecursos', function($resource){
  return $resource('../index.php/registro/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
///Controladores de Angular para Dosificaciones
.controller('CrearCtrl', ['$scope', '$http', 'RegistroRecursos', '$location', '$timeout', function($scope, $http, RegistroRecursos, $location, $timeout){
  $scope.titulo = 'Crear Registro';
  $scope.boton = "Guardar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-primary";


  $scope.guardarPersona = function(){
			var link = "../index.php/registroTarjeta/"+$scope.Registro.tarjeta;
			$http({url:link, method:"GET"}).success(function(data){
					var hora = (Date()).split(' ');
					//"respuesta"=>"500_MAL", "msj"=>"Tarjeta NO VALIDA"
          if( (data).length > 0){
						$scope.nombres = data[0]['nombres'];
						$scope.horario = data[0]['horario'];
						$scope.stand 	 = data[0]['nom_empresa'];
						$scope.foto 	 = data[0]['imagen'];
						$scope.panel = "alert alert-info";
            $scope.msj = "Registro a horas: "+ hora[4];
          }else if((data['msj']).length >0 ){
						$scope.nombres = '';
						$scope.horario = '';
						$scope.stand 	 = '';
						$scope.foto 	 = '';
						$scope.panel = "alert alert-danger";
            $scope.msj = data['msj'];
          }else{
						$scope.nombres = '';
						$scope.horario = '';
						$scope.stand 	 = '';
						$scope.foto 	 = '';
						$scope.panel = "alert alert-danger";
            $scope.msj = "Error de Tarjeta";
          }
    });
		$scope.Registro.tarjeta = "";
  };
}]);

</script>

@endsection
