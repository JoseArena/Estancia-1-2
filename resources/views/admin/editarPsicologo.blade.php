@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Datos Generales del Psicólogo</div>
        <div class="card-body">
        <form action="{{route('admin.actualizarPsicologo', $psicologo->id)}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input required type="text" class="form-control" name="nombres" value="{{$psicologo->nombres}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="apellidoP">Apellido Paterno</label>
                            <input required type="text" class="form-control" name="apellidoP" value="{{$psicologo->apellidoP}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="apellidoM">Apellido Materno</label>
                            <input required type="text" class="form-control" name="apellidoM" value="{{$psicologo->apellidoM}}">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <br>
                            <textarea class="form-control" name="descripcion" rows="3" value="{{$psicologo->descripcion}}">{{$psicologo->descripcion}}</textarea>
                        </div>
                    </div>
                </div>
        <div class="card-footer text-right bg-white text-white">
            <button class="btn btn-success text-white" type="submit">Actualizar</button>
        </div>
    </form>
</div>
@endsection