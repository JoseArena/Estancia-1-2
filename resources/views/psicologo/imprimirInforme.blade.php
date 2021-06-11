<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Datos del informe</title>
    <link rel="stylesheet" href="individual.css">
</head>
    <style>
body{
    font-family: Roboto;
}
table{
    border-collapse: collapse;
    margin: 0 auto;
}
table, th , td{
    border: 1px solid gray;
}
th{
    color: #1565C0;
    text-transform: uppercase;
}

.center{
    margin-left: auto;
    margin-right: auto;
    float: none;
    max-width: 1000px;
}
.right{
    margin-left: 0;
    margin-right: auto;
    float: none;
    max-width: 1000px; 
}

.imgLogo{
    padding: 0;
    margin: 0;
}

.titleBox{
    padding: 1.5em;
    margin: 0.5em;
    font-weight: bold;
     text-align: center;
}

.mb-2{
    margin-bottom: 2em;
}
.content{
    margin-top: 5em;
}

#datos{
    width: 700px;
}
    </style>
<body>
    <div class="center">
        <table class="title-table">
            <tbody>
                <tr class="table-row">
                    <td class="imgLogo"><img src="https://res.cloudinary.com/dalnsxher/image/upload/v1605393706/logo_upb_lhg10f.jpg" alt="logo" width="200" height="150"></td>
                    <td class="titleBox">
                        <p>INFORME PSICOLOGICO</p>
                        <p>Datos generales</p>
                    </td>
                    <td class="imgLogo"><img src="https://res.cloudinary.com/dalnsxher/image/upload/v1605393706/logo_tutorias_nweqct.jpg" alt="logo" width="200" height="150"></td>
                </tr>
            </tbody>
        </table>
    </div><br><br><br><br><br>
    <div class="center content">
        <table class="content-table" id="datos" style="text-align: center">
            <tbody>
                <tr>
                    <td>Nombre del Estudiante</td>
                    <td style="text-transform:uppercase;">{{App\Informes::find($Informe->id)->nombreCompleto($Informe->id)}}</td>
                </tr>
                <tr>
                    <td>Edad</td>
                    <td>{{$Informe->edad}}</td>
                </tr>
                <tr>
                    <td>Sexo</td>
                    <td>{{$Informe->sexo}}</td>
                </tr>
               
                <tr>
                    <td>Ocupacion</td>
                    <td >{{$Informe->ocupacion}}</td>
                </tr>
                <tr>
                    <td>Carrera</td>
                    <td>{{$Informe->carrera}}</td>
                </tr>
                <tr>
                    <td>Cuatrimestre</td>
                    <td>{{$Informe->cuatrimestre}}</td>
                </tr>
                <tr>
                    <td>Numero de sesiones</td>
                    <td>{{$Informe->sesion}}</td>
                </tr>
                </br>
                <tr>
                    <td>Motivo de consulta</td>
                    <td>{{$Informe->motivo}}</td>
                </tr>
                <tr>
                    <td>Tecnicas psicologicas utilizadas</td>
                    <td>{{$Informe->tecnicas}}</td>
                </tr>
                <tr>
                    <td>Obervaciones generales</td>
                    <td>{{$Informe->observaciones}}</td>
                </tr>
                <tr>
                    <td>Concluciones del caso</td>
                    <td>{{$Informe->conclusiones}}</td>
                </tr>

                <tr>
                    <td>Fecha de informe</td>
                    <td>{{Carbon\Carbon::parse($Informe->created_at)->format('d-m-Y')}}</td>
                </tr>

            </tbody>
        </table>
    </div>
     <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h4 style="text-transform: uppercase; position:fixed; top:65%; text-align: center;">Atentamente</h4>
    <div class="center" style="text-transform: uppercase; position:fixed; top:67%; text-align: center;">
        
        <br>
        <p>
            Lic.{{App\Psicologo::find($Informe->psicologo_id)->nombreCompleto($Informe->psicologo_id)}}<br>
           
        </p>
    </div>
    
    <div class="center" style="text-align: center;  position:fixed; top:87%;">
        <small>Universidad Politécnica de Bacalar<br>

            Av. 39 s/n Lote 2 Mza. 271 entre Calle 50 y Calle 54 C.P. 77930 Bacalar Q. Roo<br>

            Teléfonos: 83 42340/ 83 42368, www.upb.edu.mx</small>
    </div>
</body>

</html>
