<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reporte Individual</title>
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
                        <p>Tutorias Individuales <br> {{\Illuminate\Support\Facades\DB::table('carreras')->where('id', $reporte->carrera_id)->value('carrera')}} <br> Reporte de Entrevista</p>
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
                    <td>{{$reporte->alumno}}</td>
                </tr>
                <tr>
                    <td>Cuatrimestre</td>
                    <td>{{$reporte->cuatrimestre}}</td>
                </tr>
                <tr>
                    <td>Turno</td>
                    <td>{{$reporte->turno}}</td>
                </tr>
                <tr>
                    <td>Fecha</td>
                    <td>{{Carbon\Carbon::parse($reporte->fecha)->format('d-m-Y')}}</td>
                </tr>
                <tr>
                    <td>Tipo Tutoria</td>
                    <td>{{$reporte->tipo_tutoria}}</td>
                </tr>
                <tr>
                    <td>Duracion</td>
                    <td>{{$reporte->duracion}}</td>
                </tr>
                <tr>
                    <td>Actividades Realizadas</td>
                    <td>{{$reporte->observaciones}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="center" style="text-transform: uppercase">
        <h4>Atentamente</h4>
        <br>
        <p>
            Lic. {{$tutor->nombres}} {{$tutor->apellidoP}} {{$tutor->apellidoM}}<br>
            PROFESOR DE TIEMPO COMPLETO DE LA {{\Illuminate\Support\Facades\DB::table('carreras')->where('id', $tutor->carrera_id)->value('carrera')}}<br>
            TUTOR(A) DE {{$reporte->cuatrimestre}}º  T.V. {{\Illuminate\Support\Facades\DB::table('carreras')->where('id', $reporte->carrera_id)->value('carrera')}} <br>
        </p>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="center" style="text-align: center">
        <small>Universidad Politécnica de Bacalar<br>

            Av. 39 s/n Lote 2 Mza. 271 entre Calle 50 y Calle 54 C.P. 77930 Bacalar Q. Roo<br>

            Teléfonos: 83 42340/ 83 42368, www.upb.edu.mx</small>
    </div>
</body>

</html>