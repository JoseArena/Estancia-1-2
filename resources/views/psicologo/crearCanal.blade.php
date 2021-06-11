@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">Datos Generales de canalizacion</div>
        <div class="card-body">
        <form action="{{route('psicologo.storeCanal')}}"  method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input required type="text" class="form-control" name="nombre">
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
                            <label for="sexo">Sexo</label>
                            <select required name="sexo" id="" class="form-control">
                                <option selected disabled value="">Selecciona una opcion</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Sin especificar">Sin especificar</option>
                                    
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                           <label for="turno">Turno</label>
                            <select required name="turno" id="" class="form-control">
                                <option selected disabled value="">Seleciona una opcion</option>
                                    <option value="Matutino">Matutino</option>
                                    <option value="Vespertino">Vespertino</option>
                  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="carrera">Carrera</label>
                            <select required name="carrera" id="" class="form-control">
                                <option selected disabled value="">Selecciona una opcion</option>
                                    <option value="1">IS</option>
                                    <option value="2">LTF</option>
                                    <option value="3">LN</option>
                                    <option value="4">IAEV</option>
                                    <option value="5">LAET</option>
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                <div class="col-lg-4 col-sm-12">
                        <label for="cuatrimestre">Cuatrimestre</label>
                            <select name="cuatrimestre" id="" class="form-control">
                                <option selected >Seleciona una opcion</option>
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
                            <label for="fecha">Fecha</label>
                            <input required type="date" class="form-control" name="fecha">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label for="problematica">Problematica</label>
                            <textarea name="problematica" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div >
                    </div>
                   
                    
                </div>
                
                

        </div>
       
        <div class="card-footer text-right bg-white" >
        
            <button data-toggle="tooltip" data-placement="top" title="Se creara y se enviara este informe al administrador" class="btn btn-success text-white" type="submit">Crear</button>
         
            
        </div>
       
  

    </form>
   
    </div>
    
@endsection

