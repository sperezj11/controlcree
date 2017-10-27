@extends('main')

@section('title', 'Registro de asistencia')

@section('content')
 <div class="container">
<div class="panel panel-primary">
  <div class="panel-heading">
    Programacion de sala
  </div>

  <div class="panel-footer"><br>
     <form class="form-horizontal" role="form" method="GET" action="{{ route('mostraracordeon') }}">
      {{ csrf_field() }}
    <label class="col-lg-2 control-label">Inicio/Fin:</label>
    <div class="col-lg-3">
        <input type="date" class="form-control" id="fechainicio" placeholder="Fechainicio" name="fechainicio">
    </div>
       <div class="col-lg-3">
        <input type="date" class="form-control" id="fechafin" placeholder="Fechafin" name="fechafin">
    </div>

              <div class="form-group">
                 <button type="submit" class="btn btn-primary" id="btn-consultar" name="btn-consultar">
                       Buscar
                  </button>
              </div>
        </form>

    <br>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  
<!-- Lunes -->

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          LUNES
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
contenido Lunes
      </div>
    </div>
  </div>

  <!-- Martes -->

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          MARTES
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        Contenido día Martes
      </div>
    </div>
  </div>

  <!-- Miercoles -->

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          MIERCOLES
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
      <div id="contenido_miercoles">
        
      </div>
        Contenido día Miercoles
      </div>
    </div>
  </div>

<!-- Jueves -->

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          JUEVES
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        Contenido día Jueves
      </div>
    </div>
  </div>

  <!-- Viernes -->

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          VIERNES
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        Contenido día Viernes
      </div>
    </div>
  </div>

  <!-- Sábado -->

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          SÁBADO
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        Contenido día Sábado
      </div>
    </div>
  </div>

</div>
</div>
</div></div>




@endsection

@section('page-script')
<script type="text/javascript">
  function myFunction(horarios) {
    var x = document.getElementById("fecha").value;
    console.log(x)
    document.getElementById("contenido_miercoles").textContent = x;
  }
</script>
 <script src="js/registroasistencia.js"></script>
</script>
@endsection 
