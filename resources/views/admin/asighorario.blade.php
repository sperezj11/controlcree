@extends('main')

@section('title', 'Asignación de horario')

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
        <h1><a href="{{ route('main') }}"><center><img src="{!! env('APP_URL') !!}/public/img/banneragregar.png" alt="CREE" width="80%" /></center></a></h1>
<br>


<div class="container">
	
	<div class="panel panel-info">
			<div class="panel-heading">
			<h3 class="panel-title"><a href="{{ route('main') }}"></a> Asginación de horario</h3>
		</div>
		@include('errorformularios.error')
		@include('flash::message')
		<div class="panel-body">

			<form class="form-horizontal" role="form" method="POST" action="{{ route('asignacionhorario.store') }}">

			{{ csrf_field() }}

				<div class="form-group">
					<label for="sala" class="col-sm-2 control-label" ><p class="text-center">Sala asignada</p></label>
					<div class="col-sm-10">
						<select id="sala" class="form-control" name="sala">
						<option value= "null">-- Seleccione la sala--</option>
					        @foreach($salas as $sala)
								<option value="{{ $sala->id }}">{{ $sala->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="periodo" class="col-sm-2 control-label" ><p class="text-center">Periodo</p></label>
					<div class="col-sm-10">
						<select id="periodo" class="form-control" name="periodo">
						<option value= "null">-- Seleccione el periodo--</option>
					        @foreach($periodos as $periodo)
								<option value="{{ $periodo->id }}">{{ $periodo->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="estrategia" class="col-sm-2 control-label" ><p class="text-center">Estrategia</p></label>
					<div class="col-sm-10">
						<select id="estrategia" class="form-control" name="estrategia">
						<option value= "null">-- Seleccione estrategia--</option>
							@foreach($estrategias as $estrategia)
								<option value="{{ $estrategia->id }}">{{ $estrategia->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<!--div id="intervaloestrategia">

					<div class="form-group">
					<label for="fecha" class="col-sm-2 control-label">Fecha</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fecha" placeholder="Fecha" name="fecha">
					</div>
				</div>					

				</div-->

				<div class="form-group">
					<label for="fechainicio" class="col-sm-2 control-label"><p class="text-center">Fecha inicio</p></label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fechainicio" placeholder="Fechainicio" name="fechainicio">
					</div>
				</div>
				<div class="form-group">
					<label for="fechafin" class="col-sm-2 control-label"><p class="text-center">Fecha fin</p></label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fechafin" placeholder="Fechafin" name="fechafin">
					</div>
				</div>

				<div class="form-group">
					<label for="horario" class="col-sm-2 control-label"><p class="text-center">Horario</p></label>
					<div class="col-sm-10">
						<select id="horario" class="form-control" name="horario">->orderBy
							<option value= "null">-- Seleccione horario --</option>
							@foreach($horarios as $horario)
								<option value="{{ $horario->id }}">{{$horario->horaInicio."-".$horario->horaFin}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-2 form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="check_lunes" id="check_lunes" checked="true">
						<label class="form-check-label" for="check_lunes">Lunes</label>
					</div>
					<div class="col-sm-2 form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="check_martes" id="check_martes" checked="true">
						<label class="form-check-label" for="check_martes">Martes</label>
					</div>
					<div class="col-sm-2 form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="check_miercoles" id="check_miercoles" checked="true">
						<label class="form-check-label" for="check_miercoles">Miércoles</label>
					</div>
					<div class="col-sm-2 form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="check_jueves" id="check_jueves" checked="true">
						<label class="form-check-label" for="check_jueves">Jueves</label>
					</div>
					<div class="col-sm-2 form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="check_viernes" id="check_viernes" checked="true">
						<label class="form-check-label" for="check_viernes">Viernes</label>
					</div>
					<div class="col-sm-2 form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="check_sabado" id="check_sabado" checked="true">
						<label class="form-check-label" for="check_sabado">Sábado</label>
					</div>
				</div>

				<div class="form-group">
					<label for="mesa" class="col-sm-2 control-label"><p class="text-center">Mesa</p></label>
					<div class="col-sm-10">
						<select id="mesa" class="form-control" name="mesa">
							<option value= "null">-- Seleccione una mesa --</option>
							@foreach($mesas as $mesa)
								<option value="{{ $mesa->id }}">{{ $mesa->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="usuario" class="col-sm-2 control-label"><p class="text-center">Usuario</p></label>
					<div class="col-sm-10">
						<select id="usuario" class="form-control" name="usuario">
							<option value= "null">-- Seleccione usuario --</option>
							@foreach($usuarios as $usuario)
								<option value="{{ $usuario->id }}">{{ $usuario->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="monitor" class="col-sm-2 control-label"><p class="text-center">Monitor</p></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="monitor" placeholder="Codigo de monitor">
					</div>
				</div>

				<div class="form-group">
					<label for="asignatura" class="col-sm-2 control-label"><p class="text-center">Asignatura</p></label>
					<div class="col-sm-10">
						<select id="asignatura" class="form-control" name="asignatura">
							<option value= "null">-- Seleccione una asignatura --</option>
							@foreach($asignaturas as $asignatura)
								<option value="{{ $asignatura->id }}">{{ $asignatura->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary" >Registrar </button>
				
                  </div>
				</div>
			</form>
		</div>
	</div>
</div>
<link media="all" type="text/css" rel="stylesheet" href="{!! env('APP_URL') !!}/public/css/style.css">
	<script type="text/javascript">
  function myFunction(horarios) {
    var x = document.getElementById("estrategia").value;
    console.log(x)
    if (x == 1) {
    	var content = '<div class="form-group"><label for="fecha" class="col-sm-2 control-label">Fecha</label><div class="col-sm-10"><input type="date" class="form-control" id="fecha" placeholder="Fecha" name="fecha"></div>";';
    	document.getElementById("intervaloestrategia").textContent = content;
    } else if (x == 2){
    	document.getElementById("intervaloestrategia").textContent = x;
    }
  }
   
</script>
    @endif

	

@endsection