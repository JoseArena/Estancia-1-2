@extends('layouts.dashboard')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <h4>Anuncios</h4>
    <table class="table table-bordered">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Fecha Realizada</th>
            <th scope="col">Fecha Actualizada</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($anuncios as  $anuncio)
            <tr>
                <th scope="row">{{$anuncio->titulo}}</th>
                <td>{{Carbon\Carbon::parse($anuncio->created_at)->format('d-m-Y')}}</td>
                <td>{{Carbon\Carbon::parse($anuncio->updated_at)->format('d-m-Y')}}</td>
                <td>
                <a href="{{route('admin.anuncioEdit', $anuncio->id)}}" class="btn btn-sm btn-success text-white">Editar</a>
                    <a class="btn btn-sm btn-danger text-white" href="{{route('admin.anuncioDelete', $anuncio->id)}}">Eliminar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $anuncios->links() }}
@endsection
