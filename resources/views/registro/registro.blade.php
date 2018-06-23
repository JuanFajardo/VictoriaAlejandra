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
					var hora = (Date()).split(' ')

          if( typeof data['direccion'] !== 'undefined' ){
						$scope.nombres = data['nombres'];
						$scope.horario = hora[4];
						$scope.stand 	 = data['nom_empresa'];
						$scope.foto 	 = data['imagen'];
						$scope.panel = "alert alert-info";
            $scope.msj = "";
          }else if(  typeof data.msj !== 'undefined' ){ // (data['msj']).length >0 ){
						$scope.nombres = '';
						$scope.horario = '';
						$scope.stand 	 = '';
						$scope.foto 	 = '';
						$scope.panel = "alert alert-danger";
            $scope.msj = data.msj;
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
