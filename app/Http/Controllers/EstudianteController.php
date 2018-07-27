<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EstudianteRequest;
use App\Http\Controllers\View;
use App\Mesa;
use App\Horario;
use App\Usuario;
use App\Asignatura;
use App\Estrategia;
use App\AsignacionHorario;
use App\Estudiante;


class EstudianteController extends Controller
{
    public function index(){
		$estudiantes = Estudiante::all();
		return view('admin.estudiante1',[
            'estudiantes' => $estudiantes
            ]);
	}



	  public function store(EstudianteRequest $request){
        //dd($request->all());        
        $Estud = new Estudiante($request->all());
        
        //dd($asighorario->semana);

        DB::table('estudiantes')->insert(
            [
                'id' => $Estud->id,
                'nombre' => $Estud->nombre, 
                'celular' => $Estud->celular, 
                'email1' => $Estud->email1,
                'email2' => $Estud->email2
               
            ]
        );
        DB::commit();
        return redirect()->route('estudiante1');
        //flash()->overlay('Asistencia Registrada!', 'Regresar');
        //flash('Asignacion de Horario exitosa!')->success();
       // return view('admin/vistahorarios') ;

    }
    public function editEstudiante(EstudianteRequest $request)
	{
		//dd($request);

		
		$registro = DB::select(DB::raw("
      		SELECT e.id
			FROM estudiantes e
			WHERE e.nombre = '$request->edit_nombre'
		    AND e.celular = '$request->edit_celular'
            AND e.email1 = '$request->edit_email1'
            AND e.email2 = '$request->edit_email2'
			        
      	"));

      	foreach ($registro as $key) {
      		DB::table('estudiantes')->where('id', '=', $key->id)->update(['email2' => $request->edit_email2]);
      	}
      	DB::commit();
      	flash('Actualización de estudiante realizado con éxito')->success();

      	return redirect()->route('estudiante1');

	}

}
