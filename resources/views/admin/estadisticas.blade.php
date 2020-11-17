@extends('layouts.dashboard')
@section('content')
    <h2>Estádisticas</h2>
    <!--Tutores-->
    <?php 
        $i = 0;
        foreach ($tutores as $tutor):
            $i = $i+1;
        endforeach;

        $ii = 0;
        foreach($psicologos as $psicologo):
            $ii = $ii+1;
        endforeach;

        $iii = 0;
        foreach($alumnos as $alumno):
            $iii = $iii+1;
        endforeach;
    ?>
    <nav class="navbar navbar-light bg-light float-right mt-4">
        <form class="form-inline">
            <h4 class="mr-5">Tutores registrados ({{$i}}) </h4>

            <select name="tutorTipo" class="form-control mr-sm-2" >
                <option value="nombres">Buscar por...</option>
                <option value="nombres">Nombre</option>
                <option value="apellidoP">Apellido Paterno</option>
                <option value="apellidoM">Apellido Materno</option>
            </select>

            <input name="tutoBuscarPor" class="form-control mr-sm-2" type="search" placeholder="Buscar por apellido" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </nav>
    <table class="table table-bordered table-responsive-sm">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Nombres</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Carrera</th>
            <th scope="col">Accioness</th>
        </tr>
        </thead>
        <tbody>
            @foreach($tutores as  $tutor)
            <tr>
                <th scope="row">
                    <a href="{{route('admin.reportesTutor', $tutor->user_id)}}" class="text-dark">
                        {{$tutor->nombres}}
                    </a>
                </th>
                <td>{{$tutor->apellidoP}}</td>
                <td>{{$tutor->apellidoM}}</td>
                <td>{{\Illuminate\Support\Facades\DB::table('carreras')->where('id', $tutor->carrera_id)->value('carrera')}}</td>
                <td style="white-space: nowrap;
                width: 1%;">
                <a href="#" class="btn btn-sm btn-success text-white">Editar</a>
                <a href="{{route('admin.alumnosMonitores', $tutor->id)}}" class="btn btn-sm btn-warning text-white">Alumnos Monitores</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tutores->links() }}


    <!--Psicologos-->
    <nav class="navbar navbar-light bg-light float-right mt-5">
        <form class="form-inline">
            <h4 class="mr-5">Psicólogos registrados ({{$ii}}) </h4>

            <select name="psicoTipo" class="form-control mr-sm-2" >
                <option value="nombres">Buscar por...</option>
                <option value="nombres">Nombre</option>
                <option value="apellidoP">Apellido Paterno</option>
                <option value="apellidoM">Apellido Materno</option>
            </select>

            <input name="psicoBuscarPor" class="form-control mr-sm-2" type="search" placeholder="Buscar por apellido" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </nav>
    <table class="table table-bordered table-responsive-sm">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Nombres</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach($psicologos as $psicologo)
            <tr>
                <th scope="row">{{$psicologo->nombres}}</th>
                <td>{{$psicologo->apellidoP}}</td>
                <td>{{$psicologo->apellidoM}}</td>
                <td style="white-space: nowrap;
                width: 1%;">
                <a href="" class="btn btn-sm btn-success text-white">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $psicologos->links() }}

    <!--Alumno monitor-->
    <nav class="navbar navbar-light bg-light float-right mt-5">
        <form class="form-inline">
            <h4 class="mr-5">Alumnos monitores registrados ({{$iii}}) </h4>

            <select name="alumTipo" class="form-control mr-sm-2" >
                <option value="nombres">Buscar por...</option>
                <option value="nombres">Nombre</option>
                <option value="apellidoP">Apellido Paterno</option>
                <option value="apellidoM">Apellido Materno</option>
            </select>

            <input name="alumBuscarPor" class="form-control mr-sm-2" type="search" placeholder="Buscar por apellido" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </nav>
    <table class="table table-bordered table-responsive-sm">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Nombres</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Carrera</th>
            <th scope="col">Tutor</th>
            <th scope="col">Alumnos Asignados</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $alumno)
            <tr>
                <th scope="row">{{$alumno->nombres}}</th>
                <td>{{$alumno->apellidoP}}</td>
                <td>{{$alumno->apellidoM}}</td>
                <td>{{\Illuminate\Support\Facades\DB::table('carreras')->where('id', $alumno->carrera_id)->value('carrera')}}</td>
                <td>{{\Illuminate\Support\Facades\DB::table('tutores')->where('id', $alumno->tutor_id)->value('apellidoP')}}</td>
                <td class="text-center">{{count(DB::table('alumno_tutorado')->where('alumno_monitor_id', '=' , $alumno->id)->get())}}</td>
                <td style="white-space: nowrap;
                width: 1%;">
                <a href="{{route('tutor.editarMonitor', $alumno->id)}}" class="btn btn-sm btn-success text-white">Editar</a>
                <a href="{{route('monitor.alumnosTutorados', $alumno->id)}}" class="btn btn-sm btn-warning text-white">Alumnos Tutorados</a>
                <a href="{{route('tutor.desactivarMonitor', $alumno->id)}}" class="btn btn-sm btn-danger text-white">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $alumnos->links() }}
@endsection
