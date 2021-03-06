@extends('layouts.dashboard')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    @if(count($reportes) <= 0)
    <div class="alert alert-danger " role="alert">
        {{$message}}
    </div>
    @endif
    <h4>Tutorias Grupales</h4>
    <table class="table table-bordered">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Grupo</th>
            <th scope="col">Cuatrimestre</th>
            <th scope="col">Carrera</th>
            <th scope="col">Dinamica</th>
            <th scope="col">Fecha Realizada</th>
            <th scope="col">Fecha Actualizada</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reportes as  $reporte)
            <tr>
                <th scope="row">{{$reporte->grupo}}</th>
                <td>{{$reporte->cuatrimestre}}</td>
                <td>{{\Illuminate\Support\Facades\DB::table('carreras')->where('id', $reporte->carrera_id)->value('carrera')}}</td>
                <td>{{$reporte->dinamica}}</td>
                <td>{{Carbon\Carbon::parse($reporte->fecha)->format('d-m-Y')}}</td>
                <td>{{Carbon\Carbon::parse($reporte->updated_at)->format('d-m-Y')}}</td>
                <td style="white-space: nowrap;
                width: 1%;">
                <a href="{{route('tutor.reporteGrupEdit', $reporte->id)}}" class="btn btn-sm btn-success text-white">Editar</a>
                    {{-- <a class="btn btn-sm btn-danger text-white">Eliminar</a> --}}
                    <a class="btn btn-sm btn-warning text-white" href="{{route('tutor.printRepGrup', $reporte->id)}}">Imprimir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $reportes->links() }}
@endsection
