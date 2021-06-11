<?php

namespace App\Http\Controllers;

use App\canalizacion;
use App\informes;
use App\Psicologo;
use App\informes as AppInformes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsicologoController extends Controller
{
    public function index()
    {
        return view('psicologo/verInformes');
    }

    //perfil
    
    public function crearInforme()
    {
        return view('psicologo.crearInforme');
    }

    public function editarInforme($id)
    {
        $Informe=AppInformes::find($id);
        return view('psicologo/editarInforme',compact('Informe'));
    }
    public function actualizarInforme($id, Request $request)
    {   
        $Informe=AppInformes::find($id);
        $Informe->nombre = $request->nombre;
        $Informe->apellidoP = $request->apellidoP;
        $Informe->apellidoM = $request->apellidoM;
        $Informe->edad = $request->edad;
        $Informe->sexo = $request->sexo;
        $Informe->ocupacion = $request->ocupacion;
        $Informe->carrera = $request->carrera;
        $Informe->cuatrimestre = $request->cuatrimestre;
        $Informe->sesion = $request->sesion;
        $Informe->motivo = $request->motivo;
        $Informe->tecnicas = $request->tecnicas;
        $Informe->observaciones = $request->observaciones;
        $Informe->conclusiones = $request->conclusiones;
        $Informe->update();
        //$informeDatos=request()->except(['_token','_method']);
        return redirect('psicologo/verInformes')->with('msg', 'Informe de ' . $Informe->nombre. ' '. $Informe->apellidoP. ' actualizado satisfactoriamente.');
        //return redirect('informe/show')->with('Mensaje','Informe actualizado correctamente');
    }
    public function storeInforme(Request $request)
    {
        $id = Auth::user()->id;
        $psicologo = Psicologo::where('user_id', '=', $id)->first();
        $psicologo_id = $psicologo->id;

        $Informe = new AppInformes();
        $Informe->nombre = $request->nombre;
        $Informe->apellidoP = $request->apellidoP;
        $Informe->apellidoM = $request->apellidoM;
        $Informe->edad = $request->edad;
        $Informe->sexo = $request->sexo;
        $Informe->ocupacion = $request->ocupacion;
        $Informe->carrera = $request->carrera;
        $Informe->cuatrimestre = $request->cuatrimestre;
        $Informe->sesion = $request->sesion;
        $Informe->motivo = $request->motivo;
        $Informe->tecnicas = $request->tecnicas;
        $Informe->observaciones = $request->observaciones;
        $Informe->conclusiones = $request->conclusiones;
        $Informe->psicologo_id = $psicologo_id;
        $Informe->save();
        return redirect('psicologo/verInformes')->with('msg', 'Informe de' . $Informe->nombre. ' '. $Informe->apellidoP.' creado y enviado al administrador satisfactoriamente.');
    }
    public function verInformes()
    {
        $id = Auth::user()->id;
        $psicologo = Psicologo::where('user_id', '=', $id)->first();
        $psicologo_id = $psicologo->id;
       
        $Informe ['Informe'] = AppInformes::where('psicologo_id', '=', $psicologo_id)->orderBy('created_at', 'DESC')->paginate(15);
        return view('psicologo.verInformes',$Informe
        );
    }
    

    
    public function vistaInforme($id){
        
        $Informe=AppInformes::find($id);
        
        return view('psicologo.vistaInforme',compact('Informe'));
    }

   
    
    public function imprimirInforme($id){
       
        $Informe=informes::find($id);
        $pdf= \PDF::loadView('psicologo.imprimirInforme', compact('Informe'));
        
        return $pdf->stream('Informe psicologico.pdf');
    }
    //Creacion de canalizacion

    public function crearcanal()
    {
        return view('psicologo.crearCanal'); 
    }
    public function storeCanal(Request $request)
    {
        $id = Auth::user()->id;
        $psicologo = Psicologo::where('user_id', '=', $id)->first();
        $psicologo_id = $psicologo->id;

        $canalizacion = new canalizacion();
        $canalizacion->nombre = $request->nombre;
        $canalizacion->apellidoP = $request->apellidoP;
        $canalizacion->apellidoM = $request->apellidoM;
        $canalizacion->sexo = $request->sexo;
        $canalizacion->carrera = $request->carrera;
        $canalizacion->cuatrimestre = $request->cuatrimestre;
        $canalizacion->fecha = $request->fecha;
        $canalizacion->problematica = $request->problematica;
        $canalizacion->turno = $request->turno;
        $canalizacion->psicologo_id = $psicologo_id;
        $canalizacion->save();

       
        return redirect('psicologo/verCanal')->with('msg', 'Canalizacion de ' .  $canalizacion->nombre .' ' .$canalizacion->apellidoP.' creada y enviada al administrador satisfactoriamente.');

       
    }

    public function editCanal($id){
        $canalizacion=canalizacion::find($id);
        return view('psicologo/editCanal',compact('canalizacion'));
    }
    public function actualizarCanal($id, Request $request)
    {
        $canalizacion=canalizacion::find($id);
        $canalizacion->nombre = $request->nombre;
        $canalizacion->apellidoP = $request->apellidoP;
        $canalizacion->apellidoM = $request->apellidoM;
        $canalizacion->sexo = $request->sexo;
        $canalizacion->carrera = $request->carrera;
        $canalizacion->cuatrimestre = $request->cuatrimestre;
        $canalizacion->fecha = $request->fecha;
        $canalizacion->problematica = $request->problematica;
        $canalizacion->turno = $request->turno;
        $canalizacion->update();
        return redirect('psicologo/verCanal')->with('msg', 'Canalizacion de '.  $canalizacion->nombre .' ' .$canalizacion->apellidoP. ' actualizada satisfactoriamente.');
    }
  
    

    public function verCanal()
    {
        $id = Auth::user()->id;
        $psicologo = Psicologo::where('user_id', '=', $id)->first();
        $psicologo_id = $psicologo->id;
        $canalizacion ['canalizacion'] = canalizacion::where('psicologo_id', '=', $psicologo_id)->orderBy('created_at', 'DESC')->paginate(15);
      
        return view('psicologo/verCanal',$canalizacion);
    }
    
    public function vistaCanalizacion($id){
        
        $canalizacion=canalizacion::find($id);
        
        return view('psicologo.vistaCanalizacion',compact('canalizacion'));
    }
   
    public function imprimirCanalizacion($id){
       
        $canalizacion=canalizacion::find($id);
        $pdf= \PDF::loadView('psicologo.imprimirCanalizacion', compact('canalizacion'));
        
        return $pdf->stream('Canalizacion psicologica.pdf');
    }
    
}
