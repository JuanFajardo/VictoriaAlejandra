<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <!-- <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{asset('css/pdf.css')}}">
  </head>
  <body style="width:21cm;">

    <main>
      <div id="details" class="clearfix">

        <img src="{{asset('img/logo_fepp.jpg')}}" width="50" style="float:left; width:50px;">
        <label for=""><strong><h2>FEDERACION DE EMPRESARIOS PRIVADOS POTOSI</h2></strong></label>
        <div class=""><strong>Reporte Registros</strong></div>
        <label for=""><strong><h3>del {{$fecha_inicio}} al {{$fecha_fin}}</h3></strong></label>
        <div >Fecha de generacion: {{ date('d/m/Y') }}</div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="total">N°</th>
            <th class="total">Fecha</th>
            <th class="total">Nombres y Apellidos</th>
            <th class="total">Ingreso A.M.</th>
            <th class="total">Salida A.M.</th>
            <th class="total">Retraso A.M.</th>
            <th class="total">Ingreso P.M.</th>
            <th class="total">Salida P.M.</th>
            <th class="total">Retraso P.M.</th>
          </tr>
        </thead>
        <tbody>
          @foreach($datos as $data)
          <tr>
            <td class="unit">1</td>
            <td class="unit">{{ $data->fecha }}</td>
            <td class="unit">{{ $data->no }}</td>
            <td class="unit">{{ $data->ingreso_am }} </td>
            <td class="unit">{{ $data->salida_am }}</td>
            <td class="unit">{{ $data->retraso_am }}</td>
            <td class="unit">{{ $data->ingreso_pm }} </td>
            <td class="unit">{{ $data->salida_pm }} </td>
            <td class="unit">{{ $data->retraso_pm }} </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td >TOTAL</td>
            <td>$6,500.00</td>
          </tr>
        </tfoot>
      </table>
      <!-- <script src="{{asset('assets/js/bootstrap.min.js')}}"></script> -->
  </body>
</html>
