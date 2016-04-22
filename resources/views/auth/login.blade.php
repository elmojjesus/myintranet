<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Login Form Template</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
        <link href="{{ URL::asset('assets/css/font-awesome.css') }}" rel="stylesheet" />
		<link href="{{ URL::asset('assets/css/form-elements.css') }}" rel="stylesheet" >
        <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 text">
                            <img src="{{ asset('assets/img/logo2.png') }}" >
                            <h4> Centralize, Agilize, Economize </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Bem vindo a sua intranet</h3>
                            		<p>Digite seu email e senha para entrar:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            
                            <div class="form-bottom">
			                    <form role="form" method="post" class="login-form">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
			                    	
                                    <div class="form-group">
			                    		<label class="sr-only" for="email">Email</label>
			                        	<input type="text" name="email" placeholder="Email..." class="form-username form-control" id="email">
			                        </div>
			                        
                                    <div class="form-group">
			                        	<label class="sr-only" for="form-password">Senha</label>
			                        	<input type="password" name="password" placeholder="Senha..." class="form-password form-control" id="password">
			                        </div>
			                        
                                    <button type="submit" class="btn" type="submit">Entrar!</button>

			                    </form>
		                    </div>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>


            <!-- Javascript -->
            <!-- jQuery Js -->
        <script src="{{ URL::asset('assets/js/jquery-1.10.2.js') }}"></script>
            <!-- Bootstrap Js -->
        <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
            <!-- Backstretch -->
        <script src="{{ URL::asset('assets/js/jquery.backstretch.min.js') }}"></script>

        <script src="{{ URL::asset('assets/js/scripts.js') }}"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>