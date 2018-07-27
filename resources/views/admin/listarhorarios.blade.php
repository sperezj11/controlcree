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
<head>
   <title>TUTORIA EN SALA</title>
</head>
<div class="container">
<div class="panel panel-info">
   <div class="panel-heading">TUTORIA EN SALA</div>
   <div class="panel-body">
      <?php 
         $option_asig = "";
         $option_paracad = "";

         foreach ($estudiantes as $key ) {
            $option_paracad .= '<option value="'.$key->monitor.'">'.$key->nombre.'</option>';
         }

         foreach ($asignatura as $key ) {
            $option_asig .= '<option value="'.$key->asignatura.'">'.$key->nombre.'</option>';
         }
      ?>

      <!-- Table -->
      <div class="row">
         <div class="col-md-1">
         </div>
         <div class="col-md-3">
            <label for="estudiante" class="col-sm-2 control-label"><p class="text-center">Estudiante</p></label>
            <select id="estudiante" class="form-control" name="estudiante">
               {!! $option_paracad !!}
            </select>  
         </div>
         <div class="col-md-5">
            <label for="asignatura" class="col-sm-2 control-label"><p class="text-center">Asignatura</p></label>
            <select id="asignatura" class="form-control" name="asignatura">
               {!! $option_asig !!}
            </select>             
         </div>
         <div class="col-md-3">
             <button type="button" class="btn btn-default" onclick="busq()">Buscar</button>
         </div>
      </div>
      <br>
      @include('flash::message')
      <br>
      <div id="res"></div>
      <!-- Table -->
      <table class="table table-striped" id="tablas">

         <thead>
            <th><center>PERIODO</center></th>
            <th><center>SALA</center></th>
            <th><center>PAR ACADÉMICO</center></th>
            <th><center>ASIGNATURA</center></th>
            <th><center>DÍA</center></th>
            <th><center>HORA</center></th>
            <th><center>CELULAR</center></th>
            <th><center>ACCIONES</center></th>   
         </thead>
         <tbody>
            @foreach($asighorarios as $h )
            <tr>    
               <td>{{ $h-> periodo}}</td>
               <td>{{ $h-> sala }}</td>
               <td>{{ $h-> estudiante}}</td>
               <td>{{ $h-> asignatura}}</td>
               <td>{{ $h-> dia }}</td>
               <td>{{ $h-> horaInicio."-".$h-> horaFin}}</td>
               <td><center>{{ $h -> celular}}</center></td>
               <td width="15%">

                  <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Enviar correo a estudiante"><a href="mailto:{!!$h-> email1!!}&subject=Asistencia%20sala%20de%20tutorías%20CREE.&body=%20Estimado,%0D%0A %0D%0ASe%20encuentran%20estudiantes%20esperando%20para%20la%20monitoria%20programada %20el%20día%20de%20hoy.%0D%0A %0D%0AAuxiliar%20técnico%20de%20sala%20de%20tutorías%0D%0ACREE/Bloque%20F,%20segundo%20piso%0D%0ATel.%20+57%203509509%20Ext.%203098%0D%0Awww.uninorte.edu.co"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></button>

                  <button type="button" class="btn btn-default" aria-label="center Align" data-toggle="tooltip" onclick="editarHorario('{{ $h->periodo }}', '{{ $h->sala }}', '{{ $h->estudiante }}','{{ $h->asignatura }}','{{ $h->dia }}','{{ $h->mesa }}')" data-placement="bottom" title="Editar horario">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                  </button>

                  <button type="button" class="btn btn-default" aria-label="center Align" data-toggle="tooltip" onclick="delHorario('{{ $h->periodo }}', '{{ $h->sala }}', '{{ $h->estudiante }}','{{ $h->asignatura }}','{{ $h->dia }}','{{ $h->mesa }}')" data-placement="bottom" title="Eliminar horario">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                  </button>
                  
               </td>
            </tr>
            @endforeach        
         </tbody>
      </table>
   </div>
</div>
</div>

<center><a href="{{ route('excel.exportar') }}" class="btn btn btn-success">Exportar Excel</a></center>

<?php /*  Formulario Modal */ ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="titleModal" class="modal-title" id="myModalLabel">Cambio de horario</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{!! route('upd_listarhorarios') !!}" id="form_edit">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="edit_periodo">Periodo</label>
            <input type="text" class="form-control" name="edit_periodo" id="edit_periodo" readonly>
          </div>
          <div class="form-group">
            <label for="edit_sala">Sala</label>
            <input type="text" class="form-control" name="edit_sala" id="edit_sala" readonly>
          </div>
          <div class="form-group">
            <label for="edit_estudiante">Estudiante</label>
            <input type="text" class="form-control" name="edit_estudiante" id="edit_estudiante" readonly>
          </div>
          <div class="form-group">
            <label for="edit_asignatura">Asignatura</label>
            <input type="text" class="form-control" name="edit_asignatura" id="edit_asignatura" readonly>
          </div>
          <div class="form-group">
            <label for="edit_dia">Dia</label>
            <input type="text" class="form-control" name="edit_dia" id="edit_dia" readonly>
          </div>
          <div class="form-group">
            <label for="edit_mesa">Mesa</label>
            <input type="text" class="form-control" name="edit_mesa" id="edit_mesa" readonly>
          </div>
          <div class="form-group" id="form_horario">
            <label for="edit_horario">Horario</label>
            <select class="form-control" name="edit_horario" id="edit_horario">
              <option value=""> -- Elija una opción -- </option>
              @foreach ($horarios as $horario)
                <option value="{{ $horario->id }}">{{ $horario->horaInicio }} - {{ $horario->horaFin }}</option>
              @endforeach
            </select>
          </div>
          <button id="actionForm" type="submit" class="btn btn-default">Modificar horario</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  var url_edit = "{!! route('upd_listarhorarios') !!}";
  var url_del = "{!! route('del_listarhorarios') !!}";

function busq(){
  var asig    = $("#asignatura").val();
  var est     = $("#estudiante").val();

  var data  = <?php echo json_encode($asighorarios); ?>;
  var tr_table = '';

  for (var i = 0; i < data.length; i++) {
      if (jQuery.isEmptyObject(asig) && jQuery.isEmptyObject(est)){
         $('#res').html('<div class="alert alert-danger" role="alert">Debe seleccionar un valor en los campos asígnatura y estudiante</div>');
      } else if ( (data[i]['asignatura'] == asig && jQuery.isEmptyObject(est)) || (data[i]['estudiante'] == est && jQuery.isEmptyObject(asig)) ){

         $('#res').html('');
         $("#tablas tr").remove();
         $("#tablas thead").html("<th><center>PERIODO</center></th><th><center>SALA</center></th><th><center>PAR ACADÉMICO</center></th><th><center>ASIGNATURA</center></th><th><center>DÍA</center></th><th><center>HORA</center></th><th><center>CELULAR</center></th><th><center>ACCIONES</center></th>");

          var edit = '<button type="button" class="btn btn-default" aria-label="center Align" data-toggle="modal" onclick="editarHorario(\'' + data[i]['periodo'] + '\', \'' + data[i]['sala'] + '\', \'' + data[i]['estudiante'] + '\', \'' + data[i]['asignatura'] + '\', \'' + data[i]['dia'] + '\', \'' + data[i]['mesa'] + '\')"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>'; 

          var del = '<button type="button" class="btn btn-default" aria-label="center Align" data-toggle="modal" onclick="delHorario(\'' + data[i]['periodo'] + '\', \'' + data[i]['sala'] + '\', \'' + data[i]['estudiante'] + '\', \'' + data[i]['asignatura'] + '\', \'' + data[i]['dia'] + '\', \'' + data[i]['mesa'] + '\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>'; 
          
          var email = '<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Enviar correo a estudiante"><a href="mailto:' + data[i]['email1'] + '&subject=Asistencia%20sala%20de%20tutorías%20CREE.&body=%20Estimado,%0D%0A %0D%0ASe%20encuentran%20estudiantes%20esperando%20para%20la%20monitoria%20programada %20el%20día%20de%20hoy.%0D%0A %0D%0AAuxiliar%20técnico%20de%20sala%20de%20tutorías%0D%0ACREE/Bloque%20F,%20segundo%20piso%0D%0ATel.%20+57%203509509%20Ext.%203098%0D%0Awww.uninorte.edu.co"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></button>';


            tr_table += '<tr><td><center>';
            tr_table += data[i]['periodo']; 
            tr_table += '</center></td><td><center>';
            tr_table += data[i]['sala'];
            tr_table += '</center></td><td><center>';
            tr_table += data[i]['estudiante'];
            tr_table += '</center></td><td><center>';
            tr_table += data[i]['asignatura'];
            tr_table += '</center></td><td><center>';
            tr_table += data[i]['dia'];
            tr_table += '</center></td><td><center>'
            tr_table += data[i]['horaInicio'] + ' - ' + data[i]['horaFin']; 
            tr_table += '</center></td><td><center>';
            tr_table += data[i]['celular'];
            tr_table += '</center></td><td><center>';
            tr_table += email +  edit + del;
            tr_table +=  '</center></td></tr>';

      } else if (data[i]['asignatura'] == asig && data[i]['estudiante'] == est){
         $('#res').html('');
         $("#tablas tr").remove();
         $("#tablas thead").html("<th><center>PERIODO</center></th><th><center>SALA</center></th><th><center>PAR ACADÉMICO</center></th><th><center>ASIGNATURA</center></th><th><center>DÍA</center></th><th><center>HORA</center></th><th><center>CELULAR</center></th><th><center>ACCIONES</center></th>");

          var edit = '<button type="button" class="btn btn-default" aria-label="center Align" data-toggle="modal" onclick="editarHorario(\'' + data[i]['periodo'] + '\', \'' + data[i]['sala'] + '\', \'' + data[i]['estudiante'] + '\', \'' + data[i]['asignatura'] + '\', \'' + data[i]['dia'] + '\', \'' + data[i]['mesa'] + '\')"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>'; 

          var del = '<button type="button" class="btn btn-default" aria-label="center Align" data-toggle="modal" onclick="delHorario(\'' + data[i]['periodo'] + '\', \'' + data[i]['sala'] + '\', \'' + data[i]['estudiante'] + '\', \'' + data[i]['asignatura'] + '\', \'' + data[i]['dia'] + '\', \'' + data[i]['mesa'] + '\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>'; 
          
          var email = '<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Enviar correo a estudiante"><a href="mailto:' + data[i]['email1'] + '&subject=Asistencia%20sala%20de%20tutorías%20CREE.&body=%20Estimado,%0D%0A %0D%0ASe%20encuentran%20estudiantes%20esperando%20para%20la%20monitoria%20programada %20el%20día%20de%20hoy.%0D%0A %0D%0AJhonatan%20Perez%20Arteta%0D%0AAuxiliar%20técnico%20de%20sala%20de%20tutorías%0D%0ACREE/Bloque%20F,%20segundo%20piso%0D%0ATel.%20+57%203509509%20Ext.%203098%0D%0Awww.uninorte.edu.co"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></button>';


            tr_table += '<tr><td><center>';
            tr_table += data[i]['periodo']; 
            tr_table += '</center></td><td><center>';
            tr_table += data[i]['sala'];
            tr_table += '</center></td><td><center>';
            tr_table += data[i]['estudiante'];
            tr_table += '</center></td><td><center>';
            tr_table += data[i]['asignatura'];
            tr_table += '</center></td><td><center>';
            tr_table += data[i]['dia'];
            tr_table += '</center></td><td><center>'
            tr_table += data[i]['horaInicio'] + ' - ' + data[i]['horaFin']; 
            tr_table += '</center></td><td><center>';
            tr_table += data[i]['celular'];
            tr_table += '</center></td><td><center>';
            tr_table += email +  edit + del;
            tr_table +=  '</center></td></tr>';

      }
  }
  $("#tablas tbody").html(tr_table);
  if (jQuery.isEmptyObject(tr_table)){
   $('#res').html('<div class="alert alert-danger" role="alert">No hay resultados para el filtro aplicado</div>');
  }
}

function editarHorario($periodo, $sala, $estudiante, $asignatura, $dia, $mesa, $horario){
  
  $('#form_horario').show();
  $('#myModal').modal('show');
  $('#titleModal').html('Editar horario ' + $asignatura);
  $('#form_edit').attr('action', url_edit);
  $('#edit_periodo').val($periodo);
  $('#edit_sala').val($sala);
  $('#edit_estudiante').val($estudiante);
  $('#edit_asignatura').val($asignatura);
  $('#edit_dia').val($dia);
  $('#edit_mesa').val($mesa);
  $('#edit_horario').val($horario);
  $('#actionForm').html('Confirmar edición');
  $('#actionForm').removeClass().addClass('btn btn-success');
}

function delHorario($periodo, $sala, $estudiante, $asignatura, $dia, $mesa){

  $('#form_horario').hide();
  $('#myModal').modal('show');
  $('#titleModal').html('Eliminar horario ' + $asignatura);
  $('#form_edit').attr('action', url_del);
  $('#edit_periodo').val($periodo);
  $('#edit_sala').val($sala);
  $('#edit_estudiante').val($estudiante);
  $('#edit_asignatura').val($asignatura);
  $('#edit_dia').val($dia);
  $('#edit_mesa').val($mesa);
  $('#actionForm').html('Eliminar');
  $('#actionForm').removeClass().addClass('btn btn-danger');

}

</script> 

 @endif
@endsection  