<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;
    protected $guarded =['id','created_at','updated_at'];

    //Relación Pertenece a Grado:
    public function grado(){
        return $this->belongsTo(Grado::class);
    }

    //Relación Pertenece a Profesor:
    public function maestro(){
        return $this->belongsTo(User::class);
    }

    //Realacion Muchos a Muchos con Estudiantes:
    public function users(){
        return $this->belongsToMany(User::class);
    }

    //Realacion tiene Muchos:
    public function temas(){
        return $this->hasMany(Tema::class);
    }

    //Ruta
    public function getRouteKeyName()
    {
        return 'nombre';
    }
}