@extends('layouts.venta')

@section('titulo')
Comidas
@endsection

@section('piso')
2
@endsection
@section('1') btn btn-default @endsection
@section('2') btn btn-info @endsection
@section('3') btn btn-default @endsection
@section('4') btn btn-default @endsection
@section('5') btn btn-default @endsection
@section('6') btn btn-default @endsection

@section('cuerpo')
<table border="0">
      <tr>
        <td>
          <table border="0">
            <tr><!-- Arriba -->
              <td>
                <table border="1">
                  <tr>
                    <table border="1">
                    <?php
                      $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                                  ->join('users', 'puestos.user_id', '=', 'users.id')
                                                  ->where('puestos.lado', '=', 'P1A1')
                                                  ->select('puestos.*', 'costos.tipo', 'costos.precio', 'users.name')->orderBy('puestos.id', 'asc')->get();
                      ?>
                      @foreach($datos as $dato)
                      <?php
                        $area = explode(" x ", $dato->dimension);
                        $area = $area[0] * $area[1];
                      ?>
                      @if( $dato->estado == 'N' )
                        <?php $estado = "No vendido"; $estilo="background-color:#cff4d3;"; ?>
                        <td class="puestoArriba" style="{{ $estilo }}"> <a href="{{ asset('index.php/Cobro/Reserva/'.$dato->id.'-'.$pagina)}}" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }} <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b>  {{ $dato->name }} "> Puesto {{ $dato->id }}</a> </td>
                      @elseif( $dato->estado == 'R' )
                        <?php $estado = "Reservado"; $estilo="background-color:#ffd49c;";  ?>
                        <td class="puestoArriba" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} " href="{{ asset('index.php/Cobro/Eliminar/'.$dato->id.'-'.$pagina)}}" style="color:#ff5555;"> Puesto {{ $dato->id }} <i class="fa fa-trash"></i> </a>   </td>
                      @elseif( $dato->estado == 'V' )
                        <?php $estado = "Vendido";   $estilo="background-color:#ff5d5d;"; ?>
                        <td class="puestoArriba" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} "> Puesto {{ $dato->id }} </a> </td>
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
                        <?php
                          $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                                      ->join('users', 'puestos.user_id', '=', 'users.id')
                                                      ->where('puestos.lado', '=', 'P1A2')
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
                            <tr><td class="puestoCostado" style="{{ $estilo }}"> <a href="{{ asset('index.php/Cobro/Reserva/'.$dato->id.'-'.$pagina)}}" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }} <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b>  {{ $dato->name }} "> Puesto {{ $dato->id }}</a> </td></tr>
                          @elseif( $dato->estado == 'R' )
                            <?php $estado = "Reservado"; $estilo="background-color:#ffd49c; padding: 3px;";  ?>
                            <tr><td class="puestoCostado" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} " href="{{ asset('index.php/Cobro/Eliminar/'.$dato->id.'-'.$pagina)}}" style="color:#ff5555;"> Puesto {{ $dato->id }} <i class="fa fa-trash"></i> </a>   </td></tr>
                          @elseif( $dato->estado == 'V' )
                            <?php $estado = "Vendido";   $estilo="background-color:#ff5d5d; padding: 3px;"; ?>
                            <tr><td class="puestoCostado" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} "> Puesto {{ $dato->id }} </a> </td></tr>
                          @endif
                          @endforeach
                      </table>
                    </td>
                    <td><!-- C2 -->
                      <table>
                        <tr>
                          <!--<td class="passilloMedio"> <center>P<br>A<br>S<br>I<br>L<br>L<br>O<center> </td>-->
                          <td class="passilloMedio"> <center>  <i class="fa fa-arrow-up" style="font-size:24px" ></i><br><br><br>P<br>A<br>S<br>I<br>L<br>L<br>O<br><br><br><i class="fa fa-arrow-up" style="font-size:24px" ></i><center> </td>
                        </tr>
                      </table>
                    </td>
                    <td><!-- C3 -->
                      <table border="1">
                        <?php
                          $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                                      ->join('users', 'puestos.user_id', '=', 'users.id')
                                                      ->where('puestos.lado', '=', 'P1A3')
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
                            <tr><td class="puestoCostado" style="{{ $estilo }}"> <a href="{{ asset('index.php/Cobro/Reserva/'.$dato->id.'-'.$pagina)}}" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }} <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b>  {{ $dato->name }} "> Puesto {{ $dato->id }}</a> </td></tr>
                          @elseif( $dato->estado == 'R' )
                            <?php $estado = "Reservado"; $estilo="background-color:#ffd49c; padding: 3px;";  ?>
                            <tr><td class="puestoCostado" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} " href="{{ asset('index.php/Cobro/Eliminar/'.$dato->id.'-'.$pagina)}}" style="color:#ff5555;"> Puesto {{ $dato->id }} <i class="fa fa-trash"></i> </a>   </td></tr>
                          @elseif( $dato->estado == 'V' )
                            <?php $estado = "Vendido";   $estilo="background-color:#ff5d5d; padding: 3px;"; ?>
                            <tr><td class="puestoCostado" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} "> Puesto {{ $dato->id }} </a> </td></tr>
                          @endif
                          @endforeach
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
            <td class="escaleraGuido"><center><i class="fa fa-arrow-circle-down" style="font-size:24px"></i><br>E<br>S<br>C<br>A<br>L<br>E<br>R<br>A<br>S<br><br>S<br>U<br>B<br>I<br>D<br>A<br> <i class="fa fa-arrow-circle-down" style="font-size:24px" ></i> </center></td>
          </tr>

        </table></td>

        <td><table border="0">
          <tr><!-- Arriba -->
            <td>
              <table border="1">
                <tr>
                    <?php
                      $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                                  ->join('users', 'puestos.user_id', '=', 'users.id')
                                                  ->where('puestos.lado', '=', 'P1B1')
                                                  ->select('puestos.*', 'costos.tipo', 'costos.precio', 'users.name')->orderBy('puestos.id', 'asc')->get();
                      ?>
                      @foreach($datos as $dato)
                      <?php
                        $area = explode(" x ", $dato->dimension);
                        $area = $area[0] * $area[1];
                      ?>
                      @if( $dato->estado == 'N' )
                        <?php $estado = "No vendido"; $estilo="background-color:#cff4d3;"; ?>
                        <td class="puestoArriba" style="{{ $estilo }}"> <a href="{{ asset('index.php/Cobro/Reserva/'.$dato->id.'-'.$pagina)}}" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }} <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b>  {{ $dato->name }} "> Puesto {{ $dato->id }}</a> </td>
                      @elseif( $dato->estado == 'R' )
                        <?php $estado = "Reservado"; $estilo="background-color:#ffd49c;";  ?>
                        <td class="puestoArriba" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} " href="{{ asset('index.php/Cobro/Eliminar/'.$dato->id.'-'.$pagina)}}" style="color:#ff5555;"> Puesto {{ $dato->id }} <i class="fa fa-trash"></i> </a>   </td>
                      @elseif( $dato->estado == 'V' )
                        <?php $estado = "Vendido";   $estilo="background-color:#ff5d5d;"; ?>
                        <td class="puestoArriba" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} "> Puesto {{ $dato->id }} </a> </td>
                      @endif
                      @endforeach
                  </tr>
              </table>
            </td>
            <td width="15%"> <i class="fa fa-arrow-up" style="font-size:24px"></i></td>
          </tr>
          <tr><!-- Passillo -->
            <td colspan="2">
              <table>
                <tr>
                  <td class="passillo1"> <center>PASILLO<center> </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr><!-- Abajo -->
            <td colspan="2">
              <table>
                <tr>
                  <td><!-- C1 -->
                    <table border="1">
                        <?php
                          $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                                      ->join('users', 'puestos.user_id', '=', 'users.id')
                                                      ->where('puestos.lado', '=', 'P1B2')
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
                            <tr><td class="puestoCostado" style="{{ $estilo }}"> <a href="{{ asset('index.php/Cobro/Reserva/'.$dato->id.'-'.$pagina)}}" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }} <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b>  {{ $dato->name }} "> Puesto {{ $dato->id }}</a> </td></tr>
                          @elseif( $dato->estado == 'R' )
                            <?php $estado = "Reservado"; $estilo="background-color:#ffd49c; padding: 3px;";  ?>
                            <tr><td class="puestoCostado" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} " href="{{ asset('index.php/Cobro/Eliminar/'.$dato->id.'-'.$pagina)}}" style="color:#ff5555;"> Puesto {{ $dato->id }} <i class="fa fa-trash"></i> </a>   </td></tr>
                          @elseif( $dato->estado == 'V' )
                            <?php $estado = "Vendido";   $estilo="background-color:#ff5d5d; padding: 3px;"; ?>
                            <tr><td class="puestoCostado" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} "> Puesto {{ $dato->id }} </a> </td></tr>
                          @endif
                          @endforeach
                      </table>
                  </td>
                  <td><!-- C2 -->
                    <table>
                      <tr>
                        <!--<td class="passilloMedio"> <center>P<br>A<br>S<br>I<br>L<br>L<br>O<center> </td>-->
                        <td class="passilloMedio"> <center>  <i class="fa fa-arrow-up" style="font-size:24px" ></i><br><br><br>P<br>A<br>S<br>I<br>L<br>L<br>O<br><br><br><i class="fa fa-arrow-up" style="font-size:24px" ></i><center> </td>
                      </tr>
                    </table>
                  </td>
                  <td><!-- C3 -->
                    <table border="1">
                      <?php
                        $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                                    ->join('users', 'puestos.user_id', '=', 'users.id')
                                                    ->where('puestos.lado', '=', 'P1B3')
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
                          <tr><td class="puestoCostado" style="{{ $estilo }}"> <a href="{{ asset('index.php/Cobro/Reserva/'.$dato->id.'-'.$pagina)}}" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }} <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b>  {{ $dato->name }} "> Puesto {{ $dato->id }}</a> </td></tr>
                        @elseif( $dato->estado == 'R' )
                          <?php $estado = "Reservado"; $estilo="background-color:#ffd49c; padding: 3px;";  ?>
                          <tr><td class="puestoCostado" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} " href="{{ asset('index.php/Cobro/Eliminar/'.$dato->id.'-'.$pagina)}}" style="color:#ff5555;"> Puesto {{ $dato->id }} <i class="fa fa-trash"></i> </a>   </td></tr>
                        @elseif( $dato->estado == 'V' )
                          <?php $estado = "Vendido";   $estilo="background-color:#ff5d5d; padding: 3px;"; ?>
                          <tr><td class="puestoCostado" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} "> Puesto {{ $dato->id }} </a> </td></tr>
                        @endif
                        @endforeach
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
            <?php
              $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                          ->join('users', 'puestos.user_id', '=', 'users.id')
                                          ->where('puestos.lado', '=', 'P1D1')
                                          ->select('puestos.*', 'costos.tipo', 'costos.precio', 'users.name')->orderBy('puestos.id', 'asc')->get();
              ?>
              @foreach($datos as $dato)
              <?php
                $area = explode(" x ", $dato->dimension);
                $area = $area[0] * $area[1];
              ?>
              @if( $dato->estado == 'N' )
                <?php $estado = "No vendido"; $estilo="background-color:#cff4d3;"; ?>
                <td class="puestoCostadoGuido" style="{{ $estilo }}"> <a href="{{ asset('index.php/Cobro/Reserva/'.$dato->id.'-'.$pagina)}}" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }} <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b>  {{ $dato->name }} "> Puesto {{ $dato->id }}</a> </td>
              @elseif( $dato->estado == 'R' )
                <?php $estado = "Reservado"; $estilo="background-color:#ffd49c;";  ?>
                <td class="puestoCostadoGuido" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} " href="{{ asset('index.php/Cobro/Eliminar/'.$dato->id.'-'.$pagina)}}" style="color:#ff5555;"> Puesto {{ $dato->id }} <i class="fa fa-trash"></i> </a>   </td>
              @elseif( $dato->estado == 'V' )
                <?php $estado = "Vendido";   $estilo="background-color:#ff5d5d;"; ?>
                <td class="puestoCostadoGuido" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} "> Puesto {{ $dato->id }} </a> </td>
              @endif
              @endforeach
          </tr>
          <tr>
            <td class="escaleraGuido"><center><i class="fa fa-arrow-circle-up" style="font-size:24px" ></i><br>E<br>S<br>C<br>A<br>L<br>E<br>R<br>A<br>S<br><br>B<br>A<br>J<br>A<br>D<br>A<br><i class="fa fa-arrow-circle-up" style="font-size:24px" ></i></center></td>
          </tr>
        </table></td>


        <td><table border="1"><!-- Nuevo fila -->
          <tr><!-- Arriba -->
            <td>
              <table border="1">
                <tr>
                  <?php
                    $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                                ->join('users', 'puestos.user_id', '=', 'users.id')
                                                ->where('puestos.lado', '=', 'P1C1')
                                                ->select('puestos.*', 'costos.tipo', 'costos.precio', 'users.name')->orderBy('puestos.id', 'asc')->get();
                    ?>
                    @foreach($datos as $dato)
                    <?php
                      $area = explode(" x ", $dato->dimension);
                      $area = $area[0] * $area[1];
                    ?>
                    @if( $dato->estado == 'N' )
                      <?php $estado = "No vendido"; $estilo="background-color:#cff4d3;"; ?>
                      <td class="puestoArriba" style="{{ $estilo }}"> <a href="{{ asset('index.php/Cobro/Reserva/'.$dato->id.'-'.$pagina)}}" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }} <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b>  {{ $dato->name }} ">Puesto {{ $dato->id }}</a> </td>
                    @elseif( $dato->estado == 'R' )
                      <?php $estado = "Reservado"; $estilo="background-color:#ffd49c;";  ?>
                      <td class="puestoArriba" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} " href="{{ asset('index.php/Cobro/Eliminar/'.$dato->id.'-'.$pagina)}}" style="color:#ff5555;"> Puesto {{ $dato->id }} <i class="fa fa-trash"></i> </a>   </td>
                    @elseif( $dato->estado == 'V' )
                      <?php $estado = "Vendido";   $estilo="background-color:#ff5d5d;"; ?>
                      <td class="puestoArriba" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} "> Puesto {{ $dato->id }} </a> </td>
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
                      <?php
                        $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                                    ->join('users', 'puestos.user_id', '=', 'users.id')
                                                    ->where('puestos.lado', '=', 'P1C2')
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
                          <tr><td class="puestoCostado" style="{{ $estilo }}"> <a href="{{ asset('index.php/Cobro/Reserva/'.$dato->id.'-'.$pagina)}}" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }} <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b>  {{ $dato->name }} "> Puesto {{ $dato->id }}</a> </td></tr>
                        @elseif( $dato->estado == 'R' )
                          <?php $estado = "Reservado"; $estilo="background-color:#ffd49c; padding: 3px;";  ?>
                          <tr><td class="puestoCostado" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} " href="{{ asset('index.php/Cobro/Eliminar/'.$dato->id.'-'.$pagina)}}" style="color:#ff5555;"> Puesto {{ $dato->id }} <i class="fa fa-trash"></i> </a>   </td></tr>
                        @elseif( $dato->estado == 'V' )
                          <?php $estado = "Vendido";   $estilo="background-color:#ff5d5d; padding: 3px;"; ?>
                          <tr><td class="puestoCostado" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} "> Puesto {{ $dato->id }} </a> </td></tr>
                        @endif
                        @endforeach
                    </table>
                  </td>
                  <td><!-- C2 -->
                    <table>
                      <tr>
                        <td class="passilloMedio"> <center>  <i class="fa fa-arrow-down" style="font-size:24px" ></i><br><br><br>P<br>A<br>S<br>I<br>L<br>L<br>O<br><br><br><i class="fa fa-arrow-down" style="font-size:24px" ></i><center> </td>
                      </tr>
                    </table>
                  </td>
                  <td><!-- C3 -->
                    <table border="1">
                      <tr><td class="mesas"> <a class="mesas"> MESAS  </td></tr>
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
