@extends('layouts.venta')

@section('cuerpo')
<table border="0">
      <tr>
        <td>
          <table border="0">
            <tr><!-- Arriba -->
              <td>
                <table border="1">
                  <tr>
                    <?php
                      $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                                  ->join('users', 'puestos.user_id', '=', 'users.id')
                                                  ->where('puestos.lado', '=', 'P0A1')
                                                  ->select('puestos.*', 'costos.tipo', 'costos.precio', 'users.name')
                                                  ->orderBy('puestos.id', 'asc')
                                                  ->get();
                      ?>
                      @foreach($datos as $dato)
                      <?php
                        $area = explode(" x ", $dato->dimension);
                        $area = $area[0] * $area[1];
                      ?>
                      @if( $dato->estado == 'N' )
                        <?php $estado = "No vendido"; $estilo="background-color:#cff4d3; padding: 3px;"; ?>
                        <td class="puestoArriba" style="{{ $estilo }}"> <a href="reserva.php?puesto={{ $dato->id }}&planta={{ $dato->id }}" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }} <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b>  {{ $dato->name }} "> Piso {{ $dato->id }}</a> </td>
                      @elseif( $dato->estado == 'R' )
                        <?php $estado = "Reservado"; $estilo="background-color:#ffd49c; padding: 3px;";  ?>
                        <td class="puestoArriba" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} "> Piso {{ $dato->id }} </a>   <a href="eliminarReserva.php?id=Piso {{ $dato->id }}&planta=1" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td>
                      @elseif( $dato->estado == 'V' )
                        <?php $estado = "Vendido";   $estilo="background-color:#ff5d5d; padding: 3px;"; ?>
                        <td class="puestoArriba" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} "> Piso {{ $dato->id }} </a> </td>
                      @endif
                      @endforeach




                  </tr>
                </table>
              </td>
            </tr>
            <tr><!-- Passillo -->
              <td>
                <table>
                  <tr>
                    <td class="passillo1"> <center>PASILLO<center> </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr><!-- Abajo -->
              <td>
                <table>
                  <tr>
                    <td><!-- C1 -->
                      <table border="1">
                        <?php/*
                        $sql = mysqli_query($cn,
                          "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
                          "INNER JOIN costos ON puestos.id_costo = costos.id  ".
                          "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
                          "where puestos.lado = 'P0A2' order by puestos.nombre desc ");
                          $cont= 0;
                          while( $f = mysqli_fetch_array($sql) ){
                            $area = explode('x', $f[6]);
                            $area = $area[0] * $area[1];
                            if($f[7] == 'N') {
                              $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                              echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].'  ">'.$f[3].'</a> </td></tr>';
                            }
                            elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                              echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>  <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td></tr>';
                            }
                            elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                              echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                            }
                          }*/
                        ?>
                      </table>
                    </td>
                    <td><!-- C2 -->
                      <table>
                        <tr>
                          <td class="passilloMedio"> <center>P<br>A<br>S<br>I<br>L<br>L<br>O<center> </td>
                        </tr>
                      </table>
                    </td>
                    <td><!-- C3 -->
                      <table border="1">
                        <?php/*
                        $sql = mysqli_query($cn,
                          "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
                          "INNER JOIN costos ON puestos.id_costo = costos.id  ".
                          "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
                          "where puestos.lado = 'P0A3' order by puestos.nombre asc ");
                          while( $f = mysqli_fetch_array($sql) ){
                            $area = explode('x', $f[6]);
                            $area = $area[0] * $area[1];
                            if($f[7] == 'N') {
                              $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                              echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                            }
                            elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                              echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'   <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>   <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td></tr>';
                            }
                            elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                              echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                            }
                          }*/
                        ?>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>

        <td><table>
          <tr>
            <td class="banioGuido"><center>BAÑOS</center></td>
          </tr>
          <tr>
            <td class="pasilloCostadoGuido"></td>
          </tr>
          <tr>
            <td class="escaleraGuido"><center>E<br>S<br>C<br>A<br>L<br>E<br>R<br>A<br>S<br><br>S<br>U<br>B<br>I<br>D<br>A</center></td>
          </tr>

        </table></td>



        <td><table border="0">
          <tr><!-- Arriba -->
            <td>
              <table border="1">
                <tr>
                  <?php/*
                  $sql = mysqli_query($cn,
                    "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
                    "INNER JOIN costos ON puestos.id_costo = costos.id  ".
                    "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
                    "where puestos.lado = 'P0B1' order by puestos.nombre asc ");
                    while( $f = mysqli_fetch_array($sql) ){
                      $area = explode('x', $f[6]);
                      $area = $area[0] * $area[1];
                      if($f[7] == 'N') {
                        $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                        echo '<td class="puestoArriba" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td>';
                      }
                      elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                        echo '<td class="puestoArriba" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>   <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td>';
                      }
                      elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                        echo '<td class="puestoArriba" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td>';
                      }
                    }*/
                  ?>
                </tr>
              </table>
            </td>
          </tr>
          <tr><!-- Passillo -->
            <td>
              <table>
                <tr>
                  <td class="passillo1" > <center>PASILLO<center> </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr><!-- Abajo -->
            <td>
              <table>
                <tr>
                  <td><!-- C1 -->
                    <table border="1">
                      <?php/*
                      $sql = mysqli_query($cn,
                        "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
                        "INNER JOIN costos ON puestos.id_costo = costos.id  ".
                        "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
                        "where puestos.lado = 'P0B2' order by puestos.nombre desc ");
                        while( $f = mysqli_fetch_array($sql) ){
                          $area = explode('x', $f[6]);
                          $area = $area[0] * $area[1];
                          if($f[7] == 'N') {
                            $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                            echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                          }
                          elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                            echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>   <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td></tr>';
                          }
                          elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                            echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].'  ">'.$f[3].'</a> </td></tr>';
                          }
                        }*/
                      ?>
                    </table>
                  </td>
                  <td><!-- C2 -->
                    <table>
                      <tr>
                        <td class="passilloMedio"> <center>P<br>A<br>S<br>I<br>L<br>L<br>O<center> </td>
                      </tr>
                    </table>
                  </td>
                  <td><!-- C3 -->
                    <table border="1">
                      <?php/*
                      $sql = mysqli_query($cn,
                        "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
                        "INNER JOIN costos ON puestos.id_costo = costos.id  ".
                        "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
                        "where puestos.lado = 'P0B3' order by puestos.nombre asc ");
                        while( $f = mysqli_fetch_array($sql) ){
                          $area = explode('x', $f[6]);
                          $area = $area[0] * $area[1];
                          if($f[7] == 'N') {
                            $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                            echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                          }
                          elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                            echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>   <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td></tr>';
                          }
                          elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                            echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                          }
                        }*/
                      ?>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table></td>



        <td><table>
          <tr>
            <td class="banioGuido"><center>BAÑOS</center></td>
          </tr>
          <tr>
            <?php/*
            $sql = mysqli_query($cn,
              "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
              "INNER JOIN costos ON puestos.id_costo = costos.id  ".
              "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
              "where puestos.lado = 'P0D1' order by puestos.nombre asc ");
              while( $f = mysqli_fetch_array($sql) ){
                $area = explode('x', $f[6]);
                $area = $area[0] * $area[1];
                if($f[7] == 'N') {
                  $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                  echo '<td class="puestoCostadoGuido" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td>';
                }
                elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                  echo '<td class="puestoCostadoGuido" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>   <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td>';
                }
                elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                  echo '<td class="puestoCostadoGuido" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].'  ">'.$f[3].'</a> </td>';
                }
              }*/
            ?>
          </tr>
          <tr>
            <td class="escaleraGuido"><center>E<br>S<br>C<br>A<br>L<br>E<br>R<br>A<br>S<br><br>B<br>A<br>J<br>A<br>D<br>A</center></td>
          </tr>
        </table></td>


        <td><table border="0">
          <tr><!-- Arriba vestidores -->
            <td class = "vestidoresGuido" style=" background-color:gray; color:white;">
              <center>VESTIDORES</center>
            </td>
          </tr>
          <tr><!-- Passillo -->
            <td>
              <table>
                <tr>
                  <td class="passillo1"> <center>PASILLO<center> </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr><!-- Abajo -->
            <td>
              <table>
                <tr>
                  <td><!-- C1 -->
                    <table border="1">
                      <?php/*
                      $sql = mysqli_query($cn,
                        "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
                        "INNER JOIN costos ON puestos.id_costo = costos.id  ".
                        "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
                        "where puestos.lado = 'P0C2'  order by puestos.id asc ");
                        while( $f = mysqli_fetch_array($sql) ){
                          $area = explode('x', $f[6]);
                          $area = $area[0] * $area[1];
                          if($f[7] == 'N') {
                            $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                            echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].'  ">'.$f[3].'</a> </td></tr>';
                          }
                          elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                            echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].'  ">'.$f[3].'</a>   <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td></tr>';
                          }
                          elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                            echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].'  ">'.$f[3].'</a> </td></tr>';
                          }
                        }*/
                      ?>
                    </table>
                  </td>
                  <td><!-- C2 -->
                    <table>
                      <tr>
                        <td class="passilloMedio"> <center>P<br>A<br>S<br>I<br>L<br>L<br>O<center> </td>
                      </tr>
                    </table>
                  </td>
                  <td><!-- C3 -->
                    <table border="1">
                      <?php /*
                      $sql = mysqli_query($cn,
                        "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
                        "INNER JOIN costos ON puestos.id_costo = costos.id  ".
                        "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
                        "where puestos.lado = 'P0C3' order by puestos.id asc ");
                        while( $f = mysqli_fetch_array($sql) ){
                          $area = explode('x', $f[6]);
                          $area = $area[0] * $area[1];
                          if($f[7] == 'N') {
                            $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                            echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].'  ">'.$f[3].'</a> </td></tr>';
                          }
                          elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                            echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>   <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td></tr>';
                          }
                          elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                            echo '<tr><td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.'  <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                          }
                        }*/
                      ?>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table></td>
      </tr>
    </table>

@endsection
