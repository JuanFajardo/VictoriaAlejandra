<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('titulo') </title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estiloPuestos.css') }}">

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  </head>

  <?php/*
    if( isset($_GET['msj']) ){
      if($_GET['msj'] == '1'){
        echo '<body onload="alert(\' SE  RESERVO\')">';
      }elseif($_GET['msj'] == '0'){
        echo '<body onload="alert(\' NO SE PUEDE RESERVAR\')">';
      }
    }
    include("cabecera.php");*/
  ?>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">FEIPOBOL </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse my-2 my-lg-0">
        <ul class="nav navbar-nav">
          <li><a href="{{asset('index.php/Cobro/Reporte/Ver')}}">Reporte</a></li>
          <li><a href="{{asset('index.php/Cobro/Eliminados/Ver')}}">Eliminar</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="#"> {{ \Auth::user()->username }} </a></li>
          <li><a href="destruirSesion.php">Cerrar Sesion</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container theme-showcase">
    <div class="row">
      <div class="col-md-12"> &nbsp; </div>
    </div>
    <br>
      <div class="row">
        <div class="col-md-6">
            <div class="form-inline">
              <div class="col-md-12">
                <a href="{{asset('index.php/Cobro/Piso/1')}}" class="@yield('1')"> MOVILIDADS </a>
                <a href="{{asset('index.php/Cobro/Piso/2')}}" class="@yield('2')"> COMIDAS </a>
                <a href="{{asset('index.php/Cobro/Piso/3')}}" class="@yield('3')"> PYMES </a>
                <a href="{{asset('index.php/Cobro/Piso/4')}}" class="@yield('4')"> BEBIDAS </a>
                <a href="{{asset('index.php/Cobro/Piso/5')}}" class="@yield('5')"> EXTRA </a>
              </div>
            </div>
        </div>

        <div class="col-md-2">
          <p>
            <?php
              $reservaPersonal = \DB::table('puestos')->where('estado', '=', 'R')->where('user_id', '=', \Auth::user()->id)->count();
            ?>
             <button type="button" class="btn btn-primary"  id="vender" data-toggle="modal" data-target="#myModal"> Reservados: <span class="badge"> {{$reservaPersonal}} </span></button>
          </p>
        </div>
        <div class="col-md-2">
          <p>
            <?php
              $vendidoPersonal = \DB::table('puestos')->where('estado', '=', 'V')->where('user_id', '=', \Auth::user()->id)->count();
            ?>
            <button type="button" class="btn btn-primary"> Vendidos: <span class="badge"> {{$vendidoPersonal}} </span></button>
          </p>
        </div>
        <div class="col-md-2">
          <p>
            <?php
            $montoPersonal = \DB::table('cobros')->where('user_id', '=', \Auth::user()->id)->get();
            $suma = 0;
            foreach ($montoPersonal as $dato) {
              $suma = $suma + $dato->monto;
            }
            ?>
            <button type="button" class="btn btn-primary"> Total  <span class="badge"> {{$suma}} </span> Bs.</button>
          </p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
            <br/>
          @yield('cuerpo')
        </div>
      </div>
    </div>


    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Venta de puestos</h4>
          </div>
          <div class="modal-body">
              {!! Form::open(['accept-charset'=>'UTF-8', 'method'=>'POST', 'autocomplete'=>'off', 'id'=>'form-insert', 'action'=>'CobroController@vender']) !!}
              <label for=""> Nombre de la Empresa:</label>
              <input type="text" name="empresa" value="" class="form-control" placeholder="Nombre de la Empresa" list="lista-stand" required>
              <?php $stands = \DB::table('stands')->select('nom_empresa')->get(); ?>
              <datalist id="lista-stand">
                @foreach($stands as $stand)
                  <option value="{{ $stand->nom_empresa }}">
                @endforeach
              </datalist>
              <div class="row">
                <div class="col-md-8">
                  <label for=""> Nombre del Encargado:</label>
                  <input type="text" name="nombre" value="" class="form-control" placeholder="Nombre del encargado" required>
                </div>
                <div class="col-md-4">
                  <label for=""> Telefono/Celular:</label>
                  <input type="text" name="telefono" value="" class="form-control" placeholder="Telefono/Celular" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for=""> Precio Total:</label>
                  <input type="text" name="precio1" value="" class="form-control" placeholder="Bs." id="precioModal" required>
                </div>
                <div class="col-md-6">
                  <label for="">  Otro Precio Total  o Adelanto:</label>
                  <input type="text" name="precio2" value="" class="form-control" placeholder="Bs.">
                  <input type="hidden" name="planta" value="@yield('piso')" >
                </div>
              </div>
              <input type="submit" class="btn btn-primary"  value="Vender">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Puesto</th> <th>Dimension</th> <th>Precio</th> <th>Eliminar</th>
                  </tr>
                </thead>
                <tbody id="puestosVenta">
                  <?php
                  $reservas = \DB::table('puestos')->join('costos', 'puestos.costo_id', 'costos.id')
                                               ->where('puestos.user_id', '=', \Auth::user()->id)
                                               ->where('puestos.estado', '=', 'R')
                                               ->select('puestos.*', 'costos.tipo', 'costos.precio')->get();
                  ?>
                  @foreach($reservas as $reserva)
                  <tr>
                    <td> <input type='checkbox' onclick="marcar('{{$reserva->id}}','{{$reserva->precio}}','{{$reserva->nombre}}')"> Puesto {{$reserva->id}}</td>
                    <td> {{$reserva->dimension}} </td>
                    <td> {{$reserva->precio}}  </td>
                    <td> <a href="{{ asset('index.php/Cobro/Eliminar/'.$reserva->id)}}-@yield('piso')" class='btn btn-danger'> Eliminar </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <br>
              <input type="hidden" name="ventas" id="ventas">
              <input type="hidden" name="numero" id="numero">
              <input type="submit" class="btn btn-primary"  value="Vender">
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>

  </body>
  <script type="text/javascript">
    $('a').click(function(e){
      e.preventDefault();
      var link = $(this).attr('href');
      if(confirm('¿ Ejecutar el comando ? ')) {
        alert(link);
         window.location = link;
      }
    });

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

    var numero = 0;
    var total  = 0.0;
    function marcar(id, precio, nombre){
      var ventas = $('#ventas').val();
      ventas = ventas + id + "|" + precio + "|" + nombre + ", ";
      $('#ventas').val(ventas);
      numero = numero + 1;
      total = parseFloat(total) + parseFloat(precio);
      $('#numero').val(numero);
      $('#precioModal').val(total);

    }

    $('#vender').click(function(event){
      event.preventDefault();
      var fila = $(this).parents('tr');
      var id = fila.data('id');
      link  = 'consultaReserva.php';
      $.getJSON(link, function(data, textStatus) {
        if(data.length > 0){
          var suma = 0;
          $.each(data, function(index, el) {
            $('#puestosVenta').append("<tr>"+
                                    "<td> <input type='checkbox' onclick=\"marcar('" + el.id + "', '"+el.precio+"', '"+el.nombre+"')\"> " + el.nombre + " </td>"+
                                    "<td> " + el.dimension + " m. </td>"+
                                    "<td> " + el.precio + " </td>"+
                                    "<td> <a href='eliminarReserva.php?id="+el.id+"&planta=696<?php // echo $_GET['planta']; ?>' class='btn btn-danger'> Eliminar </td>"+
                                    "</tr>");
          suma = suma + parseInt(el.precio) ;
          });
          $('#precioModal').val(suma);

        }
      });
    });
  </script>
</html>
