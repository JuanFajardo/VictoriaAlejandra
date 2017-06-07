@extends('layouts.fepp')

@section('title')
	Personal
@endsection

@section('menu2')
active
@endsection

@section('titulo')
Personal
@endsection


@section('icono')
fa fa-user
@endsection

@section('tituloPanel')
Lista de Personas
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
          templateUrl: '../angular/views/personal/listar.html',
          controller: 'ListaCtrl'
        })
        .when('/crear', {
          templateUrl: '../angular/views/personal/crear.html',
          controller: 'CrearCtrl'
        })
        .when('/editar/:id', {
          templateUrl: '../angular/views/personal/crear.html',
          controller: 'EditarCtrl'
        })
        .when('/ver/:id', {
          templateUrl: '../angular/views/personal/ver.html',
          controller: 'VerCtrl'
        })
        .when('/eliminar/:id', {
          templateUrl: '../angular/views/personal/eliminar.html',
          controller: 'EliminarCtrl'
        })
});
///Servicio de Angular para Dosificaciones
var va = angular.module('AdycttoBett0');
va.factory('PersonalRecursos', function($resource){
  return $resource('../index.php/personal/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
///Controladores de Angular para Dosificaciones
.controller('ListaCtrl', ['$scope', 'PersonalRecursos', '$location', '$timeout', 'DTOptionsBuilder', 'DTColumnBuilder', function($scope, PersonalRecursos, $location, $timeout, DTOptionsBuilder, DTColumnBuilder){
  $scope.personas = PersonalRecursos.query();
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
.controller('CrearCtrl', ['$scope', '$http', 'PersonalRecursos', '$location', '$timeout', function($scope, $http, PersonalRecursos, $location, $timeout){
  $scope.titulo = 'Crear Personal';
  $scope.boton = "Guardar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-primary";
	$scope.mostrar = "NO";

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

	function fecha(date) {
	  var mm = date.getMonth() + 1;
	  var dd = date.getDate();

	  return [date.getFullYear(),
	          (mm>9 ? '-' : '-0') + mm,
	          (dd>9 ? '-' : '-0') + dd
	         ].join('');
	};

	var fecha = fecha(new Date());

  $scope.Persona={
		tolerancia: 0,
		fecha_inscripcion: fecha
	};

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
			$scope.Persona.imagen	= canvas.toDataURL('image/png');
	}

	var link = "../index.php/horario";
	$http({url:link, method:"GET"}).success(function(data){
		$scope.horarios = data;
	});

	var link = "../index.php/stand";
	$http({url:link, method:"GET"}).success(function(data){
		$scope.stands = data;
	});

	$scope.asignar = function(){
			$scope.Persona.clave = $scope.Persona.carnet;
	}

  $scope.guardarPersona = function(){
		$scope.mostrar = "SI";
    PersonalRecursos.save($scope.Persona, function(data){
          var respuesta = data['respuesta'];
          if(respuesta == '200_OK'){
            $scope.panel = "alert alert-info";
            $scope.msj = "Se inserto el dato correctamente "+data['msj'];
						$timeout(function(){
				      $location.path('/lista');
				    }, 1000);
          }else{
            $scope.panel = "alert alert-danger";
            $scope.msj = "Error: Intente nuevamente "+data['msj'];
          }
    });


  };
}])
.controller('EditarCtrl', ['$scope','$http', 'PersonalRecursos', '$location', '$timeout', '$routeParams', function($scope, $http, PersonalRecursos, $location, $timeout, $routeParams){
  $scope.titulo = " Editar Horario";
  $scope.botonIcono = "fa fa-pencil";
  $scope.boton = "Actualizar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-warning";
  $scope.Persona = PersonalRecursos.get({
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
			$scope.Persona.imagen	= canvas.toDataURL('image/png');
	}


	var link = "../index.php/horario";
	$http({url:link, method:"GET"}).success(function(data){
		$scope.horarios = data;
	});

	var link = "../index.php/stand";
	$http({url:link, method:"GET"}).success(function(data){
		$scope.stands = data;
	});


  $scope.guardarHorario = function(){
    HorarioRecursos.update($scope.Horario, function(data){
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


}])
.controller('EliminarCtrl', ['$scope', 'PersonalRecursos', '$routeParams', '$location', '$timeout', function($scope, PersonalRecursos, $routeParams, $location, $timeout){
  $scope.titulo = "Eliminar horario";
  $scope.icono = "file-text-o";
  $scope.Personal = PersonalRecursos.get({
    id: $routeParams.id
  });
  $scope.eliminarPersonal = function(id){
    PersonalRecursos.delete({
      id: id
    });
    $timeout(function(){
      $location.path('/lista');
    }, 100);
  };
}]);

</script>

@endsection
