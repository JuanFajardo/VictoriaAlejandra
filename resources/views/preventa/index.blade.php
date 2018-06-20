@extends('layouts.preventa')

@section('title')
	Inscripcion de Empresas
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
          templateUrl: '../angular/views/preventa/empresa.html',
          controller: 'CrearCtrl'
        })
});

var va = angular.module('AdycttoBett0');
va.factory('PreventaRecursos', function($resource){
  return $resource('../index.php/preventa/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
.controller('CrearCtrl', ['$scope', '$http', 'PreventaRecursos', '$location', '$timeout', function($scope, $http, PreventaRecursos, $location, $timeout){
  $scope.titulo = 'Inscripcion de Empresas en la FEIPOBOL';
  $scope.boton = "Inscribirme	";
	$scope.botonIcono = "material-icons"
  $scope.accion = "btn btn-primary";
	$scope.numero1 = Math.round((Math.random()*10+1));
	$scope.numero2 = Math.round((Math.random()*10+1));
	$scope.Preventa={};

	$(document).ready(function(){
	  $("#logo").change(function(){
	  	var ArchivoSeleccionado = document.getElementById("logo").files;
	    if(ArchivoSeleccionado.length > 0){
	      var FileToLoad = ArchivoSeleccionado[0];
	      var fileReader = new FileReader();
	      fileReader.onload = function(fileLoadedEvent){
	        base64 = fileLoadedEvent.target.result;
	        $scope.img = base64;
	        document.getElementById("img").setAttribute("src",base64);
	        $("#img").show();
	      };
	      fileReader.readAsDataURL(FileToLoad);
	    }
	  });
	});


  $scope.guardarPreventa = function(){
		$scope.Preventa.num1 = $scope.numero1;
		$scope.Preventa.num2 = $scope.numero2;
		$scope.mostrar = "NO";
    $scope.Preventa.logo = $scope.img;
    PreventaRecursos.save($scope.Preventa, function(data){
					var respuesta = data['respuesta'];
          if(respuesta == '200_OK'){
            $scope.panel = "alert alert-info";
						Materialize.toast('Se realizo correctamente su inscripcion, tiene un plazo de 7 dias para confirmar ', 5000, 'rounded')
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
