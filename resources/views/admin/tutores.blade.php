@extends('layouts.dashboard')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <h4>Tutores</h4>
    <table class="table table-bordered table-responsive-sm">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Nombres</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Carrera</th>
            <th scope="col">Alumnos Monitores</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tutores as  $tutor)
        <tr>
            <th scope="row">{{$tutor->nombres}}</th>
            <td>{{$tutor->apellidoM}}</td>
            <td>{{$tutor->apellidoP}}</td>
            <td>{{\Illuminate\Support\Facades\DB::table('carreras')->where('id', $tutor->carrera_id)->value('carrera')}}</td>
            <td class="text-center">{{count(DB::table('alumno_monitor')->where('tutor_id', '=' , $tutor->id)->get())}}</td>
            <td style="white-space: nowrap;
            width: 1%;">
            <a href="{{route('tutor.reportesIndividuales', $tutor->user_id)}}" class="btn btn-sm btn-info text-white">Reportes Individuales</a>
            <a href="{{route('tutor.reportesGrupales', $tutor->user_id)}}" class="btn btn-sm btn-success text-white">Reportes Grupales</a>
            <a href="{{route('admin.alumnosMonitores', $tutor->id)}}" class="btn btn-sm btn-warning text-white">Alumnos Monitores</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $tutores->links() }}
@endsection
