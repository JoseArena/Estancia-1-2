<?php

namespace App\Http\Controllers;

use App\AlumnoMonitor;
use App\AlumnoTutorado;
use App\Carrera;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showTutorados($id)
    {
        $monitor = AlumnoMonitor::find($id);
        $monitorCarrera = Carrera::find($monitor->carrera_id);
        $carreraNombre = $monitorCarrera->carrera;
        $alumnos = AlumnoTutorado::where('alumno_monitor_id', '=', $id)->get();
        return view('monitor.alumnosTutorados', [
            'monitor' => $monitor,
            'alumnos' => $alumnos,
            'carreraNombre' => $carreraNombre
        ]);
    }
}
