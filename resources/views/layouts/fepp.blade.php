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
    <link href="{{asset('assets/css/sb-admin.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/plugins/morris.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/timepicker/jquery.timepicker.css')}}" rel="stylesheet" type="text/css">

</head>

<body ng-app="AdycttoBett0">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Federacion de Empresarios Privados</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li><a href="#">Alert Name <span class="label label-default">Alert Badge</span></a></li>
                        <li><a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a></li>
                        <li><a href="#">Alert Name <span class="label label-success">Alert Badge</span></a></li>
                        <li><a href="#">Alert Name <span class="label label-info">Alert Badge</span></a></li>
                        <li><a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a></li>
                        <li><a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-fw fa-user"></i> Profile</a></li>
                        <li><a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="@yield('menu1')">
                        <a href="index.html"><i class="fa fa-fw fa-home"></i> Inicio</a>
                    </li>
                    <li class="@yield('menu2')">
                        <a href="{{asset('index.php/Personal#/lista')}}"><i class="fa fa-fw fa-users"></i> Personal</a>
                    </li>
                    <li class="@yield('menu3')">
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Registro</a>
                    </li>
                    <li class="@yield('menu4')">
                        <a href="{{asset('index.php/Horario#/lista')}}"><i class="fa fa-fw fa-edit"></i> Horario</a>
                    </li>
                    <li class="@yield('menu5')">
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-file-pdf-o"></i> Reportes</a>
                    </li>
                    <li class="@yield('menu6')">
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-bar-chart-o"></i> Estadisticas</a>
                    </li>
                    <li class="@yield('menu7')">
                        <a href="blank-page.html"><i class="fa fa-fw fa-user"></i> Usuarios</a>
                    </li>
                    <li class="@yield('menu8')">
                        <a href="{{asset('index.php/Stand#/lista')}}"><i class="fa fa-fw fa-dashboard"></i> Stands</a>
                    </li>
                    <li class="@yield('menu9')">
                        <a href="{{asset('index.php/Cargo#/lista')}}"><i class="fa fa-fw fa-dashboard"></i> Cargo</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('titulo')</h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        @yield('cuerpo')
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/timepicker/jquery.timepicker.js')}}"></script>
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
