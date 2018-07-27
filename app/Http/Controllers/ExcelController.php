<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
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




class ExcelController extends Controller
{





public function exportar(){

         #* toma en cuenta que para ver los mismos 
         #* datos debemos hacer la misma consulta
        
        Excel::create('Tutoria de sala', function($excel) {
            $excel->sheet('Excel sheet', function($sheet) {
                //otra opción -> $datos=AsignacionHorario::select('name')->get();
             
            $datos = DB::select(DB::raw("
            SELECT v.periodo, v.asignatura, v.Codmateria, v.dia,v.horaInicio, v.horaFin,v.sala,v.id,v.nombre,v.estudiante,v.celular,v.email1, v.email2,v.estrategia
            FROM (
                SELECT s.nombre sala, p.nombre periodo, ELT(WEEKDAY(ah.fecha) + 1, 'LUNES', 'MARTES', 'MIÉRCOLES', 'JUEVES', 'VIERNES', 'SÁBADO', 'DOMINGO') dia, h.horaInicio, h.horaFin, ag.nombre asignatura, ag.Codmateria, e.id,e.nombre estudiante,e.celular,e.email1,e.email2,u.nombre, t.nombre estrategia
                FROM asignaciones_horarios ah, salas s, periodos p, horarios h, asignaturas ag, estudiantes e,usuarios u,estrategias t
                WHERE ah.sala = s.id
                AND ah.periodo = p.id
                AND ah.horario = h.id
                AND ah.asignatura = ag.id
                AND ah.monitor = e.id
                AND ah.usuario = u.id
                AND ah.estrategia = t.id

            ) v
            GROUP BY v.periodo, v.asignatura, v.Codmateria, v.dia,v.horaInicio, v.horaFin,v.sala,v.id,v.nombre,v.estudiante,v.celular,v.email1, v.email2,v.estrategia
            
        "));

        $arraydata=array();
        foreach ($datos as $dato ) {
            $arraydata[] = (array)$dato;
        }

                $sheet->fromArray($arraydata);
                $sheet->setOrientation('landscape');
            });
        })->export('xls');
    }

    public function exportarasistencia(){

    
         #* toma en cuenta que para ver los mismos 
         #* datos debemos hacer la misma consulta
        
        Excel::create('Registro de asistencia de salas', function($excel) {
            $excel->sheet('Excel sheet', function($sheet) {
                //otra opción -> $datos=AsignacionHorario::select('name')->get();
                $datos1= DB::select(DB::raw("
                SELECT  `sala`,`fecha`,`codigo`,`monitor`, `asignatura`,
                sum(estados_asistencias.id=1) as PEN,
                sum(estados_asistencias.id=2) as SI,
                sum(estados_asistencias.id=3) as NO,
                sum(estados_asistencias.id=4) as EXC
                FROM registros_asistencias
                INNER JOIN estados_asistencias ON registros_asistencias.asistencia=estados_asistencias.id
               
                 GROUP BY `sala`,`fecha`,`codigo`,`monitor`, `asignatura`

                 "));

        $arraydata=array();
        foreach ($datos1 as $dato ) {
            $arraydata[] = (array)$dato;
        }

                $sheet->fromArray($arraydata);
                $sheet->setOrientation('landscape');
            });
        })->export('xls');
    }


    public function exportarasistencia1()
    {

        #* toma en cuenta que para ver los mismos 
        #* datos debemos hacer la misma consulta

        Excel::create('Registro de asistencia de salas', function($excel) {
                $excel->sheet('Excel sheet', function($sheet) {
                //otra opción -> $datos=AsignacionHorario::select('name')->get();
                $datos2= DB::select(DB::raw("
                    SELECT `codigo`,`monitor`, `asignatura`,
                    sum(estados_asistencias.id=1) as PEN,
                    sum(estados_asistencias.id=2) as SI,
                    sum(estados_asistencias.id=3) as NO,
                    sum(estados_asistencias.id=4) as EXC
                    FROM registros_asistencias
                    INNER JOIN estados_asistencias ON registros_asistencias.asistencia=estados_asistencias.id

                    GROUP BY `codigo`,`monitor`, `asignatura`
                "));

                $arraydata=array();
                foreach ($datos2 as $dato ) {
                    $arraydata[] = (array) $dato;
                }

                $sheet->fromArray($arraydata);
                $sheet->setOrientation('landscape');
            });
        })->export('xls');
    }

    public function importestudiante(Request $request)
    {
    \Excel::load($request->excel, function($reader) {

    $excel = $reader->get();

    // iteracción
    $reader->each(function($row) {

    $estudiante = new Estudiante;
    $estudiante ->id= $row->id;
    $estudiante ->nombre= $row->nombre;
    $estudiante ->celular= $row->celular; 
    $estudiante ->email1 = $row->email1;
    $estudiante ->email2 = $row->email2;
    $estudiante ->save();

    });

    });


    return redirect()->route('estudiante'); 

    }

    public function importasignatura(Request $request)
    {
    \Excel::load($request->excel, function($reader) {

    $excel = $reader->get();

    // iteracción
    $reader->each(function($row) {

    $asignatura  = new Asignatura;
    $asignatura ->id= $row->id;
    $asignatura ->Codmateria= $row->Codmateria;
    $asignatura ->nombre= $row->nombre;
    $asignatura ->departamento= $row->departamento; 
    $asignatura ->save();

    });

    });

    return redirect()->route('asignatura'); 
    }

}






