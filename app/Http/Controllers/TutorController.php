<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\User;
use App\AlumnoMonitor;
use App\Tutor;
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

    public function showAlumnosMonitores(){
        $alumnos = AlumnoMonitor::paginate(15);

        return view('tutor.alumnosMonitores', [
            'alumnos' => $alumnos
        ]);
    }
}
