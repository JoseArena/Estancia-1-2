@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">Creacion de Anuncio</div>
        <div class="card-body">
        <form action="{{route('admin.storeAnuncio')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input required type="text" class="form-control" name="titulo">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <br>
                            <textarea name="descripcion" rows="10" cols="40" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input required type="text" class="form-control" name="link">
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-footer text-right bg-white">
            <button class="btn btn-info" type="submit">Crear</button>
        </div>
        </form>
    </div>

@endsection
