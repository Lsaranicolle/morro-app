<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $guarded =['id','created_at','updated_at'];

    //Relación Pertenece a Grado:
    public function grado(){
        return $this->belongsTo(Grado::class);
    }
}
