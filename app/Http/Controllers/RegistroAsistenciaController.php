<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\View;
use App\Mesa;
use App\Horario;
use App\Usuario;
use App\Asignatura;
use App\Estrategia;
use App\AsignacionHorario;
use App\Estudiante;
use App\Semana;
use Log;

class RegistroAsistenciaController extends Controller
{
  	public function index(){

	return view('admin.registroasistencia',[
			'horarios' 	=> $horarios,
			'mesas'		=> $mesas,
			'usuarios'	=> $usuarios,
			'asignaturas'=> $asignaturas,
			'estrategias'=> $estrategias
		]);

		  
	}

	public function mostrar(){
	       $asighorarios = AsignacionHorario::orderBy('id','ASC');
	       $estudiantes = Estudiante::all();
		   $horarios = Horario::all();
		   $mesas = Mesa::all();
		   $usuarios = Usuario::all();
		   $asignaturas = Asignatura::all();
		   $estrategias = Estrategia::all();
		   $semanas = Semana::all();

       $h=DB::table('asignaciones_horarios')
        ->Join('horarios', 'horarios.id', '=', 'asignaciones_horarios.horario')
        ->Join('estudiantes','estudiantes.id','=','asignaciones_horarios.monitor')
        ->Join('asignaturas','asignaturas.id','=','asignaciones_horarios.asignatura')
        ->Join('usuarios','usuarios.id','=','asignaciones_horarios.usuario')
        ->Join('estrategias','estrategias.id','=','asignaciones_horarios.estrategia')
        ->Join('mesas','mesas.id','=','asignaciones_horarios.mesa')
        ->select('asignaciones_horarios.horario',
        	     'asignaciones_horarios.monitor',
        	     'asignaciones_horarios.asignatura',
        	     'asignaciones_horarios.estrategia',
        	     'asignaciones_horarios.usuario',
        	     'asignaciones_horarios.mesa',
        	     'mesas.nombre as nummesa',
        	     'usuarios.nombre as nomusuario',
        	     'estrategias.nombre as nomestrateg',
        	     'horarios.dia as dia',
        	     'horarios.horaInicio as h1',
        	     'horarios.horaFin as h2',
        	     'estudiantes.nombre as nombre',
        	     'estudiantes.celular as celular',
        	     'estudiantes.email1 as email1',
        	     'asignaturas.nombre as nombreasig')
       
        ->get();

		return view('admin.registroasistencia',[
			'horarios' 		=> $horarios,
			'mesas'			=> $mesas,
			'usuarios'		=> $usuarios,
			'asignaturas'	=> $asignaturas,
			'estrategias'	=> $estrategias,
			'semanas' 		=> $semanas
		])->with('asighorarios',$h);

		  
	}


public static function consultardias($dia,$fechainicio,$fechafin){

           

           $asighorarios = AsignacionHorario::orderBy('id','ASC');
	       $estudiantes = Estudiante::all();
		   $horarios = Horario::all();
		   $mesas = Mesa::all();
		   $usuarios = Usuario::all();
		   $asignaturas = Asignatura::all();
		   $estrategias = Estrategia::all();
		   $semanas = Semana::all();

       $h=DB::table('asignaciones_horarios')
        ->Join('horarios', 'horarios.id', '=', 'asignaciones_horarios.horario')
        ->Join('estudiantes','estudiantes.id','=','asignaciones_horarios.monitor')
        ->Join('asignaturas','asignaturas.id','=','asignaciones_horarios.asignatura')
        ->Join('usuarios','usuarios.id','=','asignaciones_horarios.usuario')
        ->Join('estrategias','estrategias.id','=','asignaciones_horarios.estrategia')
        ->Join('mesas','mesas.id','=','asignaciones_horarios.mesa')
        ->select('asignaciones_horarios.horario',
        	     'asignaciones_horarios.monitor',
        	     'asignaciones_horarios.asignatura',
        	     'asignaciones_horarios.estrategia',
        	     'asignaciones_horarios.usuario',
        	     'asignaciones_horarios.mesa',
        	     'asignaciones_horarios.fechainicio',
        	     'asignaciones_horarios.fechafin',
                 'asignaciones_horarios.created_at',
        	     'mesas.nombre as nummesa',
        	     'usuarios.nombre as nomusuario',
        	     'estrategias.nombre as nomestrateg',
        	     'horarios.dia as dia',
        	     'horarios.horaInicio as h1',
        	     'horarios.horaFin as h2',
        	     'estudiantes.nombre as nombre',
        	     'estudiantes.celular as celular',
        	     'estudiantes.email1 as email1',
        	     'asignaturas.nombre as nombreasig')
        ->where('horarios.dia','=',$dia)
        ->where('asignaciones_horarios.fechainicio','>=',$fechainicio)
        ->where('asignaciones_horarios.fechafin','<=',$fechafin)
       
        ->get();

		return view('admin.registroasistencia',[
			
		])->with('horarios',$h);




      }

       public function mostraracordeon(Request $request){

 

         $lunes=RegistroAsistenciaController::consultardias('LUNES', $request->input('fechainicio'),$request->input('fechafin'));
       
         $martes=RegistroAsistenciaController::consultardias('MARTES', $request->input('fechainicio'),$request->input('fechafin'));
                

         $miercoles=RegistroAsistenciaController::consultardias('MIERCOLES', $request->input('fechainicio'),$request->input('fechafin'));
        


         $jueves=RegistroAsistenciaController::consultardias('JUEVES', $request->input('fechainicio'),$request->input('fechafin'));
    


         $viernes=RegistroAsistenciaController::consultardias('VIERNES', $request->input('fechainicio'),$request->input('fechafin'));
         


         $sabado=RegistroAsistenciaController::consultardias('SABADO', $request->input('fechainicio'),$request->input('fechafin'));
        
         $dias=collect([$lunes,$martes,$miercoles,$jueves,$viernes,$sabado]) ;

         dd($dias);
        return view('admin.registroasistencia',[
            
        ])->with('asighorarios',$dias);
       

     }


    }

 