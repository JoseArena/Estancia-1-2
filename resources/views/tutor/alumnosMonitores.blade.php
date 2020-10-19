@extends('layouts.dashboard')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <table class="table table-bordered table-responsive-sm">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Nombres</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Carrera</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($alumnos as  $alumno)
        <tr>
            <th scope="row">{{$alumno->nombres}}</th>
            <td>{{$alumno->apellidoM}}</td>
            <td>{{$alumno->apellidoP}}</td>
            <td>{{\Illuminate\Support\Facades\DB::table('carreras')->where('id', $alumno->carrera_id)->value('carrera')}}</td>
            <td>
            <a href="{{route('tutor.editarMonitor', $alumno->id)}}" class="btn btn-sm btn-success text-white">Editar</a>
            <a href="{{route('monitor.alumnosTutorados', $alumno->id)}}" class="btn btn-sm btn-warning text-white">Alumnos Tutorados</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
