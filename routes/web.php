<?php

use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\AsignaturasController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\MiHorarioController;
use App\Http\Livewire\BoletinesComponent;
use App\Http\Livewire\EditarTema;
use App\Http\Livewire\EntregaComponent;
use App\Http\Livewire\EntregasMaestroComponent;
use App\Http\Livewire\HorariosComponent;
use App\Http\Livewire\MatriculaAsignaturaComponent;
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

// Route::middleware(['auth:sanctum', 'verified'])->get('/inicio', function () {
//     return view('inicio');
// })->name('inicio');

Route::get('/', function () {
    return view('bienvenida');
})->name('/');

Route::get('/informacion', function () {
    return view('info');
})->name('info');

Route::get('/institucion', function () {
    return view('institucion');
})->name('institucion');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::group(['middleware' => ['role:Estudiante']], function () {

    Route::get('/estudiante/horario', [EstudianteController::class, 'horario'])->name('mihorario');

    Route::get('/estudiante/calificaciones', [EstudianteController::class, 'notas'])->name('misnotas');

    Route::get('/estudiante/boletines', [EstudianteController::class, 'boletines'])->name('misboletines');

    Route::resource('/mis-asignaturas', AsignaturasController::class)->names('misasignaturas');

    Route::get('entrega/{tarea}/creacion', EntregaComponent::class)->name('entrega.create');

   

});

Route::group(['middleware' => ['role:Profesor|Administrador']], function () {

    Route::get('horarios', HorariosComponent::class)->name('admin.horarios');

    Route::resource('administraciones/docentente', AdministracionController::class)->names('docente.administracion');

    Route::get('matriculas/{asignatura}/estudiantes', MatriculaAsignaturaComponent::class)->name('matriculas.usuarios');

    Route::get('entregas/{asignatura}/estudiantes', EntregasMaestroComponent::class)->name('entregas.usuarios');

    Route::get('boletines', BoletinesComponent::class)->name('admin.boletines');

    Route::get('tema/{tema}/edicion', EditarTema::class)->name('tema.edit');

});









