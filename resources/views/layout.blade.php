<!DOCTYPE html>
<html lang="es">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 450px}

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Foro</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li @if(Route::currentRouteName() == 'inicio')class="active" @endif><a href="{{route("inicio")}}">Inicio</a></li>
            </ul>
            @if(!Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route("login")}}"><span class="glyphicon glyphicon-log-in"></span> Identificarse</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route("register")}}"><span class="glyphicon glyphicon-log-in"></span> Registrarse</a></li>
                </ul>
                @else
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route("logout")}}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>

            @endif
        </div>
    </div>
</nav>
@yield('contenido')
<footer class="container-fluid text-center">
    <p>Copyright EGF</p>
</footer>

</body>
</html>
