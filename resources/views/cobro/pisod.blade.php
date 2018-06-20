<table border="1">
  <tr>
    <td>
      <table border="1">
        <tr>
          <td class="banio" style=" background-color:#f7952d;; color:white;"> BAÑO </td>
          <?php
          $sql = mysql_query(
            "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
            "INNER JOIN costos ON puestos.id_costo = costos.id  ".
            "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
            "where puestos.lado = 'P3A1' order by puestos.nombre asc ", $cn);
            while( $f = mysql_fetch_array($sql) ){
              $area = explode('x', $f[6]);
              $area = $area[0] * $area[1];
              if($f[7] == 'N') {
                $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                echo '<td class="puestoArriba" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td>';
              }
              elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                echo '<td class="puestoArriba" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>   <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td>';
              }
              elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                echo '<td class="puestoArriba" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td>';
              }
            }
          ?>

          <?php
          $sql = mysql_query(
            "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
            "INNER JOIN costos ON puestos.id_costo = costos.id  ".
            "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
            "where puestos.lado = 'P3A2' order by puestos.nombre asc ", $cn);
            while( $f = mysql_fetch_array($sql) ){
              $area = explode('x', $f[6]);
              $area = $area[0] * $area[1];
              if($f[7] == 'N') {
                $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                echo '<td class="puestoCostado" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td>';
              }
              elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                echo '<td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>   <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td>';
              }
              elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                echo '<td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td>';
              }
            }
          ?>

          <?php
          $sql = mysql_query(
            "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
            "INNER JOIN costos ON puestos.id_costo = costos.id  ".
            "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
            "where puestos.lado = 'P3A3' order by puestos.nombre asc ", $cn);
            while( $f = mysql_fetch_array($sql) ){
              $area = explode('x', $f[6]);
              $area = $area[0] * $area[1];
              if($f[7] == 'N') {
                $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
                echo '<td class="puestoArriba" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td>';
              }
              elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
                echo '<td class="puestoArriba" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>   <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td>';
              }
              elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
                echo '<td class="puestoArriba" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td>';
              }
            }
          ?>

          <td class="banio" style=" background-color:#f7952d;; color:white;"> BAÑO </td>
        </tr>
      </table>
    </td>
  </tr>

  <tr>
    <td style="height:100px;"></td>
  </tr>

  <tr>
    <td><center>
    <table border="0">
      <tr>
        <td class="ladoIzquiero" style="width:250px;  background-color:gray; color:white;">  Pared  </td>
        <?php
        $sql = mysql_query(
          "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
          "INNER JOIN costos ON puestos.id_costo = costos.id  ".
          "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
          "where puestos.lado = 'P3A4' order by puestos.nombre asc ", $cn);
          while( $f = mysql_fetch_array($sql) ){
            $area = explode('x', $f[6]);
            $area = $area[0] * $area[1];
            if($f[7] == 'N') {
              $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
              echo '<td class="puestoCostado" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td>';
            }
            elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
              echo '<td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>   <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td>';
            }
            elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
              echo '<td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td>';
            }
          }
        ?>

        <td class="banio" style="background-color:gray; color:white;"> Escaleras </td>

        <?php
        $sql = mysql_query(
          "select puestos.*, costos.tipo, costos.precio, usuarios.nombres from puestos ".
          "INNER JOIN costos ON puestos.id_costo = costos.id  ".
          "INNER JOIN usuarios ON puestos.id_usuario = usuarios.id  ".
          "where puestos.lado = 'P3A5' order by puestos.nombre asc ", $cn);
          while( $f = mysql_fetch_array($sql) ){
            $area = explode('x', $f[6]);
            $area = $area[0] * $area[1];
            if($f[7] == 'N') {
              $estado = "No vendido";  $estilo="background-color:#cff4d3; ";
              echo '<td class="puestoCostado" style="'.$estilo.'"> <a href="reserva.php?puesto='.$f[0].'&planta='.$_GET['planta'].'" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td>';
            }
            elseif ($f[7] == 'R') {$estado = "Reservado"; $estilo="background-color:#ffd49c;";
              echo '<td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a>   <a href="eliminarReserva.php?id='.$f[0].'&planta='. addslashes($_GET['planta']).'" style="color:#ff5555;"> <i class="fa fa-trash"></i> </a>   </td>';
            }
            elseif ($f[7] == 'V') {$estado = "Vendido";   $estilo="background-color:#ff5d5d;";
              echo '<td class="puestoCostado" style="'.$estilo.'"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> '.$f[3].'<br>  <b>Precio:</b> '.$f[10].' Bs.<br> <b>Tipo:</b> '.$f[9].'<br> <b>Dimension:</b>  '.$f[6].' m. <br> <b>Estado:</b>  '.$estado.' <br> <b>Area:</b>  '.$area.' <br> <b>Usuario:</b>  '.$f[11].' ">'.$f[3].'</a> </td>';
            }
          }
        ?>
        <td class="ladoDerecho"  style="width:250px; background-color:gray; color:white;">  Pared  </td>
      </tr>
    </table>
  </center></td>
  </tr>

</table>
