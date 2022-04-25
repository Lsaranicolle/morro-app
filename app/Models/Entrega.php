<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;

    protected $guarded =['id','created_at','updated_at'];

    //Realacion tiene Muchos:
    public function archivos(){
        return $this->hasMany(File::class);
    }

    //Relación Pertenece a Tarea:
    public function tarea(){
        return $this->belongsTo(Tarea::class);
    }

    //Relación Pertenece a Estudiante:
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relación tiene una Nota:
    public function nota(){
        return $this->hasOne(Nota::class);
    }

    //Relación tiene Muchos Comentarios:
    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }


}
