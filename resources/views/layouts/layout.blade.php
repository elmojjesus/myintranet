<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADFP - @yield('title')</title>
    <!-- Bootstrap Styles-->
    <link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="{{ URL::asset('assets/css/font-awesome.css') }}" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="{{ URL::asset('assets/css/custom-styles.css') }}" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/magnific-popup/magnific-popup.css') }}">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand" href="index.html"><img src="{{asset('assets/img/logo.png')}}" id="logo"></span>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> Meu perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="index.html"><i class=""></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class=""></i> Usuários<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Cadastrar</a>
                            </li>
                            <li>
                                <a href="#">Listar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="ui-elements.html"><i class=""></i> Esporte</a>
                    </li>
                    <li>
                        <a href="chart.html"><i class=""></i> RH</a>
                    </li>
                    <li>
                        <a href="tab-panel.html"><i class=""></i> Voluntáriado</a>
                    </li>
                    <li>
                        <a href="table.html"><i class=""></i> Terapia</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper" >
            
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                        <!-- Erros -->
                        <ul class="errors">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                        <h2 class="page-header">
                            @yield('title')
                        </h2>

                        @yield('content')

                    </div>
                </div> 
                 <!-- /. ROW  -->
            </div>
             <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->

    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="{{ URL::asset('assets/js/jquery-1.10.2.js') }}"></script>
      <!-- Bootstrap Js -->
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
      <!-- Modal Script -->
    <script src="{{ URL::asset('assets/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
      <!-- Modal Ajax Link -->
    <script src="{{ URL::asset('assets/magnific-popup/modal-ajax-link.js') }}"></script>
    <!-- Metis Menu Js -->
    <script src="{{ URL::asset('assets/js/jquery.metisMenu.js') }}"></script>
      <!-- Custom Js -->
    <script src="{{ URL::asset('assets/js/custom-scripts.js') }}"></script>

   
</body>
</html>
