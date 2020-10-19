@extends('layouts.dashboard')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <div class="card mb-2 bg-teal text-white">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h5>Monitor: {{$monitor->nombres}} {{$monitor->apellidoM}} {{$monitor->apellidoP}}</h5>
                    <h5>Carrera: {{$carreraNombre}}</h5>
                </div>
                <div class="col-6 text-right">
                    <h5>Alumnos Tutorados</h5>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Cuatrimestre</th>
            <th scope="col">Carrera</th>
            <th scope="col">Grupo</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($alumnos as  $alumno)
        <tr>
            <th scope="row">{{$alumno->nombres}}</th>
            <td>{{$alumno->apellidos}}</td>
            <td>{{$alumno->cuatrimestre}}</td>
            <td>{{\Illuminate\Support\Facades\DB::table('carreras')->where('id', $alumno->carrera_id)->value('carrera')}}</td>
            <td>{{$alumno->grupo}}</td>
            <td>
                <a href="{{route('tutor.editarTutorado', $alumno->id)}}" class="btn btn-sm btn-success text-white">Editar</a>
                <a class="btn btn-sm btn-danger text-white">Eliminar</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
