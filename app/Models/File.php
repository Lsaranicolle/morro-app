<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $guarded =['id','created_at','updated_at'];

    //Relación Pertenece a Entrega:
    public function entrega(){
        return $this->belongsTo(Entrega::class);
    }
}
