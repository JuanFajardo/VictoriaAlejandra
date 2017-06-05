@extends('layouts.fepp')

@section('title')
Stands
@endsection

@section('menu8')
active
@endsection

@section('titulo')
Stand
@endsection


@section('icono')
glyphicon glyphicon-list-alt
@endsection

@section('tituloPanel')
Lista de Stands
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
          templateUrl: '../angular/views/stand/lista.html',
          controller: 'ListaCtrl'
        })
        .when('/crear', {
          templateUrl: '../angular/views/stand/crear.html',
          controller: 'CrearCtrl'
        })
        .when('/editar/:id', {
          templateUrl: '../angular/views/stand/crear.html',
          controller: 'EditarCtrl'
        })
        .when('/ver/:id', {
          templateUrl: '../angular/views/stand/ver.html',
          controller: 'VerCtrl'
        })
        .when('/eliminar/:id', {
          templateUrl: '../angular/views/stand/eliminar.html',
          controller: 'EliminarCtrl'
        })
});
///Servicio de Angular para Dosificaciones
var va = angular.module('AdycttoBett0');
va.factory('StandRecursos', function($resource){
  return $resource('../index.php/stand/:id', { id:"@id"}, { update: { method: "PUT" } } );
})
///Controladores de Angular para Dosificaciones
.controller('ListaCtrl', ['$scope', 'StandRecursos', '$location', '$timeout', 'DTOptionsBuilder', 'DTColumnBuilder', function($scope, StandRecursos, $location, $timeout, DTOptionsBuilder, DTColumnBuilder){
  $scope.stands = StandRecursos.query();
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
.controller('CrearCtrl', ['$scope', 'StandRecursos', '$location', '$timeout', function($scope, StandRecursos, $location, $timeout){
  $scope.titulo = 'Crear Stand';
  $scope.boton = "Guardar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-primary";
  $scope.Stand={};
  var base64="";
  $(document).ready(function(){
  $("#logo").change(function(){
    var ArchivoSeleccionado = document.getElementById("logo").files;
    if(ArchivoSeleccionado.length > 0){
      var FileToLoad = ArchivoSeleccionado[0];
      var fileReader = new FileReader();
      fileReader.onload = function(fileLoadedEvent){
        base64 = fileLoadedEvent.target.result;
        console.log(base64);
        document.getElementById("preview").setAttribute("src",base64);
        $("#preview").show();
      };
      fileReader.readAsDataURL(FileToLoad);
    }
  });
});



  $scope.guardarStand = function(){
    $scope.Stand['logo'] = base64;
    StandRecursos.save($scope.Stand, function(data){
          var respuesta = data['respuesta'];
          if(respuesta == '200_OK'){
            $scope.panel = "alert alert-info";
            $scope.msj = "Se inserto el dato correctamente ";
            $timeout(function(){
              $location.path('/lista');
            }, 1500);
          }else{
            $scope.panel = "alert alert-danger";
            $scope.msj = respuesta;
          }
    });
  /*$timeout(function(){
  $location.path('/lista');
  }, 1500);*/
  };
}])
.controller('EditarCtrl', ['$scope', 'StandRecursos', '$location', '$timeout', '$routeParams', function($scope, StandRecursos, $location, $timeout, $routeParams){
  $scope.titulo = " Editar Stand";
  $scope.botonIcono = "fa fa-pencil";
  $scope.boton = "Actualizar";
	$scope.botonIcono = "fa fa-save"
  $scope.accion = "btn btn-warning";
  $scope.Stand = StandRecursos.get({
    id: $routeParams.id
  });

  $scope.guardarStand = function(){
    StandRecursos.update($scope.Stand, function(data){
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

    /*$timeout(function(){
      $location.path('/lista');
    }, 1500);*/
  }
}])
.controller('EliminarCtrl', ['$scope', 'StandRecursos', '$routeParams', '$location', '$timeout', function($scope, StandRecursos, $routeParams, $location, $timeout){
  $scope.titulo = "Eliminar stand";
  $scope.icono = "file-text-o";
  $scope.Stand = StandRecursos.get({
    id: $routeParams.id
  });
  $scope.eliminarStand = function(id){
    StandRecursos.delete({
      id: id
    });
    $timeout(function(){
      $location.path('/lista');
    }, 100);
  };
}]);

</script>
@endsection
