<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Control CREE - @yield('title')</title>

        <!-- Bootstrap -->
        <link  rel="stylesheet" type="text/css" href="{!! env('APP_URL') !!}/public/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{!! env('APP_URL') !!}/public/css/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href = "{!! env('APP_URL') !!}/public/css/jquery-editable-select.min.css ">
    </head>
    <body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=" {{ route('main') }} ">Control CREE</a>

            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">

                    <!-- Con login --> 


                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Inicio de sesión</a></li>
                            <li><a href="{{ route('register') }}">Registro de usuario</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="{{ url('mainbd') }}">Panel de control</a>
                                    </li> 
                                </ul>
                            </li>
                        @endif
                     

                    <!-- Sin Login -->
                    
                    <!--
                        <li>
                            <a href="{{ url('mainbd') }}">Panel de control</a>
                        </li> 
                     -->
                    </ul>
                </div>
        </nav>

        @yield('content')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="{!! env('APP_URL') !!}/public/js/jquery.searchable.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{!! env('APP_URL') !!}/public/js/bootstrap.min.js"></script>
        <script src="{!! env('APP_URL') !!}/public/js/registroasistencia.js"></script>
    
        <script src="{!! env('APP_URL') !!}/public/js/datatables.min.js"></script>
        <script src="{!! env('APP_URL') !!}/public/js/jquery-editable-select.js "> </script>
        <script src="{!! env('APP_URL') !!}/public/js/jquery-editable-select.min.js "> </script>

        <script>
            $('#flash-overlay-modal').modal();
        </script>
    </body>
</html>
