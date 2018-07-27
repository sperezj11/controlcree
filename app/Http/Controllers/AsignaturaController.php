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
use App\Http\Requests\AsignaturaRequest;


class AsignaturaController extends Controller
{
    public function index(){
		
		return view('admin.asignatura');
	}



	  public function store(AsignaturaRequest $request){
        
        $Asignat = new Asignatura($request->all());
             

        DB::table('asignaturas')->insert(
            [
                'Codmateria' => $Asignat->Codmateria,
                'nombre' => $Asignat->nombre, 
                'departamento' => $Asignat->departamento 
                
               
            ]
        );
        DB::commit();
        return redirect()->route('asignatura');
        //flash()->overlay('Asistencia Registrada!', 'Regresar');
        //flash('Asignacion de Horario exitosa!')->success();
       // return view('admin/vistahorarios') ;

    }
}
	