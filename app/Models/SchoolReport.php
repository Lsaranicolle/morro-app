<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolReport extends Model
{
    use HasFactory;

    protected $guarded =['id','created_at','updated_at'];

    //Relación Pertenece a Estudiante:
    public function user(){
        return $this->belongsTo(User::class);
    }
}
