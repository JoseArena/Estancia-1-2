@extends('layouts.dashboard')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <h4>Psicologos</h4>
    <table class="table table-bordered table-responsive-sm">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Nombres</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($psicologos as  $psicologo)
        <tr>
            <th scope="row">{{$psicologo->nombres}}</th>
            <td>{{$psicologo->apellidoM}}</td>
            <td>{{$psicologo->apellidoP}}</td>
            <td style="white-space: nowrap;
            width: 1%;">
            <a href="" class="btn btn-sm btn-success text-white">Editar</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $psicologos->links() }}
@endsection
