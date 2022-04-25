<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $guarded =['id','created_at','updated_at'];

    //Realacion tiene Muchos:
    public function entregas(){
        return $this->hasMany(Entrega::class);
    }

    //Relación Pertenece a Tema:
    public function tema(){
        return $this->belongsTo(Tema::class);
    }
}
