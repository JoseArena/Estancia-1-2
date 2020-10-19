@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">Crear Alumno Tutorado</div>
        <div class="card-body">
        <form action="{{route('tutor.actualizarTutorado', $tutorado->id)}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                        <input required type="text" class="form-control" name="nombres" value="{{$tutorado->nombres}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input required type="text" class="form-control" name="apellidos" value="{{$tutorado->apellidos}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="carrera">Carrera</label>
                            <select required name="carrera" id="" class="form-control">
                            <option selected value="{{$tutorado->carrera_id}}">{{\Illuminate\Support\Facades\DB::table('carreras')->where('id', $tutorado->carrera_id)->value('carrera')}}</option>
                                @foreach ($carreras as $carrera)
                                    <option value="{{$carrera->id}}">{{$carrera->carrera}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="grupo">Grupo</label>
                        <input required type="text" class="form-control" name="grupo" value="{{$tutorado->grupo}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="cuatrimestre">Cuatrimestre</label>
                            <select name="cuatrimestre" id="" class="form-control" required>
                                <option value="{{$tutorado->cuatrimestre}}" selected>{{$tutorado->cuatrimestre}}</option>
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
                            <label for="alumnoMonitor">Alumno Monitor a Asignar</label>
                            <select required name="alumnoMonitorId" id="" class="form-control">
                            <option selected value="{{$monitorSel->id}}">{{$monitorSel->nombres}} {{$monitorSel->apellidoM}} {{$monitorSel->apellidoP}}</option>
                                @foreach ($monitores as $monitor)
                            <option value="{{$monitor->id}}">{{$monitor->nombres}} {{$monitor->apellidoM}} {{$monitor->apellidoP}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-12 col-sm-12">
                        <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" id="" cols="30" rows="10" class="form-control">{{$tutorado->descripcion}}</textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right bg-white">
                <button class="btn btn-success text-white" type="submit">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
