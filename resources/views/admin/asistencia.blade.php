@extends('main')

@section('title', 'Editar horario')

@section('content')

	<h1><a href="{{ route('main') }}"><center><img src="{!! env('APP_URL') !!}/public/img/bannerasistencia.png" alt="CREE" width="83%" /></center></a></h1>
	
<div class="container">
 
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Registrar asistencia de {{$estudiante->nombre }}</h3>
		</div>
@include('errorformularios.error')		
		<div class="panel-body">

		
{!! Form::model($asighorarios, [
    'method' => 'POST',
    'route' => ['registroasistencia.store' ], 'class'=>'form-horizontal'
]) !!}
			{{ csrf_field() }}
            <div class="form-group">
					<label for="sala" class="col-sm-2 control-label"><p class="text-center">Sala</p></label>
					<div class="col-sm-10">
					@foreach($salas as $sala)
						@if ($sala->id== $asighorarios->sala)
						<input type="text" class="form-control" name="sala"  placeholder="Sala"  value="{{$sala->nombre }}">
						@endif

					@endforeach
					</div>
			</div>
           <div class="form-group">
				<label for="fecha" class="col-sm-2 control-label"><p class="text-center">Fecha</p></label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fecha" placeholder="Fecha" name="fecha">
					</div>
			</div>
               <div class="form-group">
					<label for="codigo" class="col-sm-2 control-label"><p class="text-center">Codigo</p></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="codigo"  placeholder="codigo"  value="{{$estudiante->id }}">
					</div>
				</div>
			  <div class="form-group">
					<label for="monitor" class="col-sm-2 control-label"><p class="text-center">Par academico</p></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="monitor"  placeholder="monitor"  value="{{$estudiante->nombre }}">
					</div>
				</div>
				 
			  <div class="form-group">
					<label for="asignatura" class="col-sm-2 control-label"><p class="text-center">Asignatura</p></label>
					<div class="col-sm-10">
					@foreach($asignaturas as $asignatura)
						@if ($asignatura->id== $asighorarios->asignatura)
						<input type="text" class="form-control" name="asignatura"  placeholder="Asignatura"  value="{{$asignatura->nombre }}">
						@endif

					@endforeach
					</div>
				</div>
			<div class="form-group">
				<label for="horario" class="col-sm-2 control-label"><p class="text-center">Horario</p></label>
					<div class="col-sm-10">
					@foreach($horarios as $horario)
						@if ($horario->id== $asighorarios->horario)
						<input type="text" class="form-control" name="horario"  placeholder="Horario"  value="{{ $horario->dia." ".$horario->horaInicio."-".$horario->horaFin}}">
						@endif

					@endforeach
				
					</div>
			</div>

			<div class="form-group">
				<label for="asistencia" class="col-sm-2 control-label"><p class="text-center">Estado de asistencia</p></label>
					<div class="col-sm-10">
						<select id="asistencia" class="form-control" name="asistencia">->orderBy
							<option value= "null">Seleccione estado de asistencia</option>
							<option value= "2">SI</option>
							<option value= "3">NO</option>
							<option value= "1">PENDIENTE</option>
							<option value= "4">EXCUSADO</option>
					
						</select>
					</div>
			</div>


				<div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label"><p class="text-center">Comentarios</p></label>
					<div class="col-sm-10">
						<textarea name="descripcion" rows="5" cols="30">Escribe aquí tus comentarios</textarea>
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