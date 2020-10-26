@extends('layouts.dashboard')
@section('content')
@if (session('msg'))
<div class="alert alert-success">
    {{ session('msg') }}
</div>
@endif
    <div class="card">
        <div class="card-header bg-primary text-white">Perfil de Usuario</div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-sm-12 text-center">
                    <img src="{{asset('/storage/imagenesPerfil/' . auth()->user()->tutor()->first()->perfil_slug)}}" alt="Foto de Perfil" width="200px">
                </div>
                <div class="col-lg-6 col-sm-12 p-5">
                     <h5>Nombres: Jahdiel Kadir</h5>
                     <h5>Apellido Paterno: Castañeda</h5>
                     <h5>Apellido Materno: Xiu</h5>
                     <h5>Carrera: Ingenieria en Software</h5>
                     <h5>Descripcion: Joven y Atractivo</h5>
                     <h5>Horario: Lunes: 10:30am - 2:00pm</h5>
                </div>
            </div>
        </div>
        <div class="card-footer text-right bg-white">
            <a href="{{route('tutor.editPerfil')}}" class="btn btn-info">Editar</a>
        </div>
    </div>
@endsection