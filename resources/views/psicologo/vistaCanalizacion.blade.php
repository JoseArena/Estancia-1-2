@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">Datos Generales de canalizacion</div>
        <div class="card-body">
        <form action=""  method="">
                @csrf
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input disabled  type="text" class="form-control" name="nombre" value="{{$canalizacion->nombre }}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="apellidoP">Apellido Paterno</label>
                            <input disabled type="text" class="form-control" name="apellidoP" value="{{$canalizacion->apellidoP }}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="apellidoM">Apellido Materno</label>
                            <input disabled type="text" class="form-control" name="apellidoM" value="{{$canalizacion->apellidoM }}">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <input disabled  name="sexo" id="" class="form-control" value="{{$canalizacion->sexo }}">
                               
                            </input>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                           <label for="turno">Turno</label>
                            <input disabled  name="turno" id="" class="form-control" value="{{$canalizacion->turno }}">
                               
                  
                            </input>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="carrera">Carrera</label>
                            <input value="{{$canalizacion->carrera }}" disabled name="carrera" id="" class="form-control">
                                
                                
                            </input>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                <div class="col-lg-4 col-sm-12">
                         <label for="cuatrimestre">Cuatrimestre</label>
                            <input disabled value="{{$canalizacion->cuatrimestre}}" name="cuatrimestre" id="" class="form-control">
                               
                                   
                            </input>
                    </div>
                    
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input disabled type="date" class="form-control" name="fecha" value="{{$canalizacion->fecha }}">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label for="problematica">Problematica</label>
                            <textarea disabled name="problematica" id="" cols="30" rows="10" class="form-control">{{$canalizacion->problematica }}</textarea>
                        </div >
                    </div>
                   
                    
                </div>
                
                

        </div>
       
        <div class="card-footer text-right bg-white">
            
             <a href="{{route('admin.vercanalizacionesAdmin',)}}" class="btn btn-success text-white" type="btn" >Volver</a>
             <a href="{{route('psicologo.imprimirCanalizacion',$canalizacion->id)}}" class="btn btn-success text-white" type="btn" >Imprimir</a>
        </div>
    </form>
    </div>

@endsection
