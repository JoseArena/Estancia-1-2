@extends('layouts.dashboard')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
     <h4>Todas las canalizaciones</h4>
    <table class="table table-bordered">
        <thead class="bg-primary text-white">
        <tr >
        <th scope="col">Psicologo</th>
            <th scope="col">Alumno</th>
            <th scope="col">Apellido</th>
            <th scope="col">Cuatrimestre</th>
            <th scope="col">Carrera</th>
            <th scope="col">Fecha de creacion</th>
            <th scope="col">Fecha de tutoria</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($canalizacion as  $canal)
            <tr class="text-uppercase">

                <th scope="row" style="white-space: nowrap;
                width: 1%;">{{App\Psicologo::find($canal->psicologo_id)->nombreCompleto($canal->psicologo_id)}}</th>
                <td>{{ $canal->nombre }}</td>
                <td>{{ $canal->apellidoP}}</td>
                <td>{{ $canal->cuatrimestre }}</td>
                <td>{{ $canal->carrera }}</td>
                <td>{{Carbon\Carbon::parse($canal->created_at)->format('d-m-Y')}}</td>
                <td>{{Carbon\Carbon::parse($canal->fecha)->format('d-m-Y')}}</td>
                <td style="white-space: nowrap;
            width: 1%;">
            <a href="{{route('psicologo.vistaCanalizacion',$canal->id)}}" class="btn btn-sm btn-success text-white">Ver</a>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

