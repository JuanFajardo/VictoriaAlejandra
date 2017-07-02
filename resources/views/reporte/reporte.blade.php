<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <!-- <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{asset('css/pdf.css')}}">
  </head>
  <body>

    <main>
      <div class="col md-12">
        guido lopez
      </div>
      <div id="details" class="clearfix">
        <div id="invoice center-align">
          <h1>INVOICE {{ $invoice }}</h1>
          <div class="date">Fecha de generacion: {{ date('d/m/Y') }}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">N°</th>
            <th class="desc">Nombres y Apellidos</th>
            <th class="unit">C.I.</th>
            <th class="total">Fecha Inscripcion</th>
            <th class="unit">Horario</th>
            <th class="total">Stand</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td class="no">{{ $datos['nombres'] }}</td>
            <td class="desc">{{ $datos['carnet'] }}</td>
            <td class="unit">{{ $datos['fecha_inscripcion'] }}</td>
            <td class="total">{{ $datos['horario_id'] }} </td>
            <td class="unit">{{ $datos['stand_id'] }}</td>
            <!-- <td class="">{{ $datos['total'] }} </td> -->
          </tr>

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
