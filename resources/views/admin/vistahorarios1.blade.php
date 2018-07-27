@extends('main')

@section('title', 'Listar Horarios')

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

  <title>Horarios</title>
 
</head>


  <div class="container">
<div class="panel panel-info">

  <div class="panel-heading">ADMINISTRACION DE SALA</div>
  <br>
  @include('flash::message')
  <br>
  <!-- Table -->
  <div class="row">
      <div class="col-md-1">
      </div>
      <div class="col-md-3">
        <label for="buscarSala">Sala</label>
        <select id="buscarSala"  class="form-control" onchange="busq()">
          <option value="0"> -- Elija una opción -- </option>
          @foreach ($salas as $key)
            <option>{!! $key->nombre !!}</option>
          @endforeach
        </select>    
      </div>
      <div class="col-md-3">
        <label for="buscarFecha">Fecha</label>
        <input id="buscarFecha" type="date" class="form-control" step="1" onchange="busq()" value="<?php echo date("Y-m-d");?>">      
      </div>
      <div class="col-md-3">
        <label for="buscarHorario">Horario</label>
        <select id="buscarHorario"  class="form-control" onchange="busq()">
          <option value="0"> -- Elija una opción -- </option>
          @foreach ($horarios as $key)
            <option>{!! $key->horaInicio !!} - {!! $key->horaFin !!}</option>
          @endforeach
        </select> 
      </div>
  </div>
  <br>
  <table id="tablas" class="table table-striped" id="tab">
    <thead>
      <th><center>FECHA</center></th>
      <th><center>SALA</center></th>
      <th><center>HORA</center></th>
      <th><center>MESA</center></th>
      <th><center>USUARIO</center></th>
      <th><center>CODIGO</center></th>
      <th><center>PAR ACADÉMICO</center></th>
      <th><center>ASIGNATURA</center></th>
      <th><center>ESTRATEGIA</center></th>
      </thead>
    <tbody>
      @foreach($horarios_asignados as $h)
      <tr>  
        <td><center>{{ $h-> fecha }}</center></td>
        <td><center>{{ $h-> sala }}</center></td>
        <td><center>{{ $h-> h1."-".$h->h2}}</center></td>
        <td><center>{{ $h-> mesa }}</center></td>
        <td><center>{{ $h-> usuario }}</center></td>
        <td><center>{{ $h -> codigo}}</center></td>
        <td><center>{{ $h -> nombre}}</center></td>
        <td><center>{{ $h -> asignatura}}</center></td>              
        <td><center>{{ $h -> estrategia}}</center></td>
        </tr>
      @endforeach         
    </tbody>
  </table>
</div>
</div>




<script type="text/javascript">

function busq(){
  var sala    = $("#buscarSala").val();
  var fecha   = $("#buscarFecha").val();
  var horario = $("#buscarHorario").val();

  var data  = <?php echo json_encode($horarios_asignados); ?>;
  var tr_table = '';
  var registro = '';
 
  $("#tablas tr").remove();
  $("#tablas thead").html("<th><center>FECHA</center></th><th><center>SALA</th><th><center>HORA</center></th><th><center>MESA</center></th><th><center>USUARIO</center></th><th><center>CODIGO</center></th><th><center>PAR ACADÉMICO</center></th><th><center>ASIGNATURA</center></th><th><center>ESTRATEGIA</center></th>");

  for (var i = 0; i < data.length; i++) {
    
    if(sala == 0 && horario == 0 && fecha == data[i]['fecha']){

   
    
      tr_table += '<tr><td>' + data[i]['fecha'] + '</td><td>' + data[i]['sala'] + '</td><td>' + data[i]['h1'] + ' ' + data[i]['h2'] + '</td><td>' + data[i]['mesa'] + '</td><td>' + data[i]['usuario'] + '</td><td>' + data[i]['codigo'] + '</td><td>' + data[i]['nombre'] + '</td><td>' + data[i]['asignatura'] + '</td><td>' + data[i]['estrategia'] + '</td></tr>';
    
    } else if (fecha == data[i]['fecha'] && sala == data[i]['sala'] && horario == 0) {
    
     

      tr_table += '<tr><td>' + data[i]['fecha'] + '</td><td>' + data[i]['sala'] + '</td><td>' + data[i]['h1'] + ' ' + data[i]['h2'] + '</td><td>' + data[i]['mesa'] + '</td><td>' + data[i]['usuario'] + '</td><td>' + data[i]['codigo'] + '</td><td>' + data[i]['nombre'] + '</td><td>' + data[i]['asignatura'] + '</td><td>' + data[i]['estrategia'] + '</td></tr>';
    
    } else if (fecha == data[i]['fecha'] && sala == data[i]['sala'] && horario == (data[i]['h1'] + ' - ' + data[i]['h2']))  {
    
    
      tr_table += '<tr><td>' + data[i]['fecha'] + '</td><td>' + data[i]['sala'] + '</td><td>' + data[i]['h1'] + ' ' + data[i]['h2'] + '</td><td>' + data[i]['mesa'] + '</td><td>' + data[i]['usuario'] + '</td><td>' + data[i]['codigo'] + '</td><td>' + data[i]['nombre'] + '</td><td>' + data[i]['asignatura'] + '</td><td>' + data[i]['estrategia'] + '</td></tr>';
    }
  }
  $("#tablas tbody").html(tr_table);
  
}

</script> 
@endif
@endsection  
