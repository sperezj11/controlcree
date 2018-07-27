@extends('main')

@section('title', 'Listar Asistencia')

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
<head>
  <title>Asistenciaa</title>
 
</head>


  <div class="container">
<div class="panel panel-info">

  <div class="panel-heading">ASISTENCIA DE SALA</div>
&nbsp;
  <!-- Table -->
  <table class="table table-striped" id="tabla">

    <thead>
  
          <th><center>CODIGO</center></th>
          <th><center>PAR ACADÉMICO</center></th>
          <th><center>ASIGNATURA</center></th>
          <th><center>ASISTENCIA</center></th>
          <th><center>INASISTENCIA</center></th>
          <th><center>EXCUSADO</center></th>
          <th><center>PENDIENTE</center></th>
    </thead>

     <tfoot>
            <tr>
          <th><center>CODIGO</center></th>
          <th><center>PAR ACADÉMICO</center></th>
          <th><center>ASIGNATURA</center></th>
          <th><center>ASISTENCIA</center></th>
          <th><center>INASISTENCIA</center></th>
          <th><center>EXCUSADO</center></th>
          <th><center>PENDIENTE</center></th>
            </tr>
        </tfoot>
      <tbody>
        @foreach($registroasistencia as $s )

      <tr>
              <td><center>{{ $s -> codigo}}</center></td>
              <td><center>{{ $s -> monitor}}</center></td>
              <td><center>{{ $s-> asignatura }}</center></td>
              <td><center>{{ $s-> SI}}</center></td>
              <td><center>{{ $s-> NO}}</center></td>
              <td><center>{{ $s-> EXC}}</center></td>
              <td><center>{{ $s-> PEN}}</center></td>
            </div>
      </tr>
        @endforeach         
      </tbody>
  </table>


</div>
</div>
<center><div class="btn-group">
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Descargar Datos <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="{{ route('excel.exportarasistencia') }}">Exportar con fechas</a></li>
    <li><a href="{{ route('excel.exportarasistencia1') }}">Exportar sumatoria</a></li>
  </ul>
</div></center>
@endif
@endsection  
