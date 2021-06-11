@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">Datos Generales del informe</div>
        <div class="card-body">
        <form action="" method="">
                @csrf
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input disabled type="text" class="form-control" name="nombre" value="{{$Informe->nombre}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="apellidoP">Apellido Paterno</label>
                            <input disabled  type="text" class="form-control" name="apellidoP" value="{{$Informe->apellidoP}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="apellidoM">Apellido Materno</label>
                            <input disabled  type="text" class="form-control" name="apellidoM" value="{{$Informe->apellidoM}}">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="edad">Edad</label>
                            <input disabled  type="text" class="form-control" name="edad" value="{{$Informe->edad}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                           <label for="sexo">Sexo</label>
                            <select disabled name="sexo" id="" class="form-control">
                                <option selected  value="{{$Informe->sexo}}">{{$Informe->sexo}}</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Sin especificar">Sin especificar</option>
                                    
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="ocupacion">Ocupacion</label>
                            <input disabled type="text" class="form-control" name="ocupacion" value="{{$Informe->ocupacion}}">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="carrera">Carrera</label>
                            <select disabled name="carrera" id="" class="form-control">
                                <option selected value="{{$Informe->carrera}}">{{$Informe->carrera}}</option>
                                    <option value="IS">IS</option>
                                    <option value="LTF">LTF</option>
                                    <option value="LN">LN</option>
                                    <option value="IAEV">IAEV</option>
                                    <option value="LAET">LAET</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <label for="cuatrimestre">Cuatrimestre</label>
                            <select disabled name="cuatrimestre" id="" class="form-control">
                                <option selected >{{$Informe->cuatrimestre}}</option>
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
                            <label for="sesion">Numero de sesiones</label>
                            <input  disabled type="number" class="form-control" name="sesion" value="{{$Informe->sesion}}">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="motivo">Motivo de consulta</label>
                            <textarea disabled name="motivo" id="" cols="30" rows="10" class="form-control" >{{$Informe->motivo}}</textarea>
                        </div >
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="tecnicas">Tecnicas psicologicas utilizadas</label>
                            <textarea disabled name="tecnicas" id="" cols="30" rows="10" class="form-control" >{{$Informe->tecnicas}}</textarea>
                        </div >
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="observaciones">Obervaciones generales</label>
                            <textarea disabled name="observaciones" id="" cols="30" rows="10" class="form-control">{{$Informe->observaciones}}</textarea>
                        </div >
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="conclusiones">Conclusiones del caso</label>
                            <textarea disabled name="conclusiones" id="" cols="30" rows="10" class="form-control" >{{$Informe->conclusiones}}</textarea>
                        </div >
                    </div>
                    
                </div>
                

        </div>
       
        <div class="card-footer text-right bg-white">
           
            
           
            <a href="{{route('admin.verInformeAdmin',)}}" class="btn btn-success text-white" type="btn" >Volver</a>
            <a href="{{route('psicologo.imprimirInforme',$Informe->id)}}" class="btn btn-success text-white" type="btn" >Imprimir</a>
            
             
        </div>
        
           
        
    </form>
    
    </div>

@endsection
