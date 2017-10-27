@extends('layouts.app')

@if (Auth::guest())
	@section('title','Main')
	@section('content')

	<div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">Iniciar sesión</div>
	                <div class="panel-body">
	                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
	                        {{ csrf_field() }}

	                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                            <label for="email" class="col-md-4 control-label">Dirección de correo electrónico</label>

	                            <div class="col-md-6">
	                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

	                                @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                            <label for="password" class="col-md-4 control-label">Contraseña</label>

	                            <div class="col-md-6">
	                                <input id="password" type="password" class="form-control" name="password" required>

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
	@endsection

@else
	@section('title','Main')
	@section('content')
    

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	   <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CREE :: Acompañamiento Academico</title>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	
	<link rel="StyleSheet" href="css/style.css" type="text/css" media="screen"  /> 
	<link rel="StyleSheet" href="css/style-mobile.css" type="text/css" media="(max-width: 580px)"  /> 	
	
<style>
body{
background:url(img/fond.png) repeat top center;
}
</style>
 </head>
	
    <body>
	
    
	<div id="content">	
	<!--<h1><img src="cree.png" alt="CREE" /></h1>-->
	<p></p>
	<p></p>
	<p></p>
	<p align="center"><img id="img_title" src="img/bienvenido.png" /></p>
	<p></p>
	
	
<p align="center">
<a href="{{ route('asignacionhorario') }}"><img src="img/btn_asignacion.png" /></a>
<a href="{{ route('listarhorarios') }}"><img src="img/btn_tutoriaensala.png" /></a>
<a href="tutorias_expresate_idiomas/"><img src="img/btn_registro.png" /></a>
<a href="{{ route('registroasistencia') }}"><img src="img/btn_horarios.png" /></a></p>	

</div>
<div class="col-sm-9 col-md-10 main">
                	@include('flash::message')
                    @yield('content-main')
                </div>
 </body>
   </html>
           
	@endsection
@endif
