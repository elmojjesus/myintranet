<html>
    <head>
        <title>MovaSoft - ADFP</title>
    </head>
    <body>
        <div class="header">
            <!-- menu... -->
            <div class="menu"></div>
            <!-- Erros -->
            <ul class="errors">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>