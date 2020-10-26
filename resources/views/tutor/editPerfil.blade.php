@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Edicion de Perfil</div>
        <div class="card-body">
        <form action="{{route('tutor.updatePerfil')}}" method="POST" enctype="multipart/form-data">
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
                            <label for="apellidoM">Apellido Materno</label>
                            <input required type="text" class="form-control" name="apellidoM" value="{{$tutor->apellidoM}}">
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
                            <label for="carrera_id">Carrera</label>
                            <select required name="carrera_id" id="" class="form-control">
                                <option selected  value="{{$tutor->carrera_id}}">{{\Illuminate\Support\Facades\DB::table('carreras')->where('id', $tutor->carrera_id)->value('carrera')}}</option>
                                @foreach ($carreras as $carrera)
                            <option value="{{$carrera->id}}">{{$carrera->carrera}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 offset-lg-1">
                        <div class="form-group">
                            <label for="perfil_slug">Foto de Perfil</label>
                            <input required type="file" class="form-control-file" name="perfil_slug"">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <br>
                            <textarea name="descripcion" rows="10" cols="40" class="form-control">{{$tutor->descripcion}}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label for="horario">Horario</label>
                            <br>
                            <textarea name="horario" rows="10" cols="40" class="form-control">{{$tutor->horario}}</textarea>
                        </div>
                    </div>
                </div>
                
        <div class="card-footer text-right bg-white">
            <button class="btn btn-info" type="submit">Actualizar</button>
        </div>
    </form>
</div>

@endsection