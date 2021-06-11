<?php

use App\Tutor;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('psicologo')->group(function(){
    //creacion, edicion, actualizacion y vista de informes
    Route::get('/informe.pdf/{id}', 'PsicologoController@imprimirInforme')->name('psicologo.imprimirInforme');
    Route::get('/crearInforme','PsicologoController@crearInforme')->name('psicologo.crearInforme');
    Route::post('/storeInforme', 'PsicologoController@storeInforme')->name('psicologo.storeInforme');
    Route::get('/verInformes', 'PsicologoController@verInformes')->name('psicologo.verInformes');
    Route::get('/editarInforme/{id}', 'PsicologoController@editarInforme')->name('psicologo.editarInforme');
    Route::post('/actualizarInforme/{id}', 'PsicologoController@actualizarInforme')->name('psicologo.actualizarInforme');
    Route::get('/vistaInforme/{id}', 'PsicologoController@vistaInforme')->name('psicologo.vistaInforme');
    //Route::get('/imprimirInforme/{id}', 'PsicologoController@imprimirInforme')->name('psicologo.imprimirInforme');
    //craciones, edicion, actualizacion y vista de canalizacion
    Route::get('/crearCanal','PsicologoController@crearCanal')->name('psicologo.crearCanal');
    Route::post('/storeCanal', 'PsicologoController@storeCanal')->name('psicologo.storeCanal');
    Route::get('/verCanal', 'PsicologoController@verCanal')->name('psicologo.verCanal');
    Route::get('/editCanal/{id}', 'PsicologoController@editCanal')->name('psicologo.editCanal');
    Route::post('/actualizarCanal/{id}', 'PsicologoController@actualizarCanal')->name('psicologo.actualizarCanal');
    Route::get('/vistaCanalizacion/{id}', 'PsicologoController@vistaCanalizacion')->name('psicologo.vistaCanalizacion');
    Route::get('/canalizacion.pdf/{id}', 'PsicologoController@imprimirCanalizacion')->name('psicologo.imprimirCanalizacion');
   
    
});

Route::prefix('tutor')->group(function () {
    //alumnos monitores
    Route::get('/crearMonitor', 'TutorController@crearAlumnoMonitor')->name('tutor.crearMonitor');
    Route::post('/storeMonitor', 'TutorController@storeMonitor')->name('tutor.storeMonitor');
    Route::get('/alumnosMonitores', 'TutorController@showAlumnosMonitores')->name('tutor.alumnosMonitores');
    //desactivar monitor
    Route::get('/desactivarMonitor/{id}', 'TutorController@desactivarMonitor')->name('tutor.desactivarMonitor');
    //activar monitor
    Route::get('/activarMonitor/{id}', 'TutorController@activarMonitor')->name('tutor.activarMonitor');
    //Cuentas desactivadas
    Route::get('/monitoresDesactivados', 'TutorController@monitoresDesactivados')->name('tutor.monitoresDesactivados');
    //editar
    Route::get('/editarMonitor/{id}', 'TutorController@editarMonitor')->name('tutor.editarMonitor');
    Route::post('/actualizarMonitor/{id}', 'TutorController@actualizarMonitor')->name('tutor.actualizarMonitor');
    //alumnos tutorados
    Route::get('crearTutorado', 'TutorController@crearAlumnoTutorado')->name('tutor.crearTutorado');
    Route::post('/storeTutorado', 'TutorController@storeTutorado')->name('tutor.storeTutorado');
    Route::get('/alumnosTutorados', 'TutorController@showAlumnosTutorados')->name('tutor.alumnosTutorados');
    Route::get('/editarTutorado/{id}', 'TutorController@editarTutorado')->name('tutor.editarTutorado');
    Route::post('/actualizarTutorado/{id}', 'TutorController@actualizarTutorado')->name('tutor.actualizarTutorado');
    //desactivar monitor
    Route::get('/desactivarTutorado/{id}', 'TutorController@desactivarTutorado')->name('tutor.desactivarTutorado');
    //Cuentas desactivadas
    Route::get('/tutoradosDesactivados', 'TutorController@tutoradosDesactivados')->name('tutor.tutoradosDesactivados');
    //activar tutorado
    Route::get('/activarTutorado/{id}', 'TutorController@activarTutorado')->name('tutor.activarTutorado');
    //Reportes Individuales
    Route::get('/reporteIndividual', 'TutorController@reporteIndividual')->name('tutor.reporteIndividual');
    Route::post('/crearReporteIndividual', 'TutorController@crearReporteIndividual')->name('tutor.crearReporteIndividual');
    Route::get('/reportesIndividuales/{id}', 'TutorController@reportesIndividuales')->name('tutor.reportesIndividuales');
    Route::get('/reporteIndEdit/{id}', 'TutorController@reporteIndEdit')->name('tutor.reporteIndEdit');
    Route::post('/reporteIndUpdate/{id}', 'TutorController@reporteIndUpdate')->name('tutor.reporteIndUpdate');
    Route::get('/reporteIndVer/{id}', 'TutorController@reporteIndVer')->name('tutor.reporteIndVer');
    //Reportes Grupales
    Route::get('/reporteGrupal', 'TutorController@reporteGrupal')->name('tutor.reporteGrupal');
    Route::post('/crearReporteGrupal', 'TutorController@crearReporteGrupal')->name('tutor.crearReporteGrupal');
    Route::get('/reportesGrupales/{id}', 'TutorController@reportesGrupales')->name('tutor.reportesGrupales');
    Route::get('/reporteGrupEdit/{id}', 'TutorController@reporteGrupEdit')->name('tutor.reporteGrupEdit');
    Route::post('/reporteGrupUpdate/{id}', 'TutorController@reporteGrupUpdate')->name('tutor.reporteGrupUpdate');
    Route::get('/reporteGrupVer/{id}', 'TutorController@reporteGrupVer')->name('tutor.reporteGrupVer');

    //Perfil
    Route::get('/perfil', 'TutorController@perfil')->name('tutor.perfil');
    Route::get('/editPerfil', 'TutorController@editPerfil')->name('tutor.editPerfil');
    Route::post('/updatePerfil', 'TutorController@updatePerfil')->name('tutor.updatePerfil');

    //impresiones
    Route::get('/printRepInd/{id}', 'TutorController@printrepInd')->name('tutor.printRepInd');
    Route::get('/printRepGrup/{id}', 'TutorController@printrepGrup')->name('tutor.printRepGrup');
});

Route::prefix('monitor')->group(function () {
    Route::get('/alumnosTutorados/{id}', 'MonitorController@showTutorados')->name('monitor.alumnosTutorados');
});

Route::prefix('admin')->group(function () {
    //perfil
    Route::get('/perfil', 'AdminController@perfil')->name('admin.perfil');
    Route::get('/editPerfil', 'AdminController@editPerfil')->name('admin.editPerfil');
    Route::post('/updatePerfil', 'AdminController@updatePerfil')->name('admin.updatePerfil');
    //tutores
    Route::get('/crearTutor', 'AdminController@crearTutor')->name('admin.crearTutor');
    Route::post('/storeTutor', 'AdminController@storeTutor')->name('admin.storeTutor');
    Route::get('/tutores', 'AdminController@showTutores')->name('admin.Tutores');
    Route::get('/alumnosMonitores/{id}', 'AdminController@showMonitoresTutor')->name('admin.alumnosMonitores');
    //psicologos
    Route::get('/crearPsicologo', 'AdminController@crearPsicologo')->name('admin.crearPsicologo');
    Route::post('/storePsicologo', 'AdminController@storePsicologo')->name('admin.storePsicologo');
    Route::get('/psicologos', 'AdminController@showPsicologos')->name('admin.Psicologos');
    Route::get('/editarPsicologo/{id}', 'AdminController@editarPsicologo')->name('admin.editarPsicologo');
    Route::post('/actualizarPsicologo/{id}', 'AdminController@actualizarPsicologo')->name('admin.actualizarPsicologo');
    //Reportes Grupales
    Route::get('/reportesGrupales', 'AdminController@reportesGrupales')->name('admin.reportesGrupales');
    Route::get('/reportesIndividuales', 'AdminController@reportesIndividuales')->name('admin.reportesIndividuales');

     //ver informes psicologicos
    Route::get('/verInformeAdmin', 'AdminController@verInformeAdmin')->name('admin.verInformeAdmin');

     //ver Canalizaciones pscologicas
    Route::get('/vercanalizacionesAdmin', 'AdminController@vercanalizacionesAdmin')->name('admin.vercanalizacionesAdmin');
    //anuncios
    Route::get('/anuncios', 'AdminController@anuncios')->name('admin.anuncios');
    Route::get('/crearAnuncio', 'AdminController@crearAnuncio')->name('admin.crearAnuncio');
    Route::post('/storeAnuncio', 'AdminController@storeAnuncio')->name('admin.storeAnuncio');
    Route::get('/anuncioEdit/{id}', 'AdminController@anuncioEdit')->name('admin.anuncioEdit');
    Route::post('/anuncioUpdate/{id}', 'AdminController@anuncioUpdate')->name('admin.anuncioUpdate');
    Route::get('/anuncioDelete/{id}', 'AdminController@anuncioDelete')->name('admin.anuncioDelete');

    //editar
    Route::get('/editarTutor/{id}', 'AdminController@editarTutor')->name('admin.editarTutor');
    Route::post('/actualizarTutor/{id}', 'AdminController@actualizarTutor')->name('admin.actualizarTutor');
    Route::get('/editarPsicologo/{id}', 'AdminController@editarPsicologo')->name('admin.editarPsicologo');
    Route::post('/actualizarPsicologo/{id}', 'AdminController@actualizarPsicologo')->name('admin.actualizarPsicologo');

    //Estadisticas
    Route::get('/estadisticas', 'AdminController@estadisticas')->name('admin.estadisticas');
    Route::get('/reportesTutor/{id}', 'AdminController@reportesTutor')->name('admin.reportesTutor');
});

// Route::get('/test', function () {
//     $pdf = PDF::loadView('impresiones.repInd');
//     return $pdf->download('invoice.pdf');
// });
