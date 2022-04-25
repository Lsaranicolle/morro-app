<?php

use App\Http\Livewire\AsignaturaComponent;
use App\Http\Livewire\EstudiantesComponent;
use App\Http\Livewire\GradoComponent;
use App\Http\Livewire\MaestrosComponent;
use App\Http\Livewire\UsersComponent;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['role:Administrador|Profesor']], function () {

    Route::get('grados', GradoComponent::class)->name('admin.grados');

    Route::get('asignaturas', AsignaturaComponent::class)->name('admin.asignaturas');

    Route::get('estudiantes', EstudiantesComponent::class)->name('admin.estudiantes');

    Route::get('maestros', MaestrosComponent::class)->name('admin.maestros');

    Route::get('usuarios', UsersComponent::class)->name('admin.usuarios');

});

