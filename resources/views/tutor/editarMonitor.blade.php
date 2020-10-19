@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Datos Generales del Alumno</div>
    <div class="card-body">
    <form action="{{route('tutor.actualizarMonitor', $monitor->id)}}" method="POST">
            @csrf
            <div class="form-row">
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                    <input required type="text" class="form-control" name="nombres" value="{{$monitor->nombres}}">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="apellidoP">Apellido Paterno</label>
                        <input required type="text" class="form-control" name="apellidoP" value="{{$monitor->apellidoP}}">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="apellidoM">Apellido Materno</label>
                        <input required type="text" class="form-control" name="apellidoM" value="{{$monitor->apellidoM}}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="carrera">Carrera</label>
                        <select required name="carrera" id="" class="form-control">
                        <option selected  value="{{$monitor->carrera_id}}">{{\Illuminate\Support\Facades\DB::table('carreras')->where('id', $monitor->carrera_id)->value('carrera')}}</option>
                            @foreach ($carreras as $carrera)
                        <option value="{{$carrera->id}}">{{$carrera->carrera}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right bg-white text-white">
            <button class="btn btn-success text-white" type="submit">Actualizar</button>
        </div>
    </form>
</div>
@endsection