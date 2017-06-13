<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link href="{{asset('assets/css/materialize.min.css')}}" rel="stylesheet">

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
    <div class="container">
    </div>

    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/materialize.min.js')}}"></script>

    <script src="{{asset('assets/angular/angular.min.js')}}"></script>
    <script src="{{asset('assets/angular/angular-resource.js')}}"></script>
    <script src="{{asset('assets/angular/angular-route.js')}}"></script>
    <script src="{{asset('assets/angular/angular-animate.js')}}"></script>
    <script src="{{asset('assets/angular-datatables/angular-datatables.min.js')}}"></script>
    <script src="{{asset('assets/angular-datatables/jquery.dataTables.min.js')}}"></script>
    @yield('js')
  </body>
</html>
