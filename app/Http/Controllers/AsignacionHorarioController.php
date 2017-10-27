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


class AsignacionHorarioController extends Controller
{

	public function index(){
		$horarios = Horario::all();
        $mesas = Mesa::all();
        $usuarios = Usuario::all();
        $asignaturas = Asignatura::orderBy('nombre')->get();
        $estrategias = Estrategia::all();
		
		return view('admin.asighorario',[
			'horarios' 	=> $horarios,
			'mesas'		=> $mesas,
			'usuarios'	=> $usuarios,
			'asignaturas'=> $asignaturas,
			'estrategias'=> $estrategias
		]);
	}



	public function mostrar(){
	       $asighorarios = AsignacionHorario::orderBy('id','ASC')->paginate(5);
	       $estudiantes = Estudiante::all();
		   $horarios = Horario::all();
		   $mesas = Mesa::all();
		   $usuarios = Usuario::all();
		   $asignaturas = Asignatura::all();
		   $estrategias = Estrategia::all();

       $h=DB::table('asignaciones_horarios')
        ->Join('horarios', 'horarios.id', '=', 'asignaciones_horarios.horario')
        ->Join('estudiantes','estudiantes.id','=','asignaciones_horarios.monitor')
        ->Join('asignaturas','asignaturas.id','=','asignaciones_horarios.asignatura')
        ->Join('usuarios','usuarios.id','=','asignaciones_horarios.usuario')
        ->Join('estrategias','estrategias.id','=','asignaciones_horarios.estrategia')
        ->select('asignaciones_horarios.horario',
        	     'asignaciones_horarios.monitor',
        	     'asignaciones_horarios.asignatura',
        	     'asignaciones_horarios.id as id',
        	     'horarios.dia as dia',
        	     'horarios.horaInicio as h1',
        	     'horarios.horaFin as h2',
        	     'estudiantes.nombre as nombre',
        	     'estudiantes.celular as celular',
        	     'estudiantes.email1 as email1',
        	     'asignaturas.nombre as nombreasig')
       
        ->get();


          


		return view('admin.listarhorarios')->with('asighorarios',$h);

		  
	}


	public function store(AsignacionHorarioRequest $request){
		//dd($request->all());

		$semana = new \Carbon\Carbon($request->fecha);
		$no_semana = $semana->format('W');
		
		$asighorario = new AsignacionHorario($request->all());
		$asighorario->semana = $no_semana;
		//dd($asighorario->semana);

    	DB::table('asignaciones_horarios')->insert(
		    [
				'semana' => $asighorario->semana,
			    'fechainicio' => $asighorario->fechainicio, 
			    'fechafin' => $asighorario->fechafin, 
			    'horario' => $asighorario->horario,
			    'mesa' => $asighorario->mesa,
			    'usuario' => $asighorario->usuario,
			    'monitor' => $asighorario->monitor,
			    'asignatura' => $asighorario->asignatura,
			    'estrategia' => $asighorario->estrategia
		    ]
		);
		DB::commit();
		flash()->overlay('Asignacion de Horario exitosa!', 'Yay');
		//flash('Asignacion de Horario exitosa!')->success();
    	return view('main') ;

	}
  public function update(AsignacionHorarioRequest $request, $id)
    {
       $asighorario =AsignacionHorario::find($id);

        $asighorario->semana= $request->semana;
	    $asighorario->fechainicio = $request->fechainicio;
	    $asighorario->fechafin = $request->fechafin;
		$asighorario->horario = $request->horario;
		$asighorario->mesa = $request->mesa;
		$asighorario->usuario = $request->usuario;
		$asighorario->monitor = $request->monitor;
		$asighorario->asignatura = $request->asignatura; 
		$asighorario->estrategia = $request->estrategia;

        $asighorario->save();

        return redirect()->route('admin.listarhorarios');
    }

	public function create(){

	}

	public function show($id){
		
	}

	public function edit($id){
	 
	    $horariosasignado =AsignacionHorario::find($id);
	 	$horarios = Horario::all();
        $mesas = Mesa::all();
        $usuarios = Usuario::all();
        $asignaturas = Asignatura::orderBy('nombre')->get();
        $estrategias = Estrategia::all();
	    $estudiantes = Estudiante::all();
      return view('admin.edit',[
			'horarios' 	=> $horarios,
			'mesas'		=> $mesas,
			'usuarios'	=> $usuarios,
			'asignaturas'=> $asignaturas,
			'estrategias'=> $estrategias,
		    'estudiantes'=> $estudiantes
		])->with('asighorarios',$horariosasignado);
	}
}
