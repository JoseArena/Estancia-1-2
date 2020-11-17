@extends('layouts.dashboard')
@section('content')
    <?php 
        $i = 0;
        foreach ($reportes as $reporte):
            $i = $i+1;
        endforeach;

        $ii = 0;
        foreach ($reportes2 as $reporte2):
            $ii = $ii+1;
        endforeach 
    ?>
    <h3 class="font-weight-bold"><center>Reportes del tutor {{App\Tutor::find($tutor_id)->nombreCompleto($tutor_id)}}</center></h3>

    <nav class="navbar navbar-light bg-light float-right mt-4">
        <form class="form-inline">
            <h4 class="mr-5">Reportes de tutorías grupales ({{$i}}) </h4>
    
            <input required type="date" class="form-control datefield mr-2" name="fI">
            <input required type="date" class="form-control datefield mr-2" name="fF">
            
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar por fecha</button>
        </form>
    </nav>


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
                    <a href="{{route('tutor.reporteGrupVer', $reporte->id)}}" class="btn btn-sm btn-success text-white">Ver Reporte</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $reportes->links() }}

    <nav class="navbar navbar-light bg-light float-right mt-4">
        <form class="form-inline">
            <h4 class="mr-5">Reportes de tutorías individuales ({{$ii}}) </h4>
    
            <input required type="date" class="form-control datefield mr-2" name="fI2" >
            <input required type="date" class="form-control datefield mr-2" name="fF2">
            
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar por fecha</button>
        </form>
    </nav>
    
    <table class="table table-bordered">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Alumno</th>
            <th scope="col">Cuatrimestre</th>
            <th scope="col">Tipo de Tutoria</th>
            <th scope="col">Fecha Realizada</th>
            <th scope="col">Fecha Actualizada</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reportes2 as  $reporte2)
            <tr>
                <th>{{$reporte2->alumno}}</th>
                <td>{{$reporte2->cuatrimestre}}</td>
                <td>{{$reporte2->tipo_tutoria}}</td>
                <td>{{Carbon\Carbon::parse($reporte2->fecha)->format('d-m-Y')}}</td>
                <td>{{Carbon\Carbon::parse($reporte2->updated_at)->format('d-m-Y')}}</td>
                <td>
                    <a href="{{route('tutor.reporteIndVer', $reporte2->id)}}" class="btn btn-sm btn-success text-white">Ver Reporte</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $reportes2->links() }}
@endsection
