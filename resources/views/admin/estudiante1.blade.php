@extends('main')

@section('title', 'Estudiantes')

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
   <title>Estudiantes</title>
</head>
<div class="container">
<div class="panel panel-info">
   <div class="panel-heading">Estudiantes</div>
   <div class="panel-body">
      <?php 
         $option_paracad = "";

         foreach ($estudiantes as $key ) {
            $option_paracad .= '<option value="'.$key->id.'">'.$key->nombre.'</option>';
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
            <th><center>CODIGO</center></th>
            <th><center>NOMBRE</center></th>
            <th><center>CELULAR</center></th>
            <th><center>CORREO UNINORTE</center></th>
            <th><center>CORREO PERSONAL</center></th>
            <th><center>ACCIONES</center></th>   
         </thead>
         <tbody>
            @foreach($estudiantes as $e )
            <tr>    
               <td><center>{{ $e-> id}}</center></td>
               <td>{{ $e-> nombre }}</td>
               <td><center>{{ $e-> celular}}</center></td>
               <td><center>{{ $e-> email1}}</center></td>
               <td><center>{{ $e-> email2 }}</center></td>
              
               <td width="15%">

                 <center> <button type="button" class="btn btn-default" aria-label="center Align" data-toggle="tooltip" onclick="editarEstudiante('{{ $e->id }}','{{ $e->nombre }}', '{{ $e->celular }}', '{{ $e->email1 }}','{{ $e->email2 }}')" data-placement="bottom" title="Editar estudiante">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                  </button>
                 <button type="button" class="btn btn-default" aria-label="center Align" data-toggle="tooltip" onclick="delEstudiante('{{ $e->id }}','{{ $e->nombre }}', '{{ $e->celular }}', '{{ $e->email1 }}','{{ $e->email2 }}')" data-placement="bottom" title="Eliminar estudiante">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                  </button></center>
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
        <h4 id="titleModal" class="modal-title" id="myModalLabel">Modificar Estudiante</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{!! route('upd_listarestudiantes') !!}" id="form_edit">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="edit_id">Codigo</label>
            <input type="text" class="form-control" name="edit_id" id="edit_id">
          </div>
          <div class="form-group">
            <label for="edit_nombre">Nombre</label>
            <input type="text" class="form-control" name="edit_nombre" id="edit_nombre" >
          </div>
          <div class="form-group">
            <label for="edit_celular">Celular</label>
            <input type="text" class="form-control" name="edit_celular" id="edit_celular" >
          </div>
          <div class="form-group">
            <label for="edit_email1">Correo Uninorte</label>
            <input type="text" class="form-control" name="edit_email1" id="edit_email1" >
          </div>
          <div class="form-group">
            <label for="edit_email2">Correo personal</label>
            <input type="text" class="form-control" name="edit_email2" id="edit_email2" >
          </div>
        
          <button id="actionForm" type="submit" class="btn btn-default">Modificar horario</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  var url_edit = "{!! route('upd_listarestudiantes') !!}";
  var url_del = "{!! route('del_listarestudiantes') !!}";

function busq(){
  var est     = $("#estudiante").val();
  var data  = <?php echo json_encode($estudiantes); ?>;
  var tr_table = '';

  for (var i = 0; i < data.length; i++) {
      if (jQuery.isEmptyObject(est)){
         $('#res').html('<div class="alert alert-danger" role="alert">Debe seleccionar un valor en los campos asígnatura y estudiante</div>');
      } else if ( (data[i]['nombre'] == est) ){

         $('#res').html('');
         $("#tablas tr").remove();
         $("#tablas thead").html("<th><center>CÓDIGO</center></th><th><center>NOMBRE</center></th><th><center>CELULAR</center></th><th><center>CORREO UNINORTE</center></th><th><center>CORREO PERSONAL</center></th><th><center>ACCIONES</center></th>");

          var edit = '<button type="button" class="btn btn-default" aria-label="center Align" data-toggle="modal" onclick="editarEstudiante(\'' + data[i]['id'] + '\', \'' + data[i]['nombre'] + '\', \'' + data[i]['celular'] + '\', \'' + data[i]['email1'] + '\', \'' + data[i]['email2'] + '\')"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>'; 

          var del = '<button type="button" class="btn btn-default" aria-label="center Align" data-toggle="modal" onclick="delEstudiante(\'' + data[i]['id'] + '\', \'' + data[i]['nombre'] + '\', \'' + data[i]['celular'] + '\', \'' + data[i]['email1'] +  '\', \'' + data[i]['email2'] + '\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>'; 
          
            tr_table += '<tr><td><center>';
            tr_table += data[i]['id']; 
            tr_table += '</center></td><td><center>';
            tr_table += data[i]['nombre'];
            tr_table += '</center></td><td><center>';
            tr_table += data[i]['celular'];
            tr_table += '</center></td><td><center>';
            tr_table += data[i]['email1'];
            tr_table += '</center></td><td><center>';
            tr_table += data[i]['email2'];
            tr_table += '</center></td><td><center>';
            tr_table += edit + del;
            tr_table +=  '</center></td></tr>';

      } 
  }
  $("#tablas tbody").html(tr_table);
  if (jQuery.isEmptyObject(tr_table)){
   $('#res').html('<div class="alert alert-danger" role="alert">No hay resultados para el filtro aplicado</div>');
  }
}

function editarEstudiante($id, $nombre, $celular, $email1, $email2){
  
  $('#form_estudiante').show();
  $('#myModal').modal('show');
  $('#titleModal').html('Editar Estudiante ' + $nombre);
  $('#form_edit').attr('action', url_edit);
  $('#edit_id').val($id);
  $('#edit_nombre').val($nombre);
  $('#edit_celular').val($celular);
  $('#edit_email1').val($email1);
  $('#edit_email2').val($email2);
  $('#actionForm').html('Confirmar edición');
  $('#actionForm').removeClass().addClass('btn btn-success');
}

function delEstudiante($id, $nombre, $celular, $email1, $email2){

  $('#form_estudiante').hide();
  $('#myModal').modal('show');
  $('#titleModal').html('Eliminar Estudiante ' + $nombre);
  $('#form_edit').attr('action', url_del);
  $('#edit_id').val($id);
  $('#edit_nombre').val($nombre);
  $('#edit_celular').val($celular);
  $('#edit_email1').val($email1);
  $('#edit_email2').val($email2);
  $('#actionForm').html('Eliminar');
  $('#actionForm').removeClass().addClass('btn btn-danger');

}

</script> 

 @endif
@endsection  
