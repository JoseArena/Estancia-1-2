@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">Datos Generales del informe</div>
        <div class="card-body">
        <form action="{{route('psicologo.storeInforme')}}" method="POST">
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
                            <label for="edad">Edad</label>
                            <input required type="text" class="form-control" name="edad">
                        </div>
                    </div>
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
                            <label for="ocupacion">Ocupacion</label>
                            <input required type="text" class="form-control" name="ocupacion">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="carrera">Carrera</label>
                            <select required name="carrera" id="" class="form-control">
                                <option selected disabled value="">Selecciona una opcion</option>
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
                            <label for="sesion">Numero de sesiones</label>
                            <input required type="number" class="form-control" name="sesion">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="motivo">Motivo de consulta</label>
                            <textarea name="motivo" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div >
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="tecnicas">Tecnicas psicologicas utilizadas</label>
                            <textarea name="tecnicas" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div >
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="observaciones">Obervaciones generales</label>
                            <textarea name="observaciones" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div >
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="conclusiones">Conclusiones del caso</label>
                            <textarea name="conclusiones" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div >
                    </div>
                    
                </div>
                

        </div>
       
        <div class="card-footer text-right bg-white">
            <button data-toggle="tooltip" data-placement="top" title="Se creara y se enviara este informe al administrador" class="btn btn-success text-white" type="submit">Crear</button>
        </div>
    </form>
    </div>

   

@endsection
