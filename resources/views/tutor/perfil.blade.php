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
                <div class="col-lg-6 col-sm-12 text-center p-5">
                    
                    <img src="{{asset('/storage/imagenesPerfil/' . $tutor->perfil_slug)}}" alt="Foto de Perfil" width="200px">
                </div>
                <div class="col-lg-6 col-sm-12 p-5">
                     <h5>Nombres: {{$tutor->nombres}}</h5>
                     <h5>Apellido Paterno: {{$tutor->apellidoP}}</h5>
                     <h5>Apellido Materno: {{$tutor->apellidoM}}</h5>
                     <h5>Carrera: {{\Illuminate\Support\Facades\DB::table('carreras')->where('id', $tutor->carrera_id)->value('carrera')}}</h5>
                     <h5>Descripcion: {{$tutor->descripcion}}</h5>
                     <h5>Horario: <br> <br> {!!nl2br(e($tutor->horario))!!}</h5>
                </div>
            </div>
        </div>
        <div class="card-footer text-right bg-white">
            <a href="{{route('tutor.editPerfil')}}" class="btn btn-info">Editar</a>
        </div>
    </div>
@endsection