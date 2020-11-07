@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">Edicion de Anuncio</div>
        <div class="card-body">
        <form action="{{route('admin.anuncioUpdate', $anuncio->id)}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                        <input required type="text" class="form-control" name="titulo" value="{{$anuncio->titulo}}">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <br>
                            <textarea name="descripcion" rows="10" cols="40" class="form-control">{{$anuncio->descripcion}}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input required type="text" class="form-control" name="link" value="{{$anuncio->link}}">
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-footer text-right bg-white">
            <button class="btn btn-info" type="submit">Actualizar</button>
        </div>
        </form>
    </div>

@endsection
