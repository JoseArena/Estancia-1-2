<?php

namespace App\Http\Controllers;

use App\AlumnoMonitor;
use App\Admin;
use App\Anuncio;
use App\canalizacion;
use App\Carrera;
use App\informes;
use App\Psicologo;
use App\Tutor;
use App\TutoriaGrupal;
use App\TutoriaIndividual;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    //perfil
    public function perfil()
    {
        $admin = auth()->user()->admin()->first();
        return view('admin.perfil', [
            'admin' => $admin
        ]);
    }

    public function editPerfil()
    {
        $admin = auth()->user()->admin()->first();
        // return $tutor;
        return view('admin.editPerfil', [
            'admin' => $admin,
        ]);
    }

    public function updatePerfil(Request $request)
    {
        $tutor = auth()->user()->admin()->first();
        $tutor->nombres = $request->nombres;
        $tutor->apellidoM = $request->apellidoM;
        $tutor->apellidoP = $request->apellidoP;
        $tutor->update();
        if ($request->hasFile('perfil_slug')) {
            $fileName = $request->perfil_slug->getClientOriginalname();
            if (auth()->user()->admin()->first()->perfil_slug) {
                Storage::delete('/public/imagenesPerfil/admin/' . auth()->user()->admin()->first()->perfil_slug);
            }

            $request->perfil_slug->storeAs('imagenesPerfil/admin', $fileName, 'public');
            auth()->user()->admin()->first()->update(['perfil_slug' => $fileName]);
        }

        return redirect('/admin/perfil')->with('msg', 'Perfil actualizado satisfactoriamente.');
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
        $message = 'No hay Alumnos';
        return view('tutor.alumnosMonitores', [
            'alumnos' => $alumnos,
            'message' => $message
        ]);
    }

    public function reportesGrupales()
    {
        $reportes = TutoriaGrupal::orderBy('created_at', 'DESC')->paginate(15);
        return view('admin.reportesGrupales', [
            'reportes' => $reportes,
        ]);
    }
    public function reportesIndividuales()
    {
        $reportes = TutoriaIndividual::orderBy('created_at', 'DESC')->paginate(15);
        return view('admin.reportesIndividuales', [
            'reportes' => $reportes,
        ]);
    }
    public function crearAnuncio()
    {
        return view('admin.crearAnuncio');
    }
    public function storeAnuncio(Request $request)
    {
        $anuncio = new Anuncio();
        $anuncio->titulo = $request->titulo;
        $anuncio->descripcion = $request->descripcion;
        $anuncio->link = $request->link;
        $anuncio->save();
        return redirect('/home');
    }
    public function anuncios()
    {
        $anuncios = Anuncio::orderBy('created_at', 'DESC')->paginate(15);
        return view('admin.anuncios', [
            'anuncios' => $anuncios
        ]);
    }
    public function anuncioEdit($id)
    {
        $anuncio = Anuncio::find($id);
        return view('admin.anuncioEdit', [
            'anuncio' => $anuncio
        ]);
    }
    public function anuncioUpdate(Request $request, $id)
    {
        $anuncio = Anuncio::find($id);
        $anuncio->titulo = $request->titulo;
        $anuncio->descripcion = $request->descripcion;
        $anuncio->link = $request->link;
        $anuncio->update();
        return redirect('/admin/anuncios')->with('msg', 'Anuncio actualizado satistfactoriamente');
    }
    public function anuncioDelete($id)
    {
        $anuncio = Anuncio::find($id);
        $anuncio->forceDelete();
        return redirect('/admin/anuncios')->with('msg', 'Anuncio eliminado satistfactoriamente');
    }

    public function estadisticas(Request $request)
    {
        $nombreTutor = $request->get('tutoBuscarPor');
        $tipoTutor = $request->get('tutorTipo');

        $nombrePsico = $request->get('psicoBuscarPor');
        $tipoPsico = $request->get('psicoTipo');

        $nombreAlum = $request->get('alumBuscarPor');
        $tipoAlum = $request->get('alumTipo');

        $tutores = Tutor::buscarPor($tipoTutor, $nombreTutor)->paginate(5);

        $psicologos = Psicologo::buscarPor($tipoPsico, $nombrePsico)->paginate(5);

        $alumnos = AlumnoMonitor::buscarPor($tipoAlum, $nombreAlum)->paginate(5);


        return view('admin.estadisticas', [
            'tutores' => $tutores,
            'psicologos' => $psicologos,
            'alumnos' => $alumnos
        ]);
    }

    public function reportesTutor(Request $request,$id)
    {
        $tutor = Tutor::where('user_id', '=', $id)->first();
        $tutor_id = $tutor->id;

        $fInicio = $request->get('fI');
        $fFin = $request->get('fF');

        $fInicio2 = $request->get('fI2');
        $fFin2 = $request->get('fF2');

        $reportes = TutoriaGrupal::where('tutor_id', '=', $tutor_id)->orderBy('created_at', 'DESC')->BuscarPor($fInicio, $fFin)->paginate(5);
        $reportes2 = TutoriaIndividual::where('tutor_id', '=', $tutor_id)->orderBy('created_at', 'DESC')->BuscarPor($fInicio2, $fFin2)->paginate(5);
        return view('admin.reportesTutor', [
            'reportes' => $reportes,
            'reportes2' => $reportes2,
            'tutor_id' => $tutor_id
        ]);
    }

    public function editarTutor($id)
    {
        $carreras = Carrera::all();
        $tutor = Tutor::find($id);
        return view('admin.editarTutor', [
            'tutor' => $tutor,
            'carreras' => $carreras
        ]);
    }

    public function actualizarTutor($id, Request $request)
    {
        $tutor = Tutor::find($id);
        $tutor->nombres = $request->nombres;
        $tutor->apellidoM = $request->apellidoM;
        $tutor->apellidoP = $request->apellidoP;
        $tutor->carrera_id = $request->carrera;
        $tutor->descripcion = $request->descripcion;
        $tutor->horario = $request->horario;
        $tutor->update();
        return redirect('/admin/tutores')->with('msg', 'Tutor actualizado satisfactoriamente.');
    }

    public function editarPsicologo($id)
    {
        $psicologo = Psicologo::find($id);
        return view('admin.editarPsicologo', [
            'psicologo' => $psicologo,
        ]);
    }

    public function actualizarPsicologo($id, Request $request)
    {
        $psicologo = Psicologo::find($id);
        $psicologo->nombres = $request->nombres;
        $psicologo->apellidoM = $request->apellidoM;
        $psicologo->apellidoP = $request->apellidoP;
        $psicologo->descripcion = $request->descripcion;
        $psicologo->update();
        return redirect('/admin/psicologos')->with('msg', 'Psicologo actualizado satisfactoriamente.');
    }

    public function verInformeAdmin()
    {
        
       
        $Informe ['Informe'] = informes::orderBy('created_at', 'DESC')->paginate(15);
        return view('admin.verInformeAdmin',$Informe);
    }

    



    public function vercanalizacionesAdmin()
    {
        
       
        $canalizacion ['canalizacion'] = canalizacion::orderBy('created_at', 'DESC')->paginate(15);
        return view('admin.vercanalizacionesAdmin',$canalizacion)->with('msg', 'Usted ha recibido nuevas canalizaciones');
    }
}
