<?php

use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\SolicitudMateriaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('materias', MateriaController::class);
Route::resource('aulas', AulaController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('estudiantes', EstudianteController::class);
Route::resource('docentes', DocenteController::class);
Route::resource('asignaciones', AsignacionController::class);

Route::resource('turnos', SolicitudMateriaController::class);
Route::resource('solicitudes', SolicitudController::class);

// Route::get('/inscripciones', [SolicitudMateriaController::class, 'index'])->name('inscripciones.index');
// Route::post('/inscripciones/create', [SolicitudMateriaController::class, 'store'])->name('inscripciones.store');

// Rutas para crear horarios
// Route::post('/horarios', [MateriaController::class, 'store'])->name('horarios.store');

// // Ruta para aprobar materias
// Route::post('/materias/aprobar', [MateriaController::class, 'aprobarMateria'])->name('materias.aprobar');


// Route::get('/turnos', [SolicitudMateriaController::class, 'index'])->name('turnos.index');
// // Mostrar el formulario para crear un nuevo turno
// Route::get('/turnos/create', [SolicitudMateriaController::class, 'create'])->name('turnos.create');

// // Almacenar el nuevo turno
// Route::post('/turnos', [SolicitudMateriaController::class, 'store'])->name('turnos.store');