@extends('layouts.dashboard')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
     <h4>Todos los informes</h4>
    <table class="table table-bordered">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Psicologo</th>
            <th scope="col">Alumno</th>
            <th scope="col">Apellido</th>
            <th scope="col">Cuatrimestre</th>
            <th scope="col">Carrera</th>
            <th scope="col">Fecha de creacion</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($Informe as  $informe)
            <tr class="text-uppercase">
                <th scope="row" style="white-space: nowrap;
                width: 1%;">{{App\Psicologo::find($informe->psicologo_id)->nombreCompleto($informe->psicologo_id)}}</th>
                <td>{{ $informe->nombre }}</td>
                <td>{{ $informe->apellidoP}}</td>
                <td>{{ $informe->cuatrimestre }}</td>
                <td>{{ $informe->carrera }}</td>
                <td>{{Carbon\Carbon::parse($informe->created_at)->format('d-m-Y')}}</td>
                
                <td style="white-space: nowrap;
            width: 1%;">
            <a href="{{route('psicologo.vistaInforme', $informe->id)}}" class="btn btn-sm btn-success text-white">Ver</a>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
