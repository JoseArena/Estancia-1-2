@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">Datos Generales de canalizacion</div>
        <div class="card-body">
        <form action="{{route('psicologo.actualizarCanal', $canalizacion->id)}}"  method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input  type="text" class="form-control" name="nombre" value="{{$canalizacion->nombre }}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="apellidoP">Apellido Paterno</label>
                            <input  type="text" class="form-control" name="apellidoP" value="{{$canalizacion->apellidoP }}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="apellidoM">Apellido Materno</label>
                            <input  type="text" class="form-control" name="apellidoM" value="{{$canalizacion->apellidoM }}">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <select  name="sexo" id="" class="form-control">
                                <option selected  value="{{$canalizacion->sexo }}">{{$canalizacion->sexo }}</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Sin especificar">Sin especificar</option>
                                    
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                           <label for="turno">Turno</label>
                            <select  name="turno" id="" class="form-control">
                                <option selected  value="{{$canalizacion->turno }}">{{$canalizacion->turno }}</option>
                                    <option value="Matutino">Matutino</option>
                                    <option value="Vespertino">Vespertino</option>
                  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="carrera">Carrera</label>
                            <select  name="carrera" id="" class="form-control">
                                <option selected  value="{{$canalizacion->carrera }}">{{$canalizacion->carrera }}</option>
                                    <option value="IS">IS</option>
                                    <option value="LTF">LTF</option>
                                    <option value="LN">LN</option>
                                    <option value="IAEV">IAEV</option>
                                    <option value="LAET">LAET</option>
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                <div class="col-lg-4 col-sm-12">
                         <label for="cuatrimestre">Cuatrimestre</label>
                            <select name="cuatrimestre" id="" class="form-control">
                                <option selected >{{$canalizacion->cuatrimestre}}</option>
                                    <option value="1°">1°</option>
                                    <option value="2°">2°</option>
                                    <option value="3°">3°</option>
                                    <option value="4°">4°</option>
                                    <option value="5°">5°</option>
                                    <option value="6°">6°</option>
                                    <option value="7°">7°</option>
                                    <option value="8°">8°</option>
                                    <option value="9°">9°</option>
                            </select>
                    </div>
                    
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="fecha">Nueva fecha de tutoria</label>
                            <input  type="date" class="form-control" name="fecha" value="{{$canalizacion->fecha }}">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label for="problematica">Problematica</label>
                            <textarea name="problematica" id="" cols="30" rows="10" class="form-control">{{$canalizacion->problematica }}</textarea>
                        </div >
                    </div>
                   
                    
                </div>
                
                

        </div>
       
        <div class="card-footer text-right bg-white">
            <button class="btn btn-success text-white" type="submit">Actualizar</button>
             <a href="{{route('psicologo.verCanal')}}" class="btn btn-success text-white" type="btn" >Volver</a>
        </div>
    </form>
    </div>

@endsection
