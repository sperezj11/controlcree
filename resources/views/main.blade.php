@extends('layouts.app')

@section('title','Main')

@section('content')
@if (Auth::guest())
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">Iniciar sesión</div>
                         <center><img src="{!! env('APP_URL') !!}/public/img/LogoCREE.png" alt="CREE" width="30%" /></center>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label"></label>

                                <div class="col-md-4">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Dirección de correo electrónico" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                   <label for="password" class="col-md-4 control-label"></label>

                                <div class="col-md-4">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required autofocus>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Iniciar sesión
                                        </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            ¿Olvidó su contraseña?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	   <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CREE</title>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	
	<link rel="StyleSheet" href="{!! env('APP_URL') !!}/public/css/style.css" type="text/css" media="screen"  /> 
	<link rel="StyleSheet" href="{!! env('APP_URL') !!}/public/css/style-mobile.css" type="text/css" media="(max-width: 580px)"  /> 	
	

</head>
	
<body>
	<div id="content">	
		<!--<h1><img src="cree.png" alt="CREE" /></h1>-->
		<p align="center"><img id="img_title" src="{!! env('APP_URL') !!}/public/img/bienvenido.png" /></p>

		<a href="{{ route('asignacionhorario') }}"><img src="{!! env('APP_URL') !!}/public/img/btn_asignacion.png" width="19%" /></a>
		<a href="{{ route('listarhorarios') }}"><img src="{!! env('APP_URL') !!}/public/img/btn_tutoriaensala.png" width="19%" /></a>
		<a href="{{ route('horarios') }}"><img src="{!! env('APP_URL') !!}/public/img/btn_horarios.png" width="20%" /></a>
		<a href="{{ route('Asistencia_horarios') }}"><img src="{!! env('APP_URL') !!}/public/img/btn_asistencia.png" width="20%" /></a>
		<a href="{{ route('asistencia') }}"><img src="{!! env('APP_URL') !!}/public/img/btn_reportes.png" width="20%" /></a></p>	

	</div>
	<div class="col-sm-9 col-md-10 main">
		@include('flash::message')
	    @yield('content-main')
	</div>
</body>
</html>


@endif
@endsection