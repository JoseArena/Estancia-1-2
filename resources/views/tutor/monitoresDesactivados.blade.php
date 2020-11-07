@extends('layouts.dashboard')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <h4>Alumnos Monitores Desactivados</h4>
    <table class="table table-bordered table-responsive-sm">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Nombres</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Carrera</th>
            <th scope="col">Alumnos Asignados</th>
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
            <td class="text-center">{{count(DB::table('alumno_tutorado')->where('alumno_monitor_id', '=' , $alumno->id)->get())}}</td>
            <td style="white-space: nowrap;
            width: 1%;">
            <a href="{{route('tutor.activarMonitor', $alumno->id)}}" class="btn btn-sm btn-success text-white">Activar</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $alumnos->links() }}
@endsection
