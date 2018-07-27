@extends('mainbd')

@section('title', 'Registro de estudiantes')

@section('content-main')

	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">REGISTRO DE ESTUDIANTES</h3>
		</div>
		@include('errorformularios.error')	
		
		<div class="panel-body">

			<form class="form-horizontal" role="form" method="POST" action="{{ route('estudiante.store') }}">
			{{ csrf_field() }}

				<div class="form-group">
					<label for="id" class="col-sm-2 control-label">Codigo</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="id" placeholder="Codigo" name="id">
					</div>
				</div>

			   <div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre completo</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" placeholder="Nombre completo" name="nombre">
					</div>
				</div>

                <div class="form-group">
					<label for="celular" class="col-sm-2 control-label">Celular</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="celular" placeholder="Celular" name="celular">
					</div>
				</div>
				 <div class="form-group">
					<label for="email1" class="col-sm-2 control-label">Correo Uninorte</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="email1" placeholder="Correo Uninorte" name="email1">
					</div>
				</div>
				 <div class="form-group">
					<label for="email2" class="col-sm-2 control-label">Correo Personal</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="email2" placeholder="Correo Personal" name="email2">
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
			    <form method="post" action="{{ route('excel.importestudiante') }}" enctype="multipart/form-data">
			        {{csrf_field()}}
			        <input type="file" name="excel">
			        <br><br>
			        <input type="submit" value="Enviar" class="btn btn-success" style="padding: 10px 20px;">
			    </form>
			</div> 	
@endsection