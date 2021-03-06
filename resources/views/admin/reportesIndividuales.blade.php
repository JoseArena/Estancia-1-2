@extends('layouts.dashboard')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <h4>Tutorias Individuales</h4>
    <table class="table table-bordered">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Tutor</th>
            <th scope="col">Alumno</th>
            <th scope="col">Cuatrimestre</th>
            <th scope="col">Tipo de Tutoria</th>
            <th scope="col">Fecha Realizada</th>
            <th scope="col">Fecha Actualizada</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reportes as  $reporte)
            <tr>
                <th scope="row" style="white-space: nowrap;
                width: 1%;">{{App\Tutor::find($reporte->tutor_id)->nombreCompleto($reporte->tutor_id)}}</th>
                <th>{{$reporte->alumno}}</th>
                <td>{{$reporte->cuatrimestre}}</td>
                <td>{{$reporte->tipo_tutoria}}</td>
                <td>{{Carbon\Carbon::parse($reporte->fecha)->format('d-m-Y')}}</td>
                <td>{{Carbon\Carbon::parse($reporte->updated_at)->format('d-m-Y')}}</td>
                <td>
                <a href="{{route('tutor.reporteIndVer', $reporte->id)}}" class="btn btn-sm btn-success text-white">Ver Reporte</a>
                    {{-- <a class="btn btn-sm btn-danger text-white">Eliminar</a> --}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $reportes->links() }}
@endsection
