<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\User;
use App\AlumnoMonitor;
use App\AlumnoTutorado;
use App\Tutor;
use App\TutoriaGrupal;
use App\TutoriaIndividual;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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

        $id = Auth::user()->id;
        $alumnos = AlumnoMonitor::where('tutor_id', '=', $id)->where('activo', '=', 1)->orderBy('created_at', 'DESC')->paginate(15);
        $message = 'No hay Alumnos';
        return view('tutor.alumnosMonitores', [
            'alumnos' => $alumnos,
            'message' => $message
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

    public function desactivarMonitor($id)
    {
        $alumno = AlumnoMonitor::find($id);
        $alumno->activo = 0;
        $alumno->update();
        return redirect('/tutor/alumnosMonitores')->with('msg', 'Alumno monitor desactivado satisfactoriamente');
    }
    public function monitoresDesactivados()
    {
        $id = Auth::user()->id;
        $alumnos = AlumnoMonitor::where('tutor_id', '=', $id)->where('activo', '=', 0)->orderBy('created_at', 'DESC')->paginate(15);

        return view('tutor.monitoresDesactivados', [
            'alumnos' => $alumnos
        ]);
    }

    public function activarMonitor($id)
    {
        $alumno = AlumnoMonitor::find($id);
        $alumno->activo = 1;
        $alumno->update();
        return redirect('/tutor/alumnosMonitores')->with('msg', 'Alumno monitor activado satisfactoriamente');
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
        $id = Auth::user()->id;
        $tutor = Tutor::where('user_id', '=', $id)->first();
        $tutor_carrera = $tutor->carrera_id;
        $alumnos = AlumnoTutorado::where('carrera_id', '=', $tutor_carrera)->where('activo', '=', 1)->orderBy('created_at', 'DESC')->paginate(15);

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
    public function desactivarTutorado($id)
    {
        $alumno = AlumnoTutorado::find($id);
        $alumno->activo = 0;
        $alumno->update();
        return redirect('/tutor/alumnosTutorados')->with('msg', 'Alumno tutorado desactivado satisfactoriamente');
    }
    public function tutoradosDesactivados()
    {
        $id = Auth::user()->id;
        $tutor = Tutor::where('user_id', '=', $id)->first();
        $tutor_carrera = $tutor->carrera_id;
        $alumnos = AlumnoTutorado::where('carrera_id', '=', $tutor_carrera)->where('activo', '=', 0)->orderBy('created_at', 'DESC')->paginate(15);

        return view('tutor.tutoradosDesactivados', [
            'alumnos' => $alumnos
        ]);
    }

    public function activarTutorado($id)
    {
        $alumno = AlumnoTutorado::find($id);
        $alumno->activo = 1;
        $alumno->update();
        return redirect('/tutor/alumnosTutorados')->with('msg', 'Alumno tutorado activado satisfactoriamente');
    }


    public function reporteIndividual()
    {
        $carreras = Carrera::all();
        return view('tutor.reporteIndividual', [
            'carreras' => $carreras
        ]);
    }
    public function crearReporteIndividual(Request $request)
    {
        $id = Auth::user()->id;
        $tutor = Tutor::where('user_id', '=', $id)->first();
        $tutor_id = $tutor->id;

        $reporte = new TutoriaIndividual();
        $reporte->alumno = $request->alumno;
        $reporte->cuatrimestre = $request->cuatrimestre;
        $reporte->turno = $request->turno;
        $reporte->fecha = $request->fecha;
        $reporte->tipo_tutoria = $request->tipo_tutoria;
        $reporte->duracion = $request->duracion;
        $reporte->observaciones = $request->observaciones;
        $reporte->tutor_id = $tutor_id;
        $reporte->carrera_id = $request->carrera_id;
        $reporte->save();
        return redirect('/tutor/reportesIndividuales')->with('msg', 'Tutoria individual creada satisfactoriamente.');
    }
    public function reportesIndividuales($id)
    {
        // $id = Auth::user()->id;
        $tutor = Tutor::where('user_id', '=', $id)->first();
        $tutor_id = $tutor->id;

        $reportes = TutoriaIndividual::where('tutor_id', '=', $tutor_id)->orderBy('created_at', 'DESC')->paginate(15);
        $message = 'No hay reportes';
        return view('tutor.reportesIndividuales', [
            'reportes' => $reportes,
            'message' => $message
        ]);
    }
    public function reporteIndEdit($id)
    {
        $carreras = Carrera::all();
        $reporte = TutoriaIndividual::find($id);
        return view('tutor.editReporteIndividual', [
            'reporte' => $reporte,
            'carreras' => $carreras
        ]);
    }
    public function reporteIndUpdate($id, Request $request)
    {
        $reporte = TutoriaIndividual::find($id);
        $reporte->alumno = $request->alumno;
        $reporte->cuatrimestre = $request->cuatrimestre;
        $reporte->turno = $request->turno;
        $reporte->fecha = $request->fecha;
        $reporte->tipo_tutoria = $request->tipo_tutoria;
        $reporte->duracion = $request->duracion;
        $reporte->observaciones = $request->observaciones;
        $reporte->carrera_id = $request->carrera_id;
        $reporte->update();

        return redirect('/tutor/reportesIndividuales')->with('msg', 'Tutoria individual actualizada satisfactoriamente.');
    }
    public function reporteIndVer($id)
    {
        $reporte = TutoriaIndividual::find($id);
        return view('tutor.verReporteIndividual', [
            'reporte' => $reporte
        ]);
    }

    public function reporteGrupal()
    {
        $carreras = Carrera::all();
        return view('tutor.reporteGrupal', [
            'carreras' => $carreras
        ]);
    }

    public function crearReporteGrupal(Request $request)
    {
        $id = Auth::user()->id;
        $tutor = Tutor::where('user_id', '=', $id)->first();
        $tutor_id = $tutor->id;

        $reporte =  new TutoriaGrupal();
        $reporte->cuatrimestre = $request->cuatrimestre;
        $reporte->turno = $request->turno;
        $reporte->grupo = $request->grupo;
        $reporte->carrera_id = $request->carrera_id;
        $reporte->fecha = $request->fecha;
        $reporte->dinamica = $request->dinamica;
        $reporte->observaciones = $request->observaciones;
        $reporte->tutor_id = $tutor_id;
        $reporte->save();
        return redirect('/home');
    }
    public function reportesGrupales($id)
    {

        // $id = Auth::user()->id;
        $tutor = Tutor::where('user_id', '=', $id)->first();
        $tutor_id = $tutor->id;

        $reportes = TutoriaGrupal::where('tutor_id', '=', $tutor_id)->orderBy('created_at', 'DESC')->paginate(15);
        $message = 'No hay reportes';
        return view('tutor.reportesGrupales', [
            'reportes' => $reportes,
            'message' => $message
        ]);
    }
    public function reporteGrupEdit($id)
    {
        $carreras = Carrera::all();
        $reporte = TutoriaGrupal::find($id);
        return view('tutor.editReporteGrupal', [
            'reporte' => $reporte,
            'carreras' => $carreras
        ]);
    }
    public function reporteGrupUpdate($id, Request $request)
    {
        $reporte = TutoriaGrupal::find($id);
        $reporte->cuatrimestre = $request->cuatrimestre;
        $reporte->turno = $request->turno;
        $reporte->grupo = $request->grupo;
        $reporte->fecha = $request->fecha;
        $reporte->dinamica = $request->dinamica;
        $reporte->observaciones = $request->observaciones;
        $reporte->carrera_id = $request->carrera_id;
        $reporte->update();

        $id = Auth::user()->id;
        $tutor = Tutor::where('user_id', '=', $id)->first();
        if (isset($tutor)) {
            return redirect('/tutor/reportesGrupales')->with('msg', 'Tutoria grupal actualizada satisfactoriamente.');
        } else {
            return redirect('/admin/reportesGrupales')->with('msg', 'Tutoria grupal actualizada satisfactoriamente.');
        }
    }
    public function reporteGrupVer($id)
    {
        $reporte = TutoriaGrupal::find($id);
        return view('tutor.verReporteGrupal', [
            'reporte' => $reporte
        ]);
    }

    public function perfil()
    {
        $tutor = auth()->user()->tutor()->first();
        return view('tutor.perfil', [
            'tutor' => $tutor
        ]);
    }
    public function editPerfil()
    {
        $carreras = Carrera::all();
        $tutor = auth()->user()->tutor()->first();
        // return $tutor;
        return view('tutor.editPerfil', [
            'tutor' => $tutor,
            'carreras' => $carreras
        ]);
    }

    public function updatePerfil(Request $request)
    {
        $tutor = auth()->user()->tutor()->first();
        $tutor->nombres = $request->nombres;
        $tutor->apellidoM = $request->apellidoM;
        $tutor->apellidoP = $request->apellidoP;
        $tutor->carrera_id = $request->carrera_id;
        $tutor->descripcion = $request->descripcion;
        $tutor->horario = $request->horario;
        $tutor->update();
        if ($request->hasFile('perfil_slug')) {
            $fileName = $request->perfil_slug->getClientOriginalname();
            if (auth()->user()->tutor()->first()->perfil_slug) {
                Storage::delete('/public/imagenesPerfil/' . auth()->user()->tutor()->first()->perfil_slug);
            }

            $request->perfil_slug->storeAs('imagenesPerfil', $fileName, 'public');
            auth()->user()->tutor()->first()->update(['perfil_slug' => $fileName]);
        }

        return redirect('/tutor/perfil')->with('msg', 'Perfil actualizado satisfactoriamente.');
    }

    public function printRepInd($id)
    {

        $reporte = TutoriaIndividual::find($id);
        $tutor = Tutor::find($reporte->tutor_id);
        $pdf = PDF::loadView('impresiones.repInd', [
            'reporte' => $reporte,
            'tutor' => $tutor
        ]);
        return $pdf->download('invoice.pdf');
    }
    public function printRepGrup($id)
    {

        $reporte = TutoriaGrupal::find($id);
        $tutor = Tutor::find($reporte->tutor_id);
        $pdf = PDF::loadView('impresiones.repGrup', [
            'reporte' => $reporte,
            'tutor' => $tutor
        ]);
        return $pdf->download('Reporte Grupal - Grupo ' . $reporte->grupo . ' - ' . Carbon::parse($reporte->fecha)->format('d-m-Y') . '.pdf');
    }
}
