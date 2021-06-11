@extends('layouts.dashboard')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <h4>Informes</h4>
    <table class="table table-bordered">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido paterno</th>
            <th scope="col">Cuatrimestre</th>
            <th scope="col">Carrera</th>
            <th scope="col">Fecha de creacion</th>
            <th scope="col">Ultima actualizacion</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($Informe as  $informe)
            <tr class="text-uppercase">
                
                <td>{{ $informe->nombre }}</td>
                <td>{{ $informe->apellidoP}}</td>
                <td>{{ $informe->cuatrimestre }}</td>
                <td>{{ $informe->carrera }}</td>
                <td>{{Carbon\Carbon::parse($informe->created_at)->format('d-m-Y')}}</td>
                 <td>{{Carbon\Carbon::parse($informe->update_at)->format('d-m-Y')}}</td>
                
                <td style="white-space: nowrap;
            width: 1%;">
            <a href="{{route('psicologo.editarInforme', $informe->id)}}" class="btn btn-sm btn-success text-white">Revisar</a>
            <a href="{{route('psicologo.imprimirInforme',$informe->id)}}"  class="btn btn-sm btn-outline-primary ">Imprimir</a>
           
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
