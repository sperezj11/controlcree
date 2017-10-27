@extends('main')

@section('title', 'Listar Horarios')

@section('content')

<head>
  <title>mostrar datos</title>
</head>
  <div class="container">
<div class="panel panel-primary">



  <!-- Default panel contents -->

 
  <div class="panel-heading">TUTORIA EN SALA</div>
  
  <!-- Table -->
  <table class="table table-striped" id="tabla">


    <thead>

       <tr>
      <td colspan="4">
        <input id="buscar" type="text" class="form-control" placeholder="Escriba algo para filtrar" />
      </td>
    </tr>
    <th><center>ASIGNATURA</center></th>
    <th><center>DÍA</center></th>
    <th><center>HORA</center></th>
    <th><center>CODIGO</center></th>
    <th><center>PAR ACADÉMICO</center></th>
    <th><center>CELULAR</center></th>
    <th><center>CORREO</center></th>
    <th><center>ACCIONES</center></th>
   
    </thead>
      <tbody>
        @foreach($asighorarios as $h )

      <tr>
    
              <td>{{ $h -> nombreasig}}</td>
              <td><center>{{ $h-> dia }}</center></td>
              <td><center>{{ $h-> h1."-".$h->h2}}</center></td>
              <td><center>{{ $h -> monitor}}</center></td>
              <td><center>{{ $h -> nombre}}</center></td>
              <td><center>{{ $h -> celular}}</center></td>
              <td><center>{{ $h -> email1}}</center></td>
              <td> <div class="btn-group btn-group-xs">
                <a href="{{ route('asignacionhorario.edit', $h-> id) }}">Editar</a>
                <button type="button" class="btn btn-primary">Eliminar</button>
              </div></td>
            </div>
      </tr>
        @endforeach         
      </tbody>
  </table>

</div>
</div>
  <script type="text/javascript">

var busqueda = document.getElementById('buscar');
    var table = document.getElementById("tabla").tBodies[0];

    buscaTabla = function(){
      texto = busqueda.value.toLowerCase();
      var r=0;
      while(row = table.rows[r++])
      {
        if ( row.innerText.toLowerCase().indexOf(texto) !== -1 )
          row.style.display = null;
        else
          row.style.display = 'none';
      }
    }

    busqueda.addEventListener('keyup', buscaTabla);</script> 



@endsection  

