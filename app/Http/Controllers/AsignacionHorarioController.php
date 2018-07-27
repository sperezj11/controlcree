<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\View;
use App\Http\Requests\AsignacionHorarioRequest;
use App\Mesa;
use App\Horario;
use App\Usuario;
use App\Asignatura;
use App\Estrategia;
use App\AsignacionHorario;
use App\Estudiante;
use App\Periodo;
use App\Sala;


class AsignacionHorarioController extends Controller
{

	public function index(){
	 	

		$horarios = Horario::all();
        $mesas = Mesa::all();
        $usuarios = Usuario::all();
        $asignaturas = Asignatura::orderBy('nombre')->get();
        $estrategias = Estrategia::all();
        $periodos = Periodo::all();
		$salas = Sala::all();

		//dd($salas);

		return view('admin.asighorario',[
			'horarios' 	=> $horarios,
			'mesas'		=> $mesas,
			'usuarios'	=> $usuarios,
			'asignaturas'=> $asignaturas,
			'estrategias'=> $estrategias,
			'periodos'   => $periodos,
			'salas'      => $salas
		]);
	}

	public function mostrar(){

       	$h = DB::select(DB::raw("
		    SELECT v.periodo, v.sala, v.estudiante, v.asignatura, v.dia, v.horaInicio, v.horaFin, v.mesa,v.celular,v.email1
			FROM (
				SELECT s.nombre sala, p.nombre periodo, ELT(WEEKDAY(ah.fecha) + 1, 'LUNES', 'MARTES', 'MIÉRCOLES', 'JUEVES', 'VIERNES', 'SÁBADO', 'DOMINGO') dia, h.horaInicio, h.horaFin, m.nombre mesa, ag.nombre asignatura, e.nombre estudiante,e.celular,e.email1
				FROM asignaciones_horarios ah, salas s, periodos p, horarios h, mesas m, asignaturas ag, estudiantes e
				WHERE ah.sala = s.id
				AND ah.periodo = p.id
				AND ah.horario = h.id
				AND ah.mesa = m.id
				AND ah.asignatura = ag.id
				AND ah.monitor = e.id

			) v
			GROUP BY v.sala, v.periodo, v.dia, v.horaInicio, v.horaFin, v.mesa, v.asignatura, v.estudiante, v.celular,v.email1
			ORDER BY 1,2,3,4,5,6,7,8
		"));

      	$estudiantes = DB::select(DB::raw("
      		SELECT ah.monitor, es.nombre
			FROM asignaciones_horarios ah, estudiantes es
			WHERE ah.monitor = es.id
			GROUP BY ah.monitor, es.nombre
      	"));

      	$asignatura = DB::select(DB::raw("
      		SELECT ah.asignatura, ag.nombre
			FROM asignaciones_horarios ah, asignaturas ag
			WHERE ah.asignatura = ag.id
			GROUP BY ah.asignatura, ag.nombre
      	"));

      	$horarios = DB::select(DB::raw("
      		SELECT id, horaInicio, horaFin 
			FROM horarios
      	"));

        //dd($horarios);
		return view('admin.listarhorarios', [
			'asighorarios'	=> $h,
			'estudiantes'	=> $estudiantes,
			'asignatura'	=> $asignatura,
			'horarios'		=> $horarios
		]);
      
		  
	}

	public function editAsigHorario(AsignacionHorarioRequest $request)
	{
		//dd($request);

		$num_dia = 0;
		switch ($request->edit_dia) {
			case 'LUNES':
				$num_dia = 0;
				break;
			case 'MARTES':
				$num_dia = 1;
				break;
			case 'MIÉRCOLES':
				$num_dia = 2;
				break;
			case 'JUEVES':
				$num_dia = 3;
				break;
			case 'VIERNES':
				$num_dia = 4;
				break;
			case 'SÁBADO':
				$num_dia = 5;
				break;
			case 'DOMINGO':
				$num_dia = 6;
				break;
		}

		$registro = DB::select(DB::raw("
      		SELECT ah.id
			FROM asignaciones_horarios ah, salas s, periodos p, horarios h, mesas m, asignaturas ag, estudiantes e
			WHERE ah.sala = s.id
			AND ah.periodo = p.id
			AND ah.horario = h.id
			AND ah.mesa = m.id
			AND ah.asignatura = ag.id
			AND ah.monitor = e.id
			AND s.nombre = '$request->edit_sala'
			AND p.nombre = $request->edit_periodo
			AND WEEKDAY(ah.fecha) = $num_dia
			AND m.nombre = '$request->edit_mesa'
			AND ag.nombre = '$request->edit_asignatura'
			AND e.nombre = '$request->edit_estudiante'
      	"));

      	//dd($registro);

      	foreach ($registro as $key) {
      		DB::table('asignaciones_horarios')->where('id', $key->id)->update(['horario' => $request->edit_horario]);
      	}
      	DB::commit();
      	flash('Actualización de horario realizado con éxito')->success();

      	return redirect()->route('listarhorarios');

	}

	public function delAsigHorario(request $request)
	{
		//dd($request);

		$num_dia = 0;
		switch ($request->edit_dia) {
			case 'LUNES':
				$num_dia = 0;
				break;
			case 'MARTES':
				$num_dia = 1;
				break;
			case 'MIÉRCOLES':
				$num_dia = 2;
				break;
			case 'JUEVES':
				$num_dia = 3;
				break;
			case 'VIERNES':
				$num_dia = 4;
				break;
			case 'SÁBADO':
				$num_dia = 5;
				break;
			case 'DOMINGO':
				$num_dia = 6;
				break;
		}

		$registro = DB::select(DB::raw("
      		SELECT ah.id
			FROM asignaciones_horarios ah, salas s, periodos p, horarios h, mesas m, asignaturas ag, estudiantes e
			WHERE ah.sala = s.id
			AND ah.periodo = p.id
			AND ah.horario = h.id
			AND ah.mesa = m.id
			AND ah.asignatura = ag.id
			AND ah.monitor = e.id
			AND s.nombre = '$request->edit_sala'
			AND p.nombre = $request->edit_periodo
			AND WEEKDAY(ah.fecha) = $num_dia
			AND m.nombre = '$request->edit_mesa'
			AND ag.nombre = '$request->edit_asignatura'
			AND e.nombre = '$request->edit_estudiante'
      	"));

      	//dd($registro);

      	foreach ($registro as $key) {
      		DB::table('asignaciones_horarios')->where('id', '=', $key->id)->delete();
      	}
      	DB::commit();
      	flash('Horario ha sido desprogramado con éxito')->error();

      	return redirect()->route('listarhorarios');

	}

	public function mostrarhorarios(){
		 
		$salas 		= Sala::all();
		$horario 	= Horario::all(); 

		$h = DB::select(DB::raw("
			SELECT ah.id, s.nombre sala, ah.fecha fecha, h.horaInicio h1, h.horaFin h2, m.nombre mesa, ag.nombre asignatura, e.nombre estrategia, u.nombre usuario, ah.monitor codigo, es.nombre, es.celular, es.email1
			FROM asignaciones_horarios ah, horarios h, salas s, mesas m, asignaturas ag, estrategias e, usuarios u, estudiantes es
			WHERE ah.estado = 'A'
            AND ah.horario = h.id
			AND ah.sala = s.id
			AND ah.mesa = m.id
			AND ah.asignatura = ag.id
			AND ah.estrategia = e.id
			AND ah.usuario = u.id
			AND ah.monitor = es.id
		"));
		
        return view('admin.vistahorarios', [
        	'horarios_asignados' => $h,
        	'salas'				 => $salas,
        	'horarios'			 => $horario,
        	'url'				 => env('APP_URL').'/server.php/',
        	'sel_sala'  		 => '0',
            'sel_fecha' 		 => '0',
            'sel_hor'   		 => '0'
        ]);
		 
	}

	public function mostrarhorarios1(){
		 
		$salas 		= Sala::all();
		$horario 	= Horario::all(); 

		$h = DB::select(DB::raw("
			SELECT ah.id, s.nombre sala, ah.fecha fecha, h.horaInicio h1, h.horaFin h2, m.nombre mesa, ag.nombre asignatura, e.nombre estrategia, u.nombre usuario, ah.monitor codigo, es.nombre, es.celular, es.email1
			FROM asignaciones_horarios ah, horarios h, salas s, mesas m, asignaturas ag, estrategias e, usuarios u, estudiantes es
			WHERE ah.horario = h.id
			AND ah.sala = s.id
			AND ah.mesa = m.id
			AND ah.asignatura = ag.id
			AND ah.estrategia = e.id
			AND ah.usuario = u.id
			AND ah.monitor = es.id
		"));
		
        return view('admin.vistahorarios1', [
        	'horarios_asignados' => $h,
        	'salas'				 => $salas,
        	'horarios'			 => $horario,
        	'url'				 => env('APP_URL').'/server.php/'
        ]);
		 
	}


	public function store(AsignacionHorarioRequest $request){

		$horarios = Horario::all();
		$semana = new \Carbon\Carbon($request->fecha);
		$no_semana = $semana->format('W');
		
		$asighorario = new AsignacionHorario($request->all());
		$asighorario->semana = $no_semana;

		/*
		Domingo -> 0,
		Lunes -> 1, 
		Martes -> 2,
		...
		Viernes -> 5,
		Sabado -> 6
		*/

		$dias = array();

		$dias[0] = false;

		if (isset($request->check_lunes)){
			$dias[1] = true;
		} else {
			$dias[1] = false;
		}

		if (isset($request->check_martes)){
			$dias[2] = true;
		} else {
			$dias[2] = false;
		}

		if (isset($request->check_miercoles)){
			$dias[3] = true;
		} else {
			$dias[3] = false;
		}

		if (isset($request->check_jueves)){
			$dias[4] = true;
		} else {
			$dias[4] = false;
		}

		if (isset($request->check_viernes)){
			$dias[5] = true;
		} else {
			$dias[5] = false;
		}

		if (isset($request->check_sabado)){
			$dias[6] = true;
		} else {
			$dias[6] = false;
		}

		$id_asignatura = DB::SELECT(DB::raw("
			SELECT id
			FROM asignaturas
			WHERE nombre like '%$asighorario->asignatura%'
		"));
		
        $fecha 		= new \Carbon\Carbon($asighorario->fechainicio);
        $fecha_2 	= new \Carbon\Carbon($asighorario->fechafin);

        $errores = array();

        $fechas = array();

        while ($fecha->lte($fecha_2)) {
        	array_push($fechas, ['fecha' => $fecha->toDateString(), 'dia' => $dias[$fecha->dayOfWeek] ]);
        	$fecha = $fecha->addDays(1);
        }
        
        foreach ($fechas as $key_fecha) {
        	if ($key_fecha['dia']){

		        $no_mesa_en_uso = DB::SELECT(DB::raw("
		        	SELECT count(mesa) no_mesa_en_uso
					FROM asignaciones_horarios
					WHERE fecha = '".$key_fecha['fecha']."'
					AND horario = $asighorario->horario
					AND sala = $asighorario->sala
		        "));

		        if ($no_mesa_en_uso[0]->no_mesa_en_uso == 10){
					array_push($errores, array('isError' => true, 'fecha' => $key_fecha['fecha'], 'mensaje' => 'No hay mesas disponibles en horario '.$horario->horaInicio.' - '.$horario->horaFin));
		        } else {
		        	//Verifica si la mesa está en uso
					$mesa_en_uso = DB::SELECT(DB::raw("
			        	SELECT mesa mesa_en_uso
						FROM asignaciones_horarios
						WHERE fecha = '".$key_fecha['fecha']."'
						AND horario = $asighorario->horario
						AND sala = $asighorario->sala
			        "));

			        //print_r($fecha->lte($fecha_2)); /*---  Hasta aquí  --- 
					$status = true;
			        foreach ($mesa_en_uso as $key) {
			        	if ($key->mesa_en_uso == $asighorario->mesa){
			        		$horario = $horarios->find($asighorario->horario);
			        		array_push($errores, array('isError' => true, 'fecha' => $key_fecha['fecha'], 'mensaje' => 'Mesa '. $asighorario->mesa .' se encuentra en uso en horario '.$horario->horaInicio.' - '.$horario->horaFin));
			        		$status = false;
			        	}
			        } 

			        if ($status){
			        	$id = DB::SELECT(DB::raw("
				        	SELECT count(id) no
							FROM asignaciones_horarios
							WHERE fecha = '".$key_fecha['fecha']."'
							AND horario = $asighorario->horario
							AND mesa = $asighorario->mesa
							AND sala = $asighorario->sala
				        "));

				        if ($id[0]->no == 0){
			        		DB::table('asignaciones_horarios')->insert(
							    [
									'sala'       => $asighorario->sala,
									'periodo'    => $asighorario->periodo,
								    'fecha'		 => $key_fecha["fecha"], 
								    'horario'    => $asighorario->horario,
								    'mesa'       => $asighorario->mesa,
								    'usuario'    => $asighorario->usuario,
								    'monitor'    => $asighorario->monitor,
								    'asignatura' => $id_asignatura[0]->id,
								    'estrategia' => $asighorario->estrategia,
								    'created_at' => \Carbon\Carbon::now()
							    ]
							);
							DB::commit();
							array_push($errores, array('isError' => false, 'fecha' => $key_fecha['fecha'], 'mensaje' => 'Registro exitoso'));
						} else {
							array_push($errores, array('isError' => true, 'fecha' => $key_fecha['fecha'], 'mensaje' => 'Registro existente'));
						}
			        }
		        }
        	}
        }

        $data_valido  = '¡Asignacion de Horario sin errores!<br>';
        $data_errores = '¡Asignacion de Horario con novedades!<br>';

        if (isset($errores)){
        	foreach ($errores as $key) {
        		if ($key['isError']){
        			$data_errores .= $key['fecha'].' -> '.$key['mensaje'].'<br>';
        		} else {
        			$data_valido .= $key['fecha'].' -> '.$key['mensaje'].'<br>';
        		}
        	}
        	if (strlen($data_valido)>40){
        		flash($data_valido)->success();
        	}
        	if (strlen($data_errores)>42){
        		flash($data_errores)->error();
        	}
			return redirect()->route('asignacionhorario');
		}
	}

  	/*public function update(AsignacionHorarioRequest $request, $id)
    {

    	$id_asignatura = DB::SELECT(DB::raw("
			SELECT id
			FROM asignaturas
			WHERE nombre like '%$asighorario->asignatura%'
		"));

      	$horariosasignado =AsignacionHorario::find($id);
      	$horariosasignado ->sala = $request->sala;
        $horariosasignado ->periodo = $request->periodo;
        $horariosasignado ->fechainicio = $request->fechainicio;
	    $horariosasignado ->fechafin = $request->fechafin;
		$horariosasignado ->horario = $request->horario;
		$horariosasignado ->mesa = $request->mesa;
		$horariosasignado ->usuario = $request->usuario;
		$horariosasignado ->monitor = $request->monitor;
		$horariosasignado ->asignatura = $request->asignatura; 
		$horariosasignado ->estrategia = $request->estrategia;

        $horariosasignado->save();

        return redirect()->route('listarhorarios');
    
    }

	public  function consultardias(){

           $asighorarios = AsignacionHorario::orderBy('id','ASC');
	       $estudiantes = Estudiante::all();
		   $horarios = Horario::all();
		   $mesas = Mesa::all();
		   $usuarios = Usuario::all();
		   $asignaturas = Asignatura::all();
		   $estrategias = Estrategia::all();
		   //$semanas = Semana::all();
		   $periodos = Periodo::all();
		   $salas = Sala::all();

            $fecha='2018-01-22';
            $periodo='1';
            $horario='4';
            $sala='2';
       $cons=DB::table('asignaciones_horarios')
        ->Join('horarios', 'horarios.id', '=', 'asignaciones_horarios.horario')
        ->Join('estudiantes','estudiantes.id','=','asignaciones_horarios.monitor')
        ->Join('asignaturas','asignaturas.id','=','asignaciones_horarios.asignatura')
        ->Join('usuarios','usuarios.id','=','asignaciones_horarios.usuario')
        ->Join('estrategias','estrategias.id','=','asignaciones_horarios.estrategia')
        ->Join('mesas','mesas.id','=','asignaciones_horarios.mesa')
        ->Join('periodos','periodos.id','=','asignaciones_horarios.periodo')
         ->Join('salas','salas.id','=','asignaciones_horarios.sala')
        ->select('asignaciones_horarios.monitor',
        	     'asignaciones_horarios.fecha',
        	     'asignaciones_horarios.periodo',
        	     'asignaciones_horarios.created_at',
        	     'salas.nombre as nombredesala',
        	     'periodos.nombre as periodo',
        	     'mesas.nombre as nummesa',
        	     'usuarios.nombre as nomusuario',
        	     'estrategias.nombre as nomestrateg',
        	     'horarios.horaInicio as h1',
        	     'horarios.horaFin as h2',
        	     'estudiantes.nombre as nombre',
        	     'estudiantes.celular as celular',
        	     'estudiantes.email1 as email1',
        	     'asignaturas.nombre as nombreasig')
         ->where('asignaciones_horarios.fecha','=',$fecha)
         ->where('asignaciones_horarios.periodo','=',$periodo)
         ->where('asignaciones_horarios.horario','=',$horario)
         ->where('asignaciones_horarios.sala','=',$sala)
         ->get();        
              
         dd($cons);
           

}*/
    
	public function create(){

	}

	public function show($id){
		
	}
	public function destroy($id){
		
		AsignacionHorario::destroy($id);
		return back();

	}

	public function edit($id){
	 
	    $horariosasignado =AsignacionHorario::find($id);
	 	$horarios = Horario::all();
        $mesas = Mesa::all();
        $usuarios = Usuario::all();
        $asignaturas = Asignatura::orderBy('nombre')->get();
        $estrategias = Estrategia::all();
	    $estudiante = Estudiante::find($horariosasignado->monitor);
	    $periodos = Periodo::all();
	    $salas = Sala::all();
      return view('admin.edit',[
			'horarios' 	=> $horarios,
			'mesas'		=> $mesas,
			'usuarios'	=> $usuarios,
			'asignaturas'=> $asignaturas,
			'estrategias'=> $estrategias,
		    'estudiante'=> $estudiante,
		    'periodos'=> $periodos,
		    'salas'=> $salas
		])->with('asighorarios',$horariosasignado);
	}
}
