@extends('layouts.fepp')

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
        .when('/lista', {
          templateUrl: '../angular/views/registro/listar.html',
          controller: 'ListaCtrl'
        })
        .when('/crear', {
          templateUrl: '../angular/views/registro/crear.html',
          controller: 'CrearCtrl'
        })
        .when('/editar/:id', {
          templateUrl: '../angular/views/registro/crear.html',
          controller: 'EditarCtrl'
        })
        .when('/ver/:id', {
          templateUrl: '../angular/views/registro/ver.html',
          controller: 'VerCtrl'
        })
        .when('/eliminar/:id', {
          templateUrl: '../angular/views/registro/eliminar.html',
          controller: 'EliminarCtrl'
        })
});
///Servicio de Angular para Dosificaciones
var va = angular.module('AdycttoBett0');
va.factory('RegistroRecursos', function($resource){
  return $resource('../index.php/registro/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
///Controladores de Angular para Dosificaciones
.controller('ListaCtrl', ['$scope', 'RegistroRecursos', '$location', '$timeout', 'DTOptionsBuilder', 'DTColumnBuilder', function($scope, RegistroRecursos, $location, $timeout, DTOptionsBuilder, DTColumnBuilder){
  $scope.personas = RegistroRecursos.query();
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
.controller('CrearCtrl', ['$scope', '$http', 'RegistroRecursos', '$location', '$timeout', function($scope, $http, RegistroRecursos, $location, $timeout){
  $scope.titulo = 'Crear Registro';
  $scope.boton = "Guardar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-primary";
	$scope.mostrar = "SI";

  $scope.guardarPersona = function(){
			var link = "../index.php/registroTarjeta/"+$scope.Registro.tarjeta;
			$http({url:link, method:"GET"}).success(function(data){

					//"respuesta"=>"500_MAL", "msj"=>"Tarjeta NO VALIDA"
          if( (data).length > 0){
						$scope.nombres = data[0]['nombres'];
						$scope.horario = data[0]['horario'];
						$scope.stand 	 = data[0]['nom_empresa'];
						$scope.foto 	 = data[0]['imagen'];
						$scope.panel = "alert alert-info";
            $scope.msj = "Registro correcto a horas"+Date();
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
}])
.controller('EditarCtrl', ['$scope', 'PersonalRecursos', '$location', '$timeout', '$routeParams', function($scope, PersonalRecursos, $location, $timeout, $routeParams){
  $scope.titulo = " Editar Horario";
  $scope.botonIcono = "fa fa-pencil";
  $scope.boton = "Actualizar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-warning";
  $scope.Persona = PersonalRecursos.get({
    id: $routeParams.id
  });

  $scope.guardarHorario = function(){
    HorarioRecursos.update($scope.Horario, function(data){
          var respuesta = data['respuesta'];
          if(respuesta == '200_OK'){
            $scope.panel = "alert alert-info";
            $scope.msj = "Se inserto el dato correctamente ";
          }else{
            $scope.panel = "alert alert-danger";
            $scope.msj = "Error: Intente nuevamente ";
          }
    });

    $timeout(function(){
      $location.path('/lista');
    }, 1500);
  }
}])

.controller('VerCtrl', ['$scope', '$http', 'RegistroRecursos', '$location', '$timeout', '$routeParams', function($scope, $http, RegistroRecursos, $location, $timeout, $routeParams){
  $scope.titulo = " Visualizar Registros";
  $scope.botonIcono = "fa fa-pencil";
  $scope.boton = "Actualizar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-warning";
  $scope.registros = RegistroRecursos.get({
    id: $routeParams.id
  });

	var link = "../index.php/registro/"+$routeParams.id;
	$http({url:link, method:"GET"}).success(function(data){
		$scope.registros = data;
	});


	var link = "../index.php/registroPersona/"+$routeParams.id;
	$http({url:link, method:"GET"}).success(function(data){
		$scope.nombres	= data[0].nombres;
		$scope.foto			= data[0].imagen;
		$scope.horario	= data[0].horario;
		$scope.stand		= data[0].nom_empresa;
	});

}]);

</script>

@endsection
