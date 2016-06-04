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
                <a class="navbar-brand" href="/"><img src="{{asset('assets/img/logo.png')}}" id="logo"></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <img src="{{ '/images/profile/' . Auth::user()->image }}" width="20" height="20">
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> Meu perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/auth/logout"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
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
                        <a href="#"><i class="fa fa-bar-chart-o"></i>
                            Dashboard<span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                {!! HTML::link('dashboard', 'Ir para Dashboard', true) !!}   
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users"></i>
                            Usuários<span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/user/create"> Cadastrar </a>
                            </li>
                            <li>
                                <a href="/user"> Buscar - Listar </a>
                            </li>
                            <li>
                                {!! HTML::link('deficiency', 'Deficiências', true) !!}
                            </li>
                            <li>
                                {!! HTML::link('education', 'Educação', true) !!}
                            </li>
                            <li>
                                {!! HTML::link('profession', 'Profissões', true) !!}
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-trophy"></i>
                            Atletas<span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <!-- <a href="athlete/create"> Cadastrar </a> -->
                                {!! HTML::link('athlete/create', 'Cadastrar', true) !!}
                            </li>
                            <li>
                                {!! HTML::link('athlete', 'Buscar - Listar', true) !!}
                            </li>
                            <li>
                                {!! HTML::link('sport', 'Esportes', true) !!}
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="chart.html"><i class="fa fa-star"></i>
                            Funcionários<span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <!-- <a href="athlete/create"> Cadastrar </a> -->
                                {!! HTML::link('employee/create', 'Cadastrar', true) !!}
                            </li>
                            <li>
                                {!! HTML::link('employee', 'Buscar - Listar', true) !!}
                            </li>
                            <li>
                                {!! HTML::link('departament', 'Departamento', true) !!}
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/employee"><i class="fa fa-heart"></i>
                            Voluntários
                        </a>
                    </li>
                    <li>
                        <a><i class="fa fa-wheelchair"></i>
                            Pacientes<span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <!-- <a href="athlete/create"> Cadastrar </a> -->
                                {!! HTML::link('pacient/create', 'Cadastrar', true) !!}
                            </li>
                            <li>
                                {!! HTML::link('pacient', 'Buscar - Listar', true) !!}
                            </li>
                            <li>
                                {!! HTML::link('therapy', 'Terapias', true) !!}
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-area-chart"></i>
                            Relatórios<span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                {!! HTML::link('reports/user', 'Usuários', true) !!}
                            </li>
                            <li>
                                {!! HTML::link('reports/athletes', 'Atletas', true) !!}
                            </li>
                            <li>
                                {!! HTML::link('reports/pacients', 'Pacientes', true) !!}
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/profiles">
                            <i class="fa fa-low-vision"></i>
                            Perfis de Acesso
                        </a>
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
                        @if($errors->all())
	                        <ul class="errors alert alert-danger">
	                            @foreach($errors->all() as $error)
	                                <li>{{ $error }}</li>
	                            @endforeach
	                        </ul>
                        @endif
                    	@if (Session::has('flash_notification.message'))
						    <div class="alert alert-{{ Session::get('flash_notification.level') }}">
						        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

						        {{ Session::get('flash_notification.message') }}
						    </div>
						@endif
                        <h1 class="page-header">
                            @yield('title')
                        </h1>

                        @yield('content')

                    </div>
                </div> 
                 <!-- /. ROW  -->
            </div>
             <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
        <div class="footer">
        FOOTER
    </div>
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
      <!-- MyScript -->
    <script src="{{ URL::asset('assets/js/myScript.js') }}"></script>

   
</body>
<footer>
<div class="row">
    <div clas="col-md-12">

    <div  style="text-align: left;"class="col-md-6">
<a  href="http://www.movasoft.com.br"><font color="white">MovaSoft © - All rights reserved</font></a>

  </div>

</div>
  </div>
</footer>

<style type="text/css">
footer {
    position: fixed; 
    bottom: 0px; 
    width: 100%; 
    height: 25x; 
    background-color: #08698A;
}
</style>

</html>
