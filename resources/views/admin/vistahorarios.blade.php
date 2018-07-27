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
<head onload="init();">
  <title>Horarios</title>
 
</head>


  <div class="container">
<div class="panel panel-info">

  <div class="panel-heading">REGISTRO DE ASISTENCIA PAR ACADÉMICO </div>
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
      <th><center>ACCIÓN</center></th>
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
        <td>

          <button type="button" class="btn btn-default" aria-label="center Align" data-toggle="tooltip" onclick="confirmarAsistencia('{{ $h->id }}','{{ $h->sala }}', '{{ $h->fecha }}', '{{ $h->codigo }}','{{ $h->nombre }}','{{ $h->asignatura }}','{{ $h-> h1 }} - {{ $h->h2}}')" data-placement="bottom" title="Confirmar asistencia">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
          </button>

        </td>
      </tr>
      @endforeach         
    </tbody>
  </table>
</div>
</div>


<?php /*  Formulario Modal */ ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="titleModal" class="modal-title" id="myModalLabel">Cambio de horario</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{!! route('registroasistencia.store') !!}">
          {{ csrf_field() }}

          <input type="hidden" name="id_ah" id="id_ah">
          <input type="hidden" name="select_sala" id="select_sala">
          <input type="hidden" name="select_fecha" id="select_fecha">
          <input type="hidden" name="select_horario" id="select_horario">

          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="edit_sala">Sala</label>
                    <input type="text" class="form-control" name="edit_sala" id="edit_sala" readonly>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="edit_fecha">Fecha</label>
                    <input type="date" class="form-control" name="edit_fecha" id="edit_fecha">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="edit_cod">Código estudiante</label>
                    <input type="text" class="form-control" name="edit_cod" id="edit_cod" readonly>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="edit_estudiante">Par académico</label>
                    <input type="text" class="form-control" name="edit_estudiante" id="edit_estudiante" readonly>
                  </div>
              </div>
          </div>          
          <div class="form-group">
            <label for="edit_asignatura">Asignatura</label>
            <input type="text" class="form-control" name="edit_asignatura" id="edit_asignatura" readonly>
          </div>          
          <div class="form-group">
            <label for="edit_horario">Horario</label>
            <input type="text" class="form-control" name="edit_horario" id="edit_horario" readonly>
          </div>
          <div class="form-group">
            <label for="edit_estado">Estado de asistencia </label>
            <select id="edit_estado" class="form-control" name="edit_estado">->orderBy
              <option value= "null">Seleccione estado de asistencia</option>
              <option value= "2">SI</option>
              <option value= "3">NO</option>
              <option value= "1">PENDIENTE</option>
              <option value= "4">EXCUSADO</option>
            </select>
          </div>
          <div class="form-group">
            <label for="edit_desc">Comentarios</label>
            <br>
            <textarea name="edit_desc" id="edit_desc" rows="3" cols="25" style="margin: 0px; width: 867px; height: 100px;">Escribe aquí tus comentarios</textarea>
          </div>
          <button id="actionForm" type="submit" class="btn btn-success">Registrar asistencia</button>
        </form>
      </div>
    </div>
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
  $("#tablas thead").html("<th><center>FECHA</center></th><th><center>SALA</th><th><center>HORA</center></th><th><center>MESA</center></th><th><center>USUARIO</center></th><th><center>CODIGO</center></th><th><center>PAR ACADÉMICO</center></th><th><center>ASIGNATURA</center></th><th><center>ESTRATEGIA</center></th><th><center>ACCIÓN</center></th>");

  for (var i = 0; i < data.length; i++) {
    
    if(sala == 0 && horario == 0 && fecha == data[i]['fecha']){

      registro = '<button type="button" class="btn btn-default" aria-label="center Align" data-toggle="tooltip" onclick="confirmarAsistencia(\'' + data[i]['id'] + '\',\'' + data[i]['sala'] + '\', \'' + data[i]['fecha'] + '\', \'' + data[i]['codigo'] + '\', \'' + data[i]['nombre'] + '\', \'' + data[i]['asignatura'] + '\', \'' + data[i]['h1'] + ' - ' + data[i]['h2'] + '\')" data-placement="bottom" title="Confirmar asistencia"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>';
    
      tr_table += '<tr><td>' + data[i]['fecha'] + '</td><td>' + data[i]['sala'] + '</td><td>' + data[i]['h1'] + ' ' + data[i]['h2'] + '</td><td>' + data[i]['mesa'] + '</td><td>' + data[i]['usuario'] + '</td><td>' + data[i]['codigo'] + '</td><td>' + data[i]['nombre'] + '</td><td>' + data[i]['asignatura'] + '</td><td>' + data[i]['estrategia'] + '</td><td>' +  registro + '</td></tr>';
    
    } else if (fecha == data[i]['fecha'] && sala == data[i]['sala'] && horario == 0) {
    
      registro = '<button type="button" class="btn btn-default" aria-label="center Align" data-toggle="tooltip" onclick="confirmarAsistencia(\'' + data[i]['id'] + '\',\'' + data[i]['sala'] + '\', \'' + data[i]['fecha'] + '\', \'' + data[i]['codigo'] + '\', \'' + data[i]['nombre'] + '\', \'' + data[i]['asignatura'] + '\', \'' + data[i]['h1'] + ' - ' + data[i]['h2'] + '\')" data-placement="bottom" title="Confirmar asistencia"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>';

      tr_table += '<tr><td>' + data[i]['fecha'] + '</td><td>' + data[i]['sala'] + '</td><td>' + data[i]['h1'] + ' ' + data[i]['h2'] + '</td><td>' + data[i]['mesa'] + '</td><td>' + data[i]['usuario'] + '</td><td>' + data[i]['codigo'] + '</td><td>' + data[i]['nombre'] + '</td><td>' + data[i]['asignatura'] + '</td><td>' + data[i]['estrategia'] + '</td><td>' +  registro + '</td></tr>';
    
    } else if (fecha == data[i]['fecha'] && sala == data[i]['sala'] && horario == (data[i]['h1'] + ' - ' + data[i]['h2']))  {
    
      registro = '<button type="button" class="btn btn-default" aria-label="center Align" data-toggle="tooltip" onclick="confirmarAsistencia(\'' + data[i]['id'] + '\',\'' + data[i]['sala'] + '\', \'' + data[i]['fecha'] + '\', \'' + data[i]['codigo'] + '\', \'' + data[i]['nombre'] + '\', \'' + data[i]['asignatura'] + '\', \'' + data[i]['h1'] + ' - ' + data[i]['h2'] + '\')" data-placement="bottom" title="Confirmar asistencia"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>';

      tr_table += '<tr><td>' + data[i]['fecha'] + '</td><td>' + data[i]['sala'] + '</td><td>' + data[i]['h1'] + ' ' + data[i]['h2'] + '</td><td>' + data[i]['mesa'] + '</td><td>' + data[i]['usuario'] + '</td><td>' + data[i]['codigo'] + '</td><td>' + data[i]['nombre'] + '</td><td>' + data[i]['asignatura'] + '</td><td>' + data[i]['estrategia'] + '</td><td>' +  registro + '</td></tr>';
    }
  }
  $("#tablas tbody").html(tr_table);
  
}

function confirmarAsistencia($id, $sala, $fecha, $codigo, $estudiante, $asignatura, $horario){

  $('#form_horario').show();
  $('#myModal').modal('show');
  $('#titleModal').html('Confirmar asistencia de estudiante ' + $estudiante);
  $('#edit_fecha').val($fecha);
  $('#edit_sala').val($sala);
  $('#edit_estudiante').val($estudiante);
  $('#edit_asignatura').val($asignatura);
  $('#edit_horario').val($horario);
  $('#edit_cod').val($codigo);

  $('#id_ah').val($id);
  $('#select_sala').val($('#buscarSala').val());
  $('#select_fecha').val($('#buscarFecha').val());
  $('#select_horario').val($('#buscarHorario').val());
}

function load() {
  $sala = <?php echo "'".$sel_sala."'"; ?>;
  $fecha = <?php echo "'".$sel_fecha."'"; ?>;
  $horario = <?php echo "'".$sel_hor."'"; ?>;

  $('#buscarSala').val($sala);
  $('#buscarFecha').val($fecha);
  $('#buscarHorario').val($horario);
  busq();  
}
window.onload = load;
</script> 
@endif
@endsection  
