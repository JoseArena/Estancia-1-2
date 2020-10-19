<?php

use App\Tutor;
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

Route::prefix('tutor')->group(function () {
    //alumnos monitores
    Route::get('/crearMonitor', 'TutorController@crearAlumnoMonitor')->name('tutor.crearMonitor');
    Route::post('/storeMonitor', 'TutorController@storeMonitor')->name('tutor.storeMonitor');
    Route::get('/alumnosMonitores', 'TutorController@showAlumnosMonitores')->name('tutor.alumnosMonitores');
    //editar
    Route::get('/editarMonitor/{id}', 'TutorController@editarMonitor')->name('tutor.editarMonitor');
    Route::post('/actualizarMonitor/{id}', 'TutorController@actualizarMonitor')->name('tutor.actualizarMonitor');
    //alumnos tutorados
    Route::get('crearTutorado', 'TutorController@crearAlumnoTutorado')->name('tutor.crearTutorado');
    Route::post('/storeTutorado', 'TutorController@storeTutorado')->name('tutor.storeTutorado');
    Route::get('/alumnosTutorados', 'TutorController@showAlumnosTutorados')->name('tutor.alumnosTutorados');
    Route::get('/editarTutorado/{id}', 'TutorController@editarTutorado')->name('tutor.editarTutorado');
    Route::post('/actualizarTutorado/{id}', 'TutorController@actualizarTutorado')->name('tutor.actualizarTutorado');
});

Route::prefix('monitor')->group(function () {
    Route::get('/alumnosTutorados/{id}', 'MonitorController@showTutorados')->name('monitor.alumnosTutorados');
});
