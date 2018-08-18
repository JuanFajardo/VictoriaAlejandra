@extends('layouts.venta')

@section('titulo')
Piso 4
@endsection

@section('piso')
3
@endsection
@section('1') btn btn-default @endsection
@section('2') btn btn-default @endsection
@section('3') btn btn-default @endsection
@section('4') btn btn-info @endsection
@section('5') btn btn-default @endsection
@section('6') btn btn-default @endsection

@section('cuerpo')
<table border="0">
  <tr>
    <td>
      <table border="0">
        <tr><!-- Arriba vestidores -->
          <td class = "juegosGuido">
            <b><center><br>S<br>A<br>L<br>A<br><br>D<br>E<br><br>C<br>O<br>N<br>F<br>E<br>R<br>E<br>N<br>C<br>I<br>A<br>S</center></b>
          </td>
        </tr>
      </table>
    </td>
    <td>
      <table>
        <tr>
          <td class="banioGuido"><center>BAÑOS</center></td>
        </tr>
        <tr>
          <td class="pasilloCostadoGuido"></td>
        </tr>
        <tr>
          <td class="escaleraGuido3"><center>E<br>S<br>C<br>A<br>L<br>E<br>R<br>A<br>S<br><br>S<br>U<br>B<br>I<br>D<br>A</center></td>
        </tr>
      </table>
    </td>

    <td>
      <table border="0">
        <tr><!-- Arriba vestidores -->
          <td class = "juegosGuido">
            <!--<b><center><br>S<br>A<br>L<br>A<br><br>D<br>E<br><br>C<br>O<br>N<br>F<br>E<br>R<br>E<br>N<br>C<br>I<br>A<br>S</center></b> -->
          </td>
        </tr>
      </table>
    </td>
    <td>
      <table>
        <tr>
          <td class="banioGuido"><center>BAÑOS</center></td>
        </tr>
        <tr>
          <td class="pasilloCostadoGuido"></td>
        </tr>
        <tr>
          <td class="escaleraGuido3"><center>E<br>S<br>C<br>A<br>L<br>E<br>R<br>A<br>S<br><br>S<br>U<br>B<br>I<br>D<br>A</center></td>
        </tr>
      </table>
    </td>

    <td>
      <!--
      <table border="1">
                <tr>
                    <?php
                      $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                                  ->join('users', 'puestos.user_id', '=', 'users.id')
                                                  ->where('puestos.lado', '=', 'P2B1')
                                                  ->select('puestos.*', 'costos.tipo', 'costos.precio', 'users.name')->orderBy('puestos.id', 'asc')->get();
                      ?>
                      @foreach($datos as $dato)
                      <?php
                        $area = explode(" x ", $dato->dimension);
                        $area = $area[0] * $area[1];
                      ?>
                      @if( $dato->estado == 'N' )
                        <?php $estado = "No vendido"; $estilo="background-color:#cff4d3;"; ?>
                        <td class="puestoArriba3Guido" style="{{ $estilo }}"> <a href="{{ asset('index.php/Cobro/Reserva/'.$dato->id.'-'.$pagina)}}" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }} <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b>  {{ $dato->name }} "> Puesto {{ $dato->id }}</a> </td>
                      @elseif( $dato->estado == 'R' )
                        <?php $estado = "Reservado"; $estilo="background-color:#ffd49c;";  ?>
                        <td class="puestoArriba3Guido" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} " href="{{ asset('index.php/Cobro/Eliminar/'.$dato->id.'-'.$pagina)}}" style="color:#ff5555;"> Puesto {{ $dato->id }} <i class="fa fa-trash"></i> </a>   </td>
                      @elseif( $dato->estado == 'V' )
                        <?php $estado = "Vendido";   $estilo="background-color:#ff5d5d;"; ?>
                        <td class="puestoArriba3Guido" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} "> Puesto {{ $dato->id }} </a> </td>
                      @endif
                      @endforeach
                </tr>
                <tr>
                  <td colspan="3"> <center>PASILLO </center></td>
                </tr>
                <tr>
                  <td colspan="3" style="width:150px; height:523px;background-color:#cff4d3;">
                    <b><center><br>M<br>E<br>S<br>A<br>S<br><br>C<br>H<br>U<br>R<br>R<br>A<br>S<br>Q<br>U<br>E<br>R<br>I<br>A<br></center></b>
                  </td>
                </tr>
              </table>
            -->


              <table border="1">
              <?php
                $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                            ->join('users', 'puestos.user_id', '=', 'users.id')
                                            ->where('puestos.lado', '=', 'P2B1')
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

            <tr>
              <td colspan="6"> <center>PASILLO </center></td>
            </tr>
            <tr>
              <td colspan="6" style="width:150px; height:523px;background-color:#cff4d3;">
                <b><center><br>M<br>E<br>S<br>A<br>S<br><br>C<br>H<br>U<br>R<br>R<br>A<br>S<br>Q<br>U<br>E<br>R<br>I<br>A<br></center></b>
              </td>
            </tr>

          </table>



    </td>
  </tr>
  </table>
  </td>
  </tr>
</table>
@endsection
