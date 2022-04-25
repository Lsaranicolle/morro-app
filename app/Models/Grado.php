<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;
    protected $guarded =['id','created_at','updated_at'];

    //Relación uno a muchos:
    public function asignaturas(){
        return $this->hasMany(Asignatura::class);
    }

    //Relación uno a muchos:
    public function users(){
        return $this->hasMany(User::class);
    }

    //Relación tiene un Horario:
    public function horario(){
        return $this->hasOne(Horario::class);
    }
}
