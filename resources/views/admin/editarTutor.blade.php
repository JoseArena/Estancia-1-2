@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Datos Generales del Tutor</div>
        <div class="card-body">
        <form action="{{route('admin.actualizarTutor', $tutor->id)}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input required type="text" class="form-control" name="nombres" value="{{$tutor->nombres}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="apellidoP">Apellido Paterno</label>
                            <input required type="text" class="form-control" name="apellidoP" value="{{$tutor->apellidoP}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="apellidoM">Apellido Materno</label>
                            <input required type="text" class="form-control" name="apellidoM" value="{{$tutor->apellidoM}}">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="carrera">Carrera</label>
                            <select required name="carrera" id="" class="form-control">
                                <option selected value="{{$tutor->carrera_id}}">{{\Illuminate\Support\Facades\DB::table('carreras')->where('id', $tutor->carrera_id)->value('carrera')}}</option>
                                @foreach ($carreras as $carrera)
                            <option value="{{$carrera->id}}">{{$carrera->carrera}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12">
                        <div class="form-group">
                            <label for="horario">Horario</label>
                            <input required type="text" class="form-control" name="horario" value="{{$tutor->horario}}">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <br>
                            <textarea class="form-control" name="descripcion" rows="3" value="{{$tutor->descripcion}}">{{$tutor->descripcion}}</textarea>
                        </div>
                    </div>
                </div>
        <div class="card-footer text-right bg-white text-white">
            <button class="btn btn-success text-white" type="submit">Actualizar</button>
        </div>
    </form>
</div>
@endsection