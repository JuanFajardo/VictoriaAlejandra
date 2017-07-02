<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//www.google.com/recaptcha/api.js?render=explicit&onload=vcRecaptchaApiLoaded" async defer></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/angular-recaptcha/4.1.0/angular-recaptcha.js'></script>
  </head>
  <body ng-app="AdycttoBett0" class="grey darken-2">
    <div class="container ">

      <div class="row">
          <div class="col-lg-12">
              @yield('cuerpo')
          </div>
      </div>

    </div>

    <!-- <script src="{{asset('assets/js/jquery.js')}}"></script> -->
    <script src="{{asset('assets/js/materialize.min.js')}}"></script>


    <script src="{{asset('assets/angular/angular.min.js')}}"></script>
    <script src="{{asset('assets/angular/angular-resource.js')}}"></script>
    <script src="{{asset('assets/angular/angular-route.js')}}"></script>
    <script src="{{asset('assets/angular/angular-animate.js')}}"></script>
    @yield('js')
  </body>
</html>
