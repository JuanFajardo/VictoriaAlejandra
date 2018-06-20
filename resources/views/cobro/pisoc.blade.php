<table border="0">
      <tr>
        <td>
          <?php $cont = 0; ?>
          <table border="0">
            <tr><!-- Arriba -->
              <td>
                <table border="1">
                  <tr>
                    <?php
                    $sql = mysql_query(
                      "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
                      "INNER JOIN costos ON puestos.id_costo = costos.id  ".
                      "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
                      "where puestos.lado = 'P2A1' order by puestos.nombre asc ", $cn);
                      while( $f = mysql_fetch_array($sql) ){
                        $area = explode('x', $f[6]);
                        $area = $area[0] * $area[1];
                        if($f[7] == 'N') {
                          $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                          echo '<td class="puestoArriba3Guido" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td>';
                        }
                        elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                          echo '<td class="puestoArriba3Guido" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>   <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td>';
                        }
                        elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                          echo '<td class="puestoArriba3Guido" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td>';
                        }
                      }
                    ?>
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
                        <?php
                        $sql = mysql_query(
                          "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
                          "INNER JOIN costos ON puestos.id_costo = costos.id  ".
                          "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
                          "where puestos.lado = 'P2A2' order by puestos.nombre desc ", $cn);
                          $cont= 0;
                          while( $f = mysql_fetch_array($sql) ){
                            $area = explode('x', $f[6]);
                            $area = $area[0] * $area[1];
                            if($f[7] == 'N') {
                              $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                              echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                            }
                            elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                              echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>  <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td></tr>';
                            }
                            elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                              echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                            }
                          }
                        ?>
                      </table>
                    </td>
                    <td><!-- C2 -->
                      <table>
                        <tr>
                          <td class="passilloMedioGuido1"> <center>P<br>A<br>S<br>I<br>L<br>L<br>O<center> </td>
                        </tr>
                      </table>
                    </td>
                    <td><!-- C1 -->
                      <table border="1">
                        <?php
                        $sql = mysql_query(
                          "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
                          "INNER JOIN costos ON puestos.id_costo = costos.id  ".
                          "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
                          "where puestos.lado = 'P2A3' order by puestos.nombre asc ", $cn);
                          $cont= 0;
                          while( $f = mysql_fetch_array($sql) ){
                            $area = explode('x', $f[6]);
                            $area = $area[0] * $area[1];
                            if($f[7] == 'N') {
                              $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                              echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                            }
                            elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                              echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>  <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td></tr>';
                            }
                            elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                              echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                            }
                          }
                        ?>
                      </table>
                    </td>
                    <td><!-- C1 -->
                      <table border="1">
                          <?php
                          $sql = mysql_query(
                            "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
                            "INNER JOIN costos ON puestos.id_costo = costos.id  ".
                            "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
                            "where puestos.lado = 'P2A4' order by puestos.nombre desc ", $cn);
                            $cont= 0;
                            while( $f = mysql_fetch_array($sql) ){
                              $area = explode('x', $f[6]);
                              $area = $area[0] * $area[1];
                              if($f[7] == 'N') {
                                $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                                echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                              }
                              elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                                echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>  <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td></tr>';
                              }
                              elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                                echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                              }
                            }
                          ?>
                      </table>

                    </td>

                    <td><!-- C2 -->
                      <table>
                        <tr>
                          <td class="passilloMedioGuido1"> <center>P<br>A<br>S<br>I<br>L<br>L<br>O<center> </td>
                        </tr>
                      </table>
                    </td>
                    <td><!-- C1 -->
                      <table border="1">
                          <?php
                          $sql = mysql_query(
                            "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
                            "INNER JOIN costos ON puestos.id_costo = costos.id  ".
                            "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
                            "where puestos.lado = 'P2A5' order by puestos.nombre asc ", $cn);
                            $cont= 0;
                            while( $f = mysql_fetch_array($sql) ){
                              $area = explode('x', $f[6]);
                              $area = $area[0] * $area[1];
                              if($f[7] == 'N') {
                                $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                                echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                              }
                              elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                                echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>  <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td></tr>';
                              }
                              elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                                echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                              }
                            }
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
            <td class="escaleraGuido3"><center>E<br>S<br>C<br>A<br>L<br>E<br>R<br>A<br>S<br><br>S<br>U<br>B<br>I<br>D<br>A</center></td>
          </tr>

        </table></td>



        <td><table border="0">
          <tr><!-- Arriba -->
            <td>
              <table border="1">
                <tr>
                    <?php
                    $sql = mysql_query(
                      "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
                      "INNER JOIN costos ON puestos.id_costo = costos.id  ".
                      "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
                      "where puestos.lado = 'P2B1' order by puestos.nombre asc ", $cn);
                      while( $f = mysql_fetch_array($sql) ){
                        $area = explode('x', $f[6]);
                        $area = $area[0] * $area[1];
                        if($f[7] == 'N') {
                          $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                          echo '<td class="puestoArriba3Guido" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td>';
                        }
                        elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                          echo '<td class="puestoArriba3Guido" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>   <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td>';
                        }
                        elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                          echo '<td class="puestoArriba3Guido" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td>';
                        }
                      }
                    ?>
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
                      <?php
                      $sql = mysql_query(
                        "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
                        "INNER JOIN costos ON puestos.id_costo = costos.id  ".
                        "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
                        "where puestos.lado = 'P2B2' order by puestos.nombre desc ", $cn);
                        $cont= 0;
                        while( $f = mysql_fetch_array($sql) ){
                          $area = explode('x', $f[6]);
                          $area = $area[0] * $area[1];
                          if($f[7] == 'N') {
                            $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                            echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                          }
                          elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                            echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>  <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td></tr>';
                          }
                          elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                            echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                          }
                        }
                      ?>
                    </table>
                  </td>
                  <td><!-- C2 -->
                    <table>
                      <tr>
                        <td class="passilloMedioGuido1"> <center>P<br>A<br>S<br>I<br>L<br>L<br>O<center> </td>
                      </tr>
                    </table>
                  </td>
                  <td><!-- C1 -->
                    <table border="1">
                        <?php
                        $sql = mysql_query(
                          "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
                          "INNER JOIN costos ON puestos.id_costo = costos.id  ".
                          "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
                          "where puestos.lado = 'P2B3' order by puestos.nombre asc ", $cn);
                          $cont= 0;
                          while( $f = mysql_fetch_array($sql) ){
                            $area = explode('x', $f[6]);
                            $area = $area[0] * $area[1];
                            if($f[7] == 'N') {
                              $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                              echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                            }
                            elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                              echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>  <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td></tr>';
                            }
                            elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                              echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                            }
                          }
                        ?>
                    </table>
                  </td>
                  <td><!-- C1 -->
                    <table border="1">
                        <?php
                        $sql = mysql_query(
                          "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
                          "INNER JOIN costos ON puestos.id_costo = costos.id  ".
                          "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
                          "where puestos.lado = 'P2B4' order by puestos.nombre desc ", $cn);
                          $cont= 0;
                          while( $f = mysql_fetch_array($sql) ){
                            $area = explode('x', $f[6]);
                            $area = $area[0] * $area[1];
                            if($f[7] == 'N') {
                              $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                              echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                            }
                            elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                              echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>  <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td></tr>';
                            }
                            elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                              echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                            }
                          }
                        ?>
                    </table>

                  </td>

                  <td><!-- C2 -->
                    <table>
                      <tr>
                        <td class="passilloMedioGuido1"> <center>P<br>A<br>S<br>I<br>L<br>L<br>O<center> </td>
                      </tr>
                    </table>
                  </td>
                  <td><!-- C1 -->
                    <table border="1">
                        <?php
                        $sql = mysql_query(
                          "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
                          "INNER JOIN costos ON puestos.id_costo = costos.id  ".
                          "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
                          "where puestos.lado = 'P2B5' order by puestos.id asc ", $cn);
                          $cont= 0;
                          while( $f = mysql_fetch_array($sql) ){
                            $area = explode('x', $f[6]);
                            $area = $area[0] * $area[1];
                            if($f[7] == 'N') {
                              $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                              echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                            }
                            elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                              echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>  <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td></tr>';
                            }
                            elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                              echo '<tr><td class="puestoCostadoGuido3" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td></tr>';
                            }
                          }
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
            <td class="pasilloCostadoGuido"></td>
          </tr>
          <tr>
            <td class="escaleraGuido3"><center>E<br>S<br>C<br>A<br>L<br>E<br>R<br>A<br>S<br><br>B<br>A<br>J<br>A<br>D<br>A</center></td>
          </tr>

        </table></td>




        <td><table border="0">
          <tr><!-- Arriba vestidores -->
            <td class = "juegosGuido">
              <center><br>S<br>E<br>C<br>T<br>O<br>R<br><br>J<br>U<br>E<br>G<br>O<br>S</center>
            </td>
          </tr>
        </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
