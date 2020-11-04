<?php

namespace App\Http\Controllers;

use App\AlumnoMonitor;
use App\Carrera;
use App\Psicologo;
use App\Tutor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getReportes()
    {
        return 'reportes';
    }

    public function crearTutor()
    {
        $carreras = Carrera::all();
        return view('admin.crearTutor', [
            'carreras' => $carreras
        ]);
    }
    public function storeTutor(Request $request)
    {


        //creacion del usuario
        $newUser =  new User();
        $newUser->name = $request->nombreUsuario;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->assignRole('Tutor');
        $newUser->save();

        //creacion del alumno monitor que corresponde al usuario (perfil)
        $newTutor = new Tutor();
        $newTutor->user_id = $newUser->id;
        $newTutor->nombres = $request->nombres;
        $newTutor->apellidoM = $request->apellidoM;
        $newTutor->apellidoP = $request->apellidoP;
        $newTutor->carrera_id = $request->carrera;
        $newTutor->horario = $request->horario;
        $newTutor->descripcion = $request->descripcion;
        $newTutor->save();

        return redirect('/admin/tutores')->with('msg', 'Tutor creado satisfactoriamente.');
    }
    public function showTutores()
    {
        $tutores = Tutor::paginate(15);

        return view('admin.tutores', [
            'tutores' => $tutores
        ]);
    }
    public function crearPsicologo()
    {
        return view('admin.crearPsicologo');
    }
    public function storePsicologo(Request $request)
    {


        //creacion del usuario
        $newUser =  new User();
        $newUser->name = $request->nombreUsuario;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->assignRole('Psicologo');
        $newUser->save();

        //creacion del alumno monitor que corresponde al usuario (perfil)
        $newPsicologo = new Psicologo();
        $newPsicologo->user_id = $newUser->id;
        $newPsicologo->nombres = $request->nombres;
        $newPsicologo->apellidoM = $request->apellidoM;
        $newPsicologo->apellidoP = $request->apellidoP;
        //$newPsicologo->horario = $request->horario;
        $newPsicologo->descripcion = $request->descripcion;
        $newPsicologo->save();

        return redirect('/home')->with('msg', 'Psicologo creado satisfactoriamente.');
    }
    public function showPsicologos()
    {
        $psicologos = Psicologo::paginate(15);

        return view('admin.psicologos', [
            'psicologos' => $psicologos
        ]);
    }

    public function showMonitoresTutor($id)
    {
        $alumnos = AlumnoMonitor::where('tutor_id', '=', $id)->paginate(15);

        return view('tutor.alumnosMonitores', [
            'alumnos' => $alumnos
        ]);
    }
}
