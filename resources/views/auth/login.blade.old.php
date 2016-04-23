<style>
	label{
	    color:#fff;
	}
</style>
<link href="/assets/bootstrap/bootstrap.css" rel="stylesheet" />
<!-- bootstrap theme -->
<link href="/assets/bootstrap/bootstrap-theme.css" rel="stylesheet" />
<!--external css-->
<!-- font icon -->
<link href="/assets/fonts/elegant-icons-style.css" rel="stylesheet" />
<link href="/assets/fonts/font-awesome.css" rel="stylesheet" />
<!-- Custom styles -->
<link href="/assets/css/style.css" rel="stylesheet" />
<link href="/assets/css/style-responsive.css" rel="stylesheet" />
<body class="login-img-body">
    <div class="container">
    	<form method="POST">
    	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="login-wrap">
                <p class="login-img"><i class="icon_lock_alt"></i></p>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Email" />
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                </div>
                <input type="submit" class="btn btn-info btn-lg btn-block" value="Login"/>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Signup</button>
            </div>
    	</form>
    </div>
</body>
<style>
.navbar{
    background-color: rgba(0, 0, 0, 0.1);
    border-color: rgba(0, 0, 0, 0.2);
}
</style>
