<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\User;
use App\AlumnoMonitor;
use App\AlumnoTutorado;
use App\Tutor;
use App\TutoriaIndividual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function crearAlumnoMonitor()
    {
        $carreras = Carrera::all();
        return view('tutor.crearMonitor', [
            'carreras' => $carreras,
        ]);
    }
    public function storeMonitor(Request $request)
    {
        //busqueda del id del tutor
        $id = Auth::user()->id;
        $tutor = Tutor::where('user_id', '=', $id)->first();
        $tutor_id = $tutor->id;

        //creacion del usuario
        $newUser =  new User();
        $newUser->name = $request->nombreUsuario;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->assignRole('Alumno_Monitor');
        $newUser->save();

        //creacion del alumno monitor que corresponde al usuario (perfil)
        $newAlumno = new AlumnoMonitor();
        $newAlumno->user_id = $newUser->id;
        $newAlumno->nombres = $request->nombres;
        $newAlumno->apellidoM = $request->apellidoM;
        $newAlumno->apellidoP = $request->apellidoP;
        $newAlumno->carrera_id = $request->carrera;
        $newAlumno->tutor_id = $tutor_id;
        $newAlumno->save();

        return redirect('/tutor/alumnosMonitores')->with('msg', 'Alumno monitor creado satisfactoriamente.');
    }

    public function showAlumnosMonitores()
    {
        $alumnos = AlumnoMonitor::paginate(15);

        return view('tutor.alumnosMonitores', [
            'alumnos' => $alumnos
        ]);
    }
    public  function  crearAlumnoTutorado()
    {
        $carreras = Carrera::all();
        $monitores = AlumnoMonitor::all();
        return view('tutor.crearTutorado', [
            'carreras' => $carreras,
            'monitores' => $monitores,
        ]);
    }
    public function editarMonitor($id)
    {
        $carreras = Carrera::all();
        $monitor = AlumnoMonitor::find($id);
        return view('tutor.editarMonitor', [
            'monitor' => $monitor,
            'carreras' => $carreras
        ]);
    }

    public function actualizarMonitor($id, Request $request)
    {
        $monitor = AlumnoMonitor::find($id);
        $monitor->nombres = $request->nombres;
        $monitor->apellidoM = $request->apellidoM;
        $monitor->apellidoP = $request->apellidoP;
        $monitor->carrera_id = $request->carrera;
        $monitor->update();
        return redirect('/tutor/alumnosMonitores')->with('msg', 'Alumno monitor actualizado satisfactoriamente.');
    }

    public function storeTutorado(Request $request)
    {

        $tutorado = new AlumnoTutorado();
        $tutorado->nombres = $request->nombres;
        $tutorado->apellidos = $request->apellidos;
        $tutorado->carrera_id = $request->carrera;
        $tutorado->grupo = $request->grupo;
        $tutorado->cuatrimestre = $request->cuatrimestre;
        $tutorado->alumno_monitor_id = $request->alumnoMonitorId;
        $tutorado->descripcion = $request->descripcion;
        $tutorado->save();
        return redirect('/tutor/alumnosTutorados')->with('msg', 'Alumno tutorado creado satisfactoriamente.');
    }
    public function showAlumnostutorados()
    {
        $alumnos = AlumnoTutorado::paginate(15);

        return view('tutor.alumnosTutorados', [
            'alumnos' => $alumnos
        ]);
    }

    public function editarTutorado($id)
    {
        $monitores = AlumnoMonitor::all();
        $carreras = Carrera::all();
        $tutorado = AlumnoTutorado::find($id);
        $monitorSel = AlumnoMonitor::find($tutorado->alumno_monitor_id);
        return view('tutor.editarTutorado', [
            'tutorado' => $tutorado,
            'carreras' => $carreras,
            'monitores' => $monitores,
            'monitorSel' => $monitorSel
        ]);
    }
    public function actualizarTutorado($id, Request $request)
    {
        $tutorado = AlumnoTutorado::find($id);
        $tutorado->nombres = $request->nombres;
        $tutorado->apellidos = $request->apellidos;
        $tutorado->carrera_id = $request->carrera;
        $tutorado->grupo = $request->grupo;
        $tutorado->cuatrimestre = $request->cuatrimestre;
        $tutorado->alumno_monitor_id = $request->alumnoMonitorId;
        $tutorado->descripcion = $request->descripcion;
        $tutorado->update();
        return redirect('/tutor/alumnosTutorados')->with('msg', 'Alumno tutorado actualizado satisfactoriamente.');
    }
    public function reporteIndividual()
    {
        return view('tutor.reporteIndividual');
    }
    public function crearReporteIndividual(Request $request)
    {
        $id = Auth::user()->id;
        $reporte = new TutoriaIndividual();
        $reporte->alumno = $request->alumno;
        $reporte->cuatrimestre = $request->cuatrimestre;
        $reporte->turno = $request->turno;
        $reporte->fecha = $request->fecha;
        $reporte->tipo_tutoria = $request->tipo_tutoria;
        $reporte->duracion = $request->duracion;
        $reporte->observaciones = $request->observaciones;
        $reporte->tutor_id = $id;
        $reporte->save();
        return redirect('/home');
    }
    public function reportesIndividuales()
    {
        $id = Auth::user()->id;
        $reportes = TutoriaIndividual::where('tutor_id', '=', $id)->get();
        return view('tutor.reportesIndividuales', [
            'reportes' => $reportes,
        ]);
    }
    public function reporteIndEdit($id)
    {
        $reporte = TutoriaIndividual::find($id);
        return view('tutor.editReporteIndividual', [
            'reporte' => $reporte
        ]);
    }
    public function reporteIndUpdate($id, Request $request)
    {
        return $request;
    }
}
