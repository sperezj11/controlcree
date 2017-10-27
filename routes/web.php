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
    return view('welcome');
});

Route::get('/main', function () {
    return view('main');
})->name('main');

Auth::routes();

Route::resource('asignacionhorario', 'AsignacionHorarioController');
Route::get('/asignacionhorario', 'AsignacionHorarioController@index')->name('asignacionhorario');
Route::get('/edit/{id}', 'AsignacionHorarioController@Controller@edit');

Route::resource('registroasistencia', 'RegistroAsistenciaController');
Route::get('/registroasistencia', 'RegistroAsistenciaController@mostrar')->name('registroasistencia');
Route::get('/mostraracordeon', 'RegistroAsistenciaController@mostraracordeon')->name('mostraracordeon');

Route::resource('listarhorarios', 'AsignacionHorarioController');
Route::get('/listarhorarios', 'AsignacionHorarioController@mostrar')->name('listarhorarios');


