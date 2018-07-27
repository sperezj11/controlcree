<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');  // Con login
   // return view('main');   // Sin login
});

Route::get('/main', function () {
    return view('main');
})->name('main');
Route::get('/mainbd', function () {
    return view('mainbd');
})->name('mainbd');
Route::get('menubd', function(){
    return view('admin.menubd');
});
Auth::routes();

Route::resource('asignacionhorario', 'AsignacionHorarioController');
Route::get('/asignacionhorario', 'AsignacionHorarioController@index')->name('asignacionhorario');
Route::get('/edit/{id}', 'AsignacionHorarioController@edit');
Route::delete('/delete/{id}', 'AsignacionHorarioController@destroy');
Route::PATCH('/update/{id}', 'AsignacionHorarioController@update');

Route::resource('registroasistencia', 'RegistroAsistenciaController');
Route::get('/registroasistencia', 'RegistroAsistenciaController@mostrar')->name('registroasistencia');
Route::get('/asistencia', 'RegistroAsistenciaController@mostrarasistencia')->name('asistencia');

Route::get('/mostraracordeon', array('as'=>'mostraracordeon','uses'=>'RegistroAsistenciaController@mostraracordeon'));

Route::resource('listarhorarios', 'AsignacionHorarioController');
Route::get('/listarhorarios', 'AsignacionHorarioController@mostrar')->name('listarhorarios');
Route::post('/listarhorarios/edit', 'AsignacionHorarioController@editAsigHorario')->name('upd_listarhorarios');
Route::post('/listarhorarios/delete', 'AsignacionHorarioController@delAsigHorario')->name('del_listarhorarios');


Route::resource('vistahorarios', 'AsignacionHorarioController');
Route::get('/horarios', 'AsignacionHorarioController@mostrarhorarios1')->name('horarios');
Route::resource('vistahorarios1', 'AsignacionHorarioController');
Route::get('/registro_asis', 'AsignacionHorarioController@mostrarhorarios')->name('Asistencia_horarios');



Route::get('descargar-productos', 'ExcelController@exportar')->name('excel.exportar');
Route::get('descargar-datos', 'ExcelController@exportarasistencia')->name('excel.exportarasistencia');
Route::get('descargar-datos1', 'ExcelController@exportarasistencia1')->name('excel.exportarasistencia1');
Route::post('cargar-estudiantes', 'ExcelController@importestudiante')->name('excel.importestudiante');
Route::post('cargar-asignatura', 'ExcelController@importasignatura')->name('excel.importasignatura');

Route::resource('estudiante1', 'EstudianteController');
Route::get('/estudiante1', 'EstudianteController@index')->name('estudiante1');
Route::post('/estudiante1/edit', 'EstudianteController@editEstudiante')->name('upd_listarestudiantes');
Route::post('/estudiante1/delete', 'EstudianteController@delEstudiante')->name('del_listarestudiantes');

Route::resource('asignatura', 'AsignaturaController');
Route::get('/asignatura', 'AsignaturaController@index')->name('asignatura');
