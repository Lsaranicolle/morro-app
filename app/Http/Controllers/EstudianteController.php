<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use App\Models\SchoolReport;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function horario()
    {
        $user = auth()->user();
        
        return view('estudiante.mihorario', compact('user'));
    }

    public function notas()
    {
        $entregas = Entrega::query()->where('user_id', auth()->user()->id)->has('nota')->get();
        
        return view('estudiante.miscalificaciones', compact('entregas'));
    }

    public function boletines()
    {
        $boletines = SchoolReport::where('user_id', auth()->user()->id)->get();

        return view('estudiante.misboletines', compact('boletines'));
    }
}
