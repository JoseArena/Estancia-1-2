@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Informe de tutoría grupal</div>
        <div class="card-body">
        <form action="{{route('tutor.crearReporteGrupal')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="cuatrimestre">Cuatrimestre</label>
                            <select required name="cuatrimestre" id="" class="form-control">
                                <option selected disabled value="">Cuatrimestre</option>
                                
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="turno">Turno</label>
                            <select required name="turno" id="" class="form-control">
                                <option selected disabled value="">Turno</option>
                                
                                <option value="Matutino">Matutino</option>
                                <option value="Vespertino">Vespertino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="grupo">Grupo</label>
                            <input required type="text" class="form-control" name="grupo">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input required type="date" class="form-control datefield" name="fecha">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="carrera">Carrera</label>
                            <select required name="carrera_id" id="" class="form-control">
                                <option selected disabled value="">Carrera</option>
                                @foreach ($carreras as $carrera)
                            <option value="{{$carrera->id}}">{{$carrera->carrera}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label for="dinamica">Dinamica</label>
                            <br>
                            <textarea name="dinamica" class="form-control" rows="10" cols="40"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label for="observaciones">Observaciones</label>
                            <br>
                            <textarea name="observaciones" class="form-control" rows="10" cols="40"></textarea>
                        </div>
                    </div>
                </div>
                
        <div class="card-footer text-right bg-white">
            <button class="btn btn-info" type="submit">Enviar</button>
        </div>
    </form>
</div>

@endsection
