@extends('layouts.venta')

@section('titulo')
Automoviles
@endsection

@section('piso')
1
@endsection
@section('1') btn btn-info @endsection
@section('2') btn btn-default @endsection
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
                      <?php
                        $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                                    ->join('users', 'puestos.user_id', '=', 'users.id')
                                                    ->where('puestos.lado', '=', 'P0A1')
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
                <td >
                  <table border="0" width="100%">
                    <tr>
                      <td width="2%" style="background-color:#f7952d; border:1px solid black;"> ||| </td>
                      <td class="passillo1"> <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        PASILLO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" style="font-size:24px" ></i><center> </td>
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
                                                        ->where('puestos.lado', '=', 'P0A2')
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
                            <tr> <td>Stand Externo</td> </tr>
                        </table>
                      </td>
                      <td><!-- C2 -->
                        <table>
                          <tr>
                            <td class="passilloMedio"> <center>  <i class="fa fa-arrow-up" style="font-size:24px" ></i><br><br><br>P<br>A<br>S<br>I<br>L<br>L<br>O<br><br><br><i class="fa fa-arrow-up" style="font-size:24px" ></i><center> </td>
                          </tr>
                        </table>
                      </td>
                      <td><!-- C3 -->
                        <table border="1">
                          <?php
                            $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                                        ->join('users', 'puestos.user_id', '=', 'users.id')
                                                        ->where('puestos.lado', '=', 'P0A3')
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
                        <table width="100%">
                          <tr><td> <center><i class="fa fa-arrow-left" style="font-size:24px" ></i> <center> </td></tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
          <td>
            <table border="0">
              <tr>
                <td class="banioGuido"><center>BAÑOS</center></td>
              </tr>
              <tr>
                <td class="escaleraGuido"><center><i class="fa fa-arrow-circle-down" style="font-size:36px"></i><br>E<br>S<br>C<br>A<br>L<br>E<br>R<br>A<br>S<br><br>S<br>U<br>B<br>I<br>D<br>A<br> <i class="fa fa-arrow-circle-down" style="font-size:36px" ></i> </center></td>
              </tr>
              <tr>
                <td>
                  <table border="1" width="100%">
                    <tr> <td> <center> Stand Externo </center>  </td> </tr>
                  </table>
                </td>
              </tr>
              <tr><td> <center><i class="fa fa-arrow-left" style="font-size:24px"></i></center> </td></tr>
            </table>
          </td>
          <td><table border="0">
            <tr><!-- Arriba -->
              <td>
                <table border="1">
                  <tr>
                    <?php
                      $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                                  ->join('users', 'puestos.user_id', '=', 'users.id')
                                                  ->where('puestos.lado', '=', 'P0B1')
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
                    <td style="background-color:#f7952d; border:1px solid black;"> ||| </td>
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

                    <td class="passillo1" > <center> PASILLO &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-left" style="font-size:24px" ></i> <center> </td>
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
                                                      ->where('puestos.lado', '=', 'P0B2')
                                                      ->select('puestos.*', 'costos.tipo', 'costos.precio', 'users.name') ->orderBy('puestos.id', 'asc')->get();
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
                      <table width="100%">
                        <tr>
                          <tr style="border:none;"><td style="border:none;"> <center><i class="fa fa-arrow-left" style="font-size:24px" ></i> <center> </td></tr>
                        </tr>
                      </table>
                    </td>
                    <td><!-- C2 -->
                      <table>
                        <tr>
                          <td class="passilloMedio"> <center> <i class="fa fa-arrow-down" style="font-size:24px" ></i> <br><br><br>P<br>A<br>S<br>I<br>L<br>L<br>O<br><br><br><i class="fa fa-arrow-down" style="font-size:24px" ></i><center> </td>
                        </tr>
                      </table>
                    </td>
                    <td><!-- C3 -->
                      <table border="1">
                        <?php
                          $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                                      ->join('users', 'puestos.user_id', '=', 'users.id')
                                                      ->where('puestos.lado', '=', 'P0B3')
                                                      ->select('puestos.*', 'costos.tipo', 'costos.precio', 'users.name') ->orderBy('puestos.id', 'asc')->get();
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
                          <tr> <td>Stand Externo</td> </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table></td>

          <td><table border="0">
            <tr>
              <td class="banioGuido"><center>BAÑOS</center></td>
            </tr>
            <tr>
              <td class="pasilloCostadoGuido"> <center><i class="fa fa-arrow-left" style="font-size:24px" ></i></center>  </td>
            </tr>

            <!--<tr>
              <?php
                $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                              ->join('users', 'puestos.user_id', '=', 'users.id')
                                              ->where('puestos.lado', '=', 'P0D1')
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
            </tr>-->
            <tr>
              <td class="escaleraGuido"><center><i class="fa fa-arrow-circle-up" style="font-size:36px" ></i><br>E<br>S<br>C<br>A<br>L<br>E<br>R<br>A<br>S<br><br>B<br>A<br>J<br>A<br>D<br>A<br><i class="fa fa-arrow-circle-up" style="font-size:36px" ></i></center></td>
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
                <table border='0' width="100%">
                  <tr>
                    <td class="passillo1" >
                      <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-left" style="font-size:24px" ></i>&nbsp;&nbsp;
                      PASILLO &nbsp;&nbsp;  <i class="fa fa-arrow-left" style="font-size:24px" ></i> <center>
                    </td>
                    <td width="31%" style="background-color:#bdeff9;"> <center>INGRESO</center> </td>
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
                                                      ->where('puestos.lado', '=', 'P0C2')
                                                      ->select('puestos.*', 'costos.tipo', 'costos.precio', 'users.name') ->orderBy('puestos.id', 'asc')->get();
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
                      <table border="0">
                        <tr>
                          <td><i class="fa fa-arrow-up" style="font-size:24px" ></i></td>
                          <td class="passilloMedio"> <center><br>P<br>A<br>S<br>I<br>L<br>L<br>O<br><center> </td>
                          <td><i class="fa fa-arrow-down" style="font-size:24px" ></i></td>
                        </tr>
                      </table>
                    </td>
                    <td><!-- C3 -->
                      <table border="1">
                          <?php
                          $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                                      ->join('users', 'puestos.user_id', '=', 'users.id')
                                                      ->where('puestos.lado', '=', 'P0C3')
                                                      ->select('puestos.*', 'costos.tipo', 'costos.precio', 'users.name') ->orderBy('puestos.id', 'asc')->get();
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
        </tr>
      </table>

  @endsection
