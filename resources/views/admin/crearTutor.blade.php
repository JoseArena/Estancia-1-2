@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">Datos Generales del Tutor</div>
        <div class="card-body">
        <form action="{{route('admin.storeTutor')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input required type="text" class="form-control" name="nombres">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="apellidoP">Apellido Paterno</label>
                            <input required type="text" class="form-control" name="apellidoP">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="apellidoM">Apellido Materno</label>
                            <input required type="text" class="form-control" name="apellidoM">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="carrera">Carrera</label>
                            <select required name="carrera" id="" class="form-control">
                                <option selected disabled value="">Carrera</option>
                                @foreach ($carreras as $carrera)
                            <option value="{{$carrera->id}}">{{$carrera->carrera}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12">
                        <div class="form-group">
                            <label for="horario">Horario</label>
                            <input required type="text" class="form-control" name="horario">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <br>
                            <textarea class="form-control" name="descripcion" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <hr>

        </div>
        <div class="card-header bg-primary text-white">Datos de la Cuenta</div>
        <div class="card-body">
            <div class="form-row">
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="nombreUsuario">Nombre de Usuario</label>
                        <input required type="text" class="form-control" name="nombreUsuario">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input required type="email" class="form-control" name="email">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input required type="password" class="form-control" name="password">
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
