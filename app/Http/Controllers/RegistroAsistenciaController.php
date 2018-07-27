<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\View;
use App\Http\Requests\AsignacionHorarioRequest;
use App\Http\Requests\RegistroAsistenciaRequest;
use App\Mesa;
use App\Horario;
use App\Usuario;
use App\Asignatura;
use App\Estrategia;
use App\AsignacionHorario;
use App\RegistroAsistencia;
use App\Estudiante;
use App\Sala;
use App\Semana;
use App\EstadoAsistencia;
use Log;
use Response;

class RegistroAsistenciaController extends Controller
{
  	public function index(){

	return view('admin.registroasistencia',[
			'horarios' 	=> $horarios,
			'mesas'		=> $mesas,
			'usuarios'	=> $usuarios,
			'asignaturas'=> $asignaturas,
			'estrategias'=> $estrategias,
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
        $dias=collect();


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
			'semanas' 		=> $semanas,
            'dias'          => $dias
		])->with('asighorarios',$h);

		  
	}
public function mostrarasistencia(){
       $registroasistencia= RegistroAsistencia::orderBy('id','ASC');
       $asignaciones_horarios = AsignacionHorario::all();
       $estados_asistencias=EstadoAsistencia::all();
       $estudiantes = Estudiante::all();
       $horarios = Horario::all();
       $mesas = Mesa::all();
       $usuarios = Usuario::all();
       $asignaturas = Asignatura::all();
       $estrategias = Estrategia::all();
       $semanas = Semana::all();
       $dias=collect();
       
       $cont = DB::table('registros_asistencias')
                     ->select(DB::raw('count(*) as asistencia_count, asistencia'))
                     ->where('asistencia', '=', 1)
                     ->groupBy('asistencia')
                     ->get();

             $q=DB::table('registros_asistencias')
                 ->Join('estados_asistencias','estados_asistencias.id','=','registros_asistencias.asistencia')
                 -> select('sala','fecha','codigo','monitor','asignatura','horario','asistencia','estados_asistencias.estado','descripcion')->get();

                    $s = DB::select(DB::raw("
                SELECT `codigo`,`monitor`, `asignatura`,
                sum(estados_asistencias.id=1) as PEN,
                sum(estados_asistencias.id=2) as SI,
                sum(estados_asistencias.id=3) as NO,
                sum(estados_asistencias.id=4) as EXC
                FROM registros_asistencias
                INNER JOIN estados_asistencias ON registros_asistencias.asistencia=estados_asistencias.id
               
                 GROUP BY `codigo`,`monitor`, `asignatura`

                 "));


                return view('admin.vistaasistencias',[
                        'horarios'      => $horarios,
                        'mesas'         => $mesas,
                        'usuarios'      => $usuarios,
                        'asignaturas'   => $asignaturas,
                        'estrategias'   => $estrategias,
                        'semanas'       => $semanas,
                        'estados_asistencias'    =>$estados_asistencias,
                        'dias'          => $dias
                    ])->with('registroasistencia',$s);
        
    }
      public function store(Request  $request){
        //dd($request);

        DB::table('registros_asistencias')->insert(
            [  
                'sala'       => $request->edit_sala,
                'fecha'      => $request->edit_fecha,
                'codigo'     => $request->edit_cod,
                'monitor'    => $request->edit_estudiante,
                'asignatura' => $request->edit_asignatura,
                'horario'    => $request->edit_horario, 
                'asistencia' => $request->edit_estado, 
                'descripcion'=> $request->edit_desc
               
            ]
        );

        DB::table('asignaciones_horarios')->where('id', $request->id_ah)->update(['estado' => 'I']);

        DB::commit();

        flash('Registro de asistencia guardada con éxito')->success();
        
        $salas      = Sala::all();
        $horario    = Horario::all(); 

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
            'salas'              => $salas,
            'horarios'           => $horario,
            'url'                => env('APP_URL').'/server.php/',
            'sel_sala'           => $request->select_sala,
            'sel_fecha'          => $request->select_fecha,
            'sel_hor'            => $request->select_horario
        ]);

    }
    public function edit($id){
     
        $horariosasignado =AsignacionHorario::find($id);
        $horarios = Horario::all();
         $salas = Sala::all();
        $mesas = Mesa::all();
        $usuarios = Usuario::all();
        $asignaturas = Asignatura::orderBy('nombre')->get();
        $estrategias = Estrategia::all();
        $estudiante = Estudiante::find($horariosasignado->monitor);
      return view('admin.asistencia',[
            'horarios'  => $horarios,
            'mesas'     => $mesas,
            'usuarios'  => $usuarios,
            'asignaturas'=> $asignaturas,
            'estrategias'=> $estrategias,
            'estudiante'=> $estudiante,
            'salas'=> $salas,
        ])->with('asighorarios',$horariosasignado);
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
       
        ->get()->toArray();

        return $h;
		#return view('admin.registroasistencia',[
			
		#])->with('horarios',$h);




      }

       public function mostraracordeon(Request $request){

 

         $lunes=RegistroAsistenciaController::consultardias('LUNES', $request->input('fechainicio'),$request->input('fechafin'));
       
         $martes=RegistroAsistenciaController::consultardias('MARTES', $request->input('fechainicio'),$request->input('fechafin'));
                

         $miercoles=RegistroAsistenciaController::consultardias('MIERCOLES', $request->input('fechainicio'),$request->input('fechafin'));
        


         $jueves=RegistroAsistenciaController::consultardias('JUEVES', $request->input('fechainicio'),$request->input('fechafin'));
    


         $viernes=RegistroAsistenciaController::consultardias('VIERNES', $request->input('fechainicio'),$request->input('fechafin'));
         


         $sabado=RegistroAsistenciaController::consultardias('SABADO', $request->input('fechainicio'),$request->input('fechafin'));
        
         $dias=collect([$lunes,$martes,$miercoles,$jueves,$viernes,$sabado]) ;
         $salida=json_encode($martes);

        return \View::make('admin.registroasistencia', array( 'dias' => $salida ))->render();
        #return view('admin.registroasistencia', array( 'dias' => $salida ));

        #return Response::json(['results' => $lunes], 200);

        
       

     }


    }

 