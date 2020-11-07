@extends('layouts.dashboard')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <h4>Alumnos Tutorados</h4>
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
                <a href="{{route('tutor.activarTutorado', $alumno->id)}}" class="btn btn-sm btn-success text-white">Activar</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $alumnos->links() }}
@endsection
