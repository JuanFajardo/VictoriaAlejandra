@extends('layouts.fepp')

@section('title')
	Pre Venta
@endsection

@section('menu10')
active
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
        .when('/lista', {
          templateUrl: '../angular/views/preventa/listar.html',
          controller: 'ListaCtrl'
        })
				.when('/confirmar/:id', {
          templateUrl: '../angular/views/preventa/confirmar.html',
          controller: 'EditarCtrl'
        })
});
///Servicio de Angular para Dosificaciones
var va = angular.module('AdycttoBett0');
va.factory('PreventaRecursos', function($resource){
	return $resource('../index.php/preventa/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
///Controladores de Angular para Dosificaciones
.controller('ListaCtrl', ['$scope', 'PreventaRecursos', '$location', '$timeout', 'DTOptionsBuilder', 'DTColumnBuilder', function($scope, PreventaRecursos, $location, $timeout, DTOptionsBuilder, DTColumnBuilder){
  $scope.preventas = PreventaRecursos.query();
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
.controller('EditarCtrl', ['$scope','$http', 'PreventaRecursos', '$location', '$timeout', '$routeParams', function($scope, $http, PreventaRecursos, $location, $timeout, $routeParams){
  $scope.titulo = "Confirmacion de Reserva";
  $scope.botonIcono = "glyphicon glyphicon-ok";
  $scope.boton = "Confirmar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-warning";
	$scope.mostrar = "SI";
  $scope.Preventa = PreventaRecursos.get({
    id: $routeParams.id
  });

		$(document).ready(function(){
			$("#telefono").keypress(function(e){
	      var charcode = (e.which)? e.which :e.keyCode;
	      if(charcode != 45 && charcode >31 && (charcode<48 || charcode >57 )){
	        e.preventDefault();
	        return false;
	      }
	      if(e.keyCode == '45' || e.charcode == '45'){
	        if (this.value.indexOf("-")!=-1){
	          e.preventDefault();
	          return false;
	        }
	        return true;
	      }
	    });
		});

	$scope.capturar = function(){
		var video = document.getElementById('video'),
				canvas = document.getElementById('canvas'),
				context = canvas.getContext('2d'),
				photo = document.getElementById('photo'),
				imagen = document.getElementById('imagen'),
				vendorUrl = window.URL || window.weblkitURL;

			 navigator.getMedia =  navigator.getUserMedia ||
													navigator.webkitGetUserMedia ||
													navigator.mozGetUserMedia ||
													navigator.msGetUserMedia;

			context.drawImage(video, 0, 0, 200,200  );
			photo.setAttribute('src', canvas.toDataURL('image/png'));
			imagen.setAttribute('value', canvas.toDataURL('image/png'));
			$scope.Preventa.imagen	= canvas.toDataURL('image/png');
	}



  $scope.confirmarPreventa = function(){
		$scope.mostrar = "NO";
		console.log($scope.Preventa);
    PreventaRecursos.update($scope.Preventa, function(data){

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


  }


}]);

</script>
@endsection
