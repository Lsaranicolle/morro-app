<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class EstudiantesComponent extends Component
{
    public $estudiantes;

    public function mount()
    {
        $this->getEstudiantes();
    }

    public function getEstudiantes()
    {
        $this->estudiantes = User::role('Estudiante')->get();
    }

    public function render()
    {
        return view('livewire.estudiantes-component');
    }
}
