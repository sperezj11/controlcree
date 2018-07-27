@extends('layouts.app')

@section('title','Main')
@section('content')

<div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar" >
                <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Manejo de base de datos<span class="sr-only">(current)</span></a></li>
                <li><a href="{{ route('estudiante') }}">Registrar Estudiantes</a></li>
                <li><a href="{{ route('asignatura') }}">Registrar Asignaturas</a></li>
                <li><a href="{{ route('asistencia') }}">Registro de asistencia</a></li>
                </ul>
          
            </div>
            <div class="col-sm-9 col-md-10 main">
            	@include('flash::message')
                @yield('content-main')
            </div>
        </div>
    </div>
@endsection