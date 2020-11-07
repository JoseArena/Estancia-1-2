@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Edicion de Perfil</div>
        <div class="card-body">
        <form action="{{route('admin.updatePerfil')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input required type="text" class="form-control" name="nombres" value="{{$admin->nombres}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="apellidoM">Apellido Materno</label>
                            <input required type="text" class="form-control" name="apellidoM" value="{{$admin->apellidoM}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="apellidoP">Apellido Paterno</label>
                            <input required type="text" class="form-control" name="apellidoP" value="{{$admin->apellidoP}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 offset-lg-1">
                        <div class="form-group">
                            <label for="perfil_slug">Foto de Perfil</label>
                            <input required type="file" class="form-control-file" name="perfil_slug"">
                        </div>
                    </div>
                </div>
                
        <div class="card-footer text-right bg-white">
            <button class="btn btn-info" type="submit">Actualizar</button>
        </div>
    </form>
</div>

@endsection