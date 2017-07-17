<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/plugins/morris.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.css
" rel="stylesheet" type="text/css">

</head>

<body ng-app="AdycttoBett0">
      <div class="row">
        <div class="col-lg-12">
          @yield('cuerpo')
        </div>
      </div>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.js
"></script>
    <!-- <script src="{{asset('assets/js/plugins/morris/raphael.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/morris/morris-data.js')}}"></script> -->

    <script src="{{asset('assets/angular/angular.min.js')}}"></script>
    <script src="{{asset('assets/angular/angular-resource.js')}}"></script>
    <script src="{{asset('assets/angular/angular-route.js')}}"></script>
    <script src="{{asset('assets/angular/angular-animate.js')}}"></script>
    <script src="{{asset('assets/angular-datatables/angular-datatables.min.js')}}"></script>
    <script src="{{asset('assets/angular-datatables/jquery.dataTables.min.js')}}"></script>
    @yield('js')
</body>
</html>
