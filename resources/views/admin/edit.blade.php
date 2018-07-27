@extends('main')

@section('title', 'Editar horario')

@section('content')

	<h1><a href="../"><center><img src="../../img/bannereditar.png" alt="CREE" width="85%" /></center></a></h1>
	
<div class="container">
 
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Editar horario {{$estudiante->nombre }}</h3>
		</div>
@include('errorformularios.error')		
		<div class="panel-body">

		
{!! Form::model($asighorarios, [
    'method' => 'PATCH',
    'route' => ['asignacionhorario.update', $asighorarios->id], 'class'=>'form-horizontal'
]) !!}
			{{ csrf_field() }}

				<div class="form-group">
					<label for="estrategia" class="col-sm-2 control-label" ><p class="text-center">Estrategia</p></label>
					<div class="col-sm-10">
						<select id="estrategia" class="form-control" name="estrategia" onchange="myFunction()">
						<option value= "null">-- Seleccione estrategia--</option>
							@foreach($estrategias as $estrategia)
								@if ($estrategia->id== $asighorarios->estrategia)
									<option value="{{ $estrategia->id }}" selected>{{ $estrategia->nombre}}</option>
								@else
									<option value="{{ $estrategia->id }}" >{{ $estrategia->nombre}}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>

			<div class="form-group">
				<label for="fechainicio" class="col-sm-2 control-label"><p class="text-center">Fecha inicio</p></label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fechainicio" placeholder="Fechainicio" name="fechainicio" value="{{$asighorarios->fechainicio }}">
					</div>
			</div>

			<div class="form-group">
				<label for="fechafin" class="col-sm-2 control-label"><p class="text-center">Fecha fin</p></label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fechafin" placeholder="Fechafin" name="fechafin" 
					    value="{{$asighorarios->fechafin }}">
					</div>
			</div>

			<div class="form-group">
				<label for="horario" class="col-sm-2 control-label"><p class="text-center">Horario</p></label>
					<div class="col-sm-10">
						<select id="horario" class="form-control" name="horario">->orderBy
							<option value= "null">-- Seleccione horario --</option>
					@foreach($horarios as $horario)
						@if ($horario->id== $asighorarios->horario)
							<option value="{{ $horario->id }}" selected>{{ $horario->dia." ".$horario->horaInicio."-".$horario->horaFin}}</option>
						@else
							<option value="{{ $horario->id }}">{{ $horario->dia." ".$horario->horaInicio."-".$horario->horaFin}}</option>
						@endif

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

								@if ($mesa->id== $asighorarios->mesa)
								<option value="{{ $mesa->id }}" selected>{{ $mesa->nombre}}</option>
								@else
									<option value="{{ $mesa->id }}">{{ $mesa->nombre}}</option>
								@endif

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
								
								@if ($usuario->id== $asighorarios->usuario)
								<option value="{{ $usuario->id }}" selected>{{ $usuario->nombre}}</option>
								@else
									<option value="{{ $usuario->id }}">{{ $usuario->nombre}}</option>
								@endif
							
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="monitor" class="col-sm-2 control-label"><p class="text-center">Monitor</p></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="monitor" placeholder="Codigo de monitor"  value="{{$asighorarios->monitor }}">
					</div>
				</div>

				<div class="form-group">
					<label for="asignatura" class="col-sm-2 control-label"><p class="text-center">Asignatura</p></label>
					<div class="col-sm-10">
						<select id="asignatura" class="form-control" name="asignatura">
						<option value= "null">-- Seleccione Asignatura--</option>
							@foreach($asignaturas as $asignatura)
									@if ($asignatura->id== $asighorarios->asignatura)
								<option value="{{ $asignatura->id }}" selected>{{ $asignatura->nombre}}</option>
								@else
									<option value="{{ $asignatura->id }}">{{ $asignatura->nombre}}</option>
								@endif

						@endforeach
						</select>
					</div>
				</div>

<div class="trans text-center"> 
{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}

</div> 
{!! Form::close() !!}
				</div>
			</form>
		</div>
	</div>
</div>
@endsection