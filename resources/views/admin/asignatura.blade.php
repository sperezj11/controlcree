@extends('mainbd')

@section('title', 'Registro de asignatura')

@section('content-main')

	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">REGISTRO DE ASIGNATURA</h3>
		</div>
		@include('errorformularios.error')	
		<div class="panel-body">

			<form class="form-horizontal" role="form" method="POST" action="{{ route('asignatura.store') }}">
			{{ csrf_field() }}

				<div class="form-group">
					<label for="Codmateria" class="col-sm-2 control-label">Codigo de asignatura</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Codmateria" placeholder="Codigo de asignatura" name="Codmateria">
					</div>
				</div>

			   <div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre de asignatura</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" placeholder="Nombre completo" name="nombre">
					</div>
				</div>

                <div class="form-group">
					<label for="departamento" class="col-sm-2 control-label">Departamento</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="departamento" placeholder="Departamento" name="departamento">
					</div>
				</div>
				 
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Registrar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
 <div class="links">
			    <form method="post" action="{{ route('excel.importasignatura') }}" enctype="multipart/form-data">
			        {{csrf_field()}}
			        <input type="file" name="excel">
			        <br><br>
			        <input type="submit" value="Enviar" class="btn btn-success" style="padding: 10px 20px;">
			    </form>
			</div> 	
@endsection