<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> FEPP - Feipobol </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="estilo.css">
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
    <div class="container theme-showcase">
      <div class="row">
        <div class="col-md-12"> &nbsp; </div>
      </div>


      <br><br>
      <div class="row">
        <div class="col-md-3">
          <div class="card card-inverse text-center" style="background-color:#5cc0de; color:#fff; -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px;">
              <blockquote class="card-blockquote">
                <p>Puestos Reservados:
                  <?php/*
                   $sql = "";
                   if($_SESSION['tipo'] == '2'){
                      $sql = mysqli_query($cn, "select count(*) from puestos where estado='R' ");
                   }else{
                     $sql = mysqli_query($cn, "select count(*) from puestos where estado='R' and id_usuario='".$usuario."'");
                   }
                    $f = mysqli_fetch_array($sql); */
                  ?>
                   <button type="button" class="btn btn-primary"  id="vender" data-toggle="modal" data-target="#myModal"> Vender <span class="badge"> 000 <?php // echo $f[0];  ?> </span></button>
                </p>
              </blockquote>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-inverse card-primary mb-3 text-center" style="background-color:#5cc0de; color:#fff; -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px;">
            <div class="card-block">
              <blockquote class="card-blockquote">
                <p>Puestos Vendidos:
                  <?php/*
                  $sql = "";
                  if($_SESSION['tipo'] == '2'){
                    $sql = mysqli_query($cn, "select count(*) from puestos where estado='V' ");
                  }else{
                    $sql = mysqli_query($cn, "select count(*) from puestos where estado='V' and id_usuario='".$usuario."'");
                  }
                    $f = mysqli_fetch_array($sql);
                    */
                  ?>
                  <button type="button" class="btn btn-primary"> Total <span class="badge"> 0001 <?php // echo $f[0];  ?> </span></button>
                </p>
              </blockquote>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-inverse card-primary mb-3 text-center" style="background-color:#5cc0de; color:#fff; -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px;">
            <div class="card-block">
              <blockquote class="card-blockquote">
                <p>Monto Total en Bs:
                  <?php /*
                    $sql = "";
                    if($_SESSION['tipo'] == '2'){
                      $sql = mysqli_query($cn, "select monto from cobro group by empresa, encargado");
                    }else{
                      $sql = mysqli_query($cn, "select monto from cobro where id_usuario='".$usuario."' group by empresa, encargado");
                    }
                    $suma = 0;
                    while ( $f   = mysqli_fetch_array($sql) ){
                        $suma = $suma + $f[0];
                    } */
                  ?>
                  <button type="button" class="btn btn-primary"> Total <span class="badge"> 0002 <?php // echo $suma;  ?> </span></button>
                </p>
              </blockquote>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <form action="index.php" method="get">
            <div class="form-inline">
              <?php// if($_SESSION['tipo'] =='1' || $_SESSION['tipo'] =='2' ){?>
              <div class="col-md-2">
                <label class="label" style="color:black;"> Elegir la planta : </label>
              </div>
              <div class="col-md-3">
                <select class="form-control" name="planta">
                  <?php // if( isset($_GET['planta']) ) { ?>

                  <?php// }else{ ?>
                    <option value=""> </option>
                    <option value="1"> Planta Baja - Movilidades</option>
                    <option value="2"> Planta 1 - Comidas</option>
                    <option value="3"> Planta 2 - Pymes</option>
                    <option value="4"> Planta Baja - Bebidas</option>
                  <?php // } ?>
                </select>
              </div>
              <div class="col-md-3">
                <input type="submit" name="" value="Seleccionar" class="btn btn-primary">
              </div>
            <?php // } ?>
            </div>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <br/>
          @yield('cuerpo')
          <?php
          /*
            $op = isset( $_GET['planta']  ) ? $_GET['planta'] : " fepp";
            switch ($op) {
              case '1': include('pisoUno.php'); break;
              case '2': include('pisoDos.php'); break;
              case '3': include('pisoTres.php'); break;
              case '4': include('pisoCuatro.php'); break;
              /*
              case '5': include('lista.php'); break;
              case '6': include('eliminarVenta.php'); break;

              case '7': include('listaDinero.php'); break;
              case '8': include('listaImagen.php'); break;
              ///
              default: include('saludo.php'); break;
            }
            */
          ?>
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
            <form action="venderReserva.php" method="post">
              <label for=""> Nombre de la Empresa:</label>
              <input type="text" name="empresa" value="" class="form-control" placeholder="Nombre de la Empresa" required>
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
                  <input type="hidden" name="planta" value="0008  <?php // echo $_GET['planta']; ?>" >
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

                </tbody>
              </table>
              <br>
              <input type="hidden" name="ventas" id="ventas">
              <input type="hidden" name="numero" id="numero">
              <input type="submit" class="btn btn-primary"  value="Vender">
            </form>
          </div>
        </div>
      </div>
    </div>

  </body>
  <script>
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
