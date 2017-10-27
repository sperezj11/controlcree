@extends('main')

@section('title', 'Asignación de horario')

@section('content')


	<h1><a href="../"><center><img src="../img/apoyo.png" alt="CREE" width="85%" /></center></a></h1>
	



<div class="container">
 
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Asginación de horario</h3>
		</div>
@include('errorformularios.error')		
		<div class="panel-body">

			<form class="form-horizontal" role="form" method="POST" action="{{ route('asignacionhorario.store') }}">

			{{ csrf_field() }}

				<div class="form-group">
					<label for="estrategia" class="col-sm-2 control-label" ><p class="text-center">Estrategia</p></label>
					<div class="col-sm-10">
						<select id="estrategia" class="form-control" name="estrategia" onchange="myFunction()">
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
								<option value="{{ $horario->id }}">{{ $horario->dia." ".$horario->horaInicio."-".$horario->horaFin}}</option>
							@endforeach
						</select>
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
						<option value= "null">-- Seleccione Asignatura--</option>
							@foreach($asignaturas as $asignatura)
								<option value="{{ $asignatura->id }}">{{ $asignatura->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary" >Registrar</button>

					</div>
				</div>
			</form>
		</div>
	</div>
</div>
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

@endsection