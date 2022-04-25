<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;
    protected $guarded =['id','created_at','updated_at'];

    //Relación Pertenece a Asignatura:
    public function asignatura(){
        return $this->belongsTo(Asignatura::class);
    }

    //Realacion tiene Muchos:
    public function tareas(){
        return $this->hasMany(Tarea::class);
    }

    //Relación tiene Muchos temas:
    public function temas(){
        return $this->hasMany(Tema::class);
    }

    //Relación tiene Muchos FileGuides:
    public function fileGuides(){
        return $this->hasMany(FileGuide::class);
    }
    
}
