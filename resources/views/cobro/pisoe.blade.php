@extends('layouts.venta')

@section('titulo')
Piso 4
@endsection

@section('piso')
4
@endsection
@section('1') btn btn-default @endsection
@section('2') btn btn-default @endsection
@section('3') btn btn-default @endsection
@section('4') btn btn-default @endsection
@section('5') btn btn-info @endsection
@section('6') btn btn-default @endsection

@section('cuerpo')
  <table border="1">
  <tr>
    <td>
      <table border="1">
        <tr>
          <td class="banio" style=" background-color:#f7952d;; color:white;"> BAÑO </td>
          <?php
            $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                        ->join('users', 'puestos.user_id', '=', 'users.id')
                                        ->where('puestos.lado', '=', 'P4A1')
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

          <?php
            $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                        ->join('users', 'puestos.user_id', '=', 'users.id')
                                        ->where('puestos.lado', '=', 'P4A2')
                                        ->select('puestos.*', 'costos.tipo', 'costos.precio', 'users.name')->orderBy('puestos.id', 'asc')->get();
            ?>
            @foreach($datos as $dato)
            <?php
              $area = explode(" x ", $dato->dimension);
              $area = $area[0] * $area[1];
            ?>
            @if( $dato->estado == 'N' )
              <?php $estado = "No vendido"; $estilo="background-color:#cff4d3;"; ?>
              <td class="puestoCostado" style="{{ $estilo }}"> <a href="{{ asset('index.php/Cobro/Reserva/'.$dato->id.'-'.$pagina)}}" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }} <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b>  {{ $dato->name }} "> Puesto {{ $dato->id }}</a> </td>
            @elseif( $dato->estado == 'R' )
              <?php $estado = "Reservado"; $estilo="background-color:#ffd49c;";  ?>
              <td class="puestoCostado" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} " href="{{ asset('index.php/Cobro/Eliminar/'.$dato->id.'-'.$pagina)}}" style="color:#ff5555;"> Puesto {{ $dato->id }} <i class="fa fa-trash"></i> </a>   </td>
            @elseif( $dato->estado == 'V' )
              <?php $estado = "Vendido";   $estilo="background-color:#ff5d5d;"; ?>
              <td class="puestoCostado" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} "> Puesto {{ $dato->id }} </a> </td>
            @endif
            @endforeach

          <?php
            $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                        ->join('users', 'puestos.user_id', '=', 'users.id')
                                        ->where('puestos.lado', '=', 'P4A3')
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
          $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                      ->join('users', 'puestos.user_id', '=', 'users.id')
                                      ->where('puestos.lado', '=', 'P4A4')
                                      ->select('puestos.*', 'costos.tipo', 'costos.precio', 'users.name')->orderBy('puestos.id', 'asc')->get();
          ?>
          @foreach($datos as $dato)
          <?php
            $area = explode(" x ", $dato->dimension);
            $area = $area[0] * $area[1];
          ?>
          @if( $dato->estado == 'N' )
            <?php $estado = "No vendido"; $estilo="background-color:#cff4d3;"; ?>
            <td class="puestoCostado" style="{{ $estilo }}"> <a href="{{ asset('index.php/Cobro/Reserva/'.$dato->id.'-'.$pagina)}}" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }} <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b>  {{ $dato->name }} "> Puesto {{ $dato->id }}</a> </td>
          @elseif( $dato->estado == 'R' )
            <?php $estado = "Reservado"; $estilo="background-color:#ffd49c;";  ?>
            <td class="puestoCostado" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} " href="{{ asset('index.php/Cobro/Eliminar/'.$dato->id.'-'.$pagina)}}" style="color:#ff5555;"> Puesto {{ $dato->id }} <i class="fa fa-trash"></i> </a>   </td>
          @elseif( $dato->estado == 'V' )
            <?php $estado = "Vendido";   $estilo="background-color:#ff5d5d;"; ?>
            <td class="puestoCostado" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} "> Puesto {{ $dato->id }} </a> </td>
          @endif
          @endforeach
        <td class="banio" style="background-color:gray; color:white;"> Escaleras </td>
        <?php
          $datos = \DB::table('puestos')->join('costos', 'puestos.costo_id', '=', 'costos.id')
                                      ->join('users', 'puestos.user_id', '=', 'users.id')
                                      ->where('puestos.lado', '=', 'P4A5')
                                      ->select('puestos.*', 'costos.tipo', 'costos.precio', 'users.name')->orderBy('puestos.id', 'asc')->get();
          ?>
          @foreach($datos as $dato)
          <?php
            $area = explode(" x ", $dato->dimension);
            $area = $area[0] * $area[1];
          ?>
          @if( $dato->estado == 'N' )
            <?php $estado = "No vendido"; $estilo="background-color:#cff4d3;"; ?>
            <td class="puestoCostado" style="{{ $estilo }}"> <a href="{{ asset('index.php/Cobro/Reserva/'.$dato->id.'-'.$pagina)}}" data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }} <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b>  {{ $dato->name }} "> Puesto {{ $dato->id }}</a> </td>
          @elseif( $dato->estado == 'R' )
            <?php $estado = "Reservado"; $estilo="background-color:#ffd49c;";  ?>
            <td class="puestoCostado" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} " href="{{ asset('index.php/Cobro/Eliminar/'.$dato->id.'-'.$pagina)}}" style="color:#ff5555;"> Puesto {{ $dato->id }} <i class="fa fa-trash"></i> </a>   </td>
          @elseif( $dato->estado == 'V' )
            <?php $estado = "Vendido";   $estilo="background-color:#ff5d5d;"; ?>
            <td class="puestoCostado" style="{{ $estilo }}"> <a data-toggle="tooltip" data-placement="left" data-html="true" title="<b>Nombre:</b> {{ $dato->id }} <br>  <b>Precio:</b> {{ $dato->precio }} Bs.<br> <b>Tipo:</b> {{ $dato->tipo }} <br> <b>Dimension:</b>  {{ $dato->dimension }} m. <br> <b>Estado:</b>  {{ $estado }}  <br> <b>Area:</b>  {{ $area }} <br> <b>Usuario:</b> {{ $dato->name }} "> Puesto {{ $dato->id }} </a> </td>
          @endif
          @endforeach
        <td class="ladoDerecho"  style="width:250px; background-color:gray; color:white;">  Pared  </td>
      </tr>
    </table>
  </center></td>
  </tr>

</table>
@endsection
