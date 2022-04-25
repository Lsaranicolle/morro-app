<?php

namespace App\Http\Livewire;

use App\Models\Asignatura;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MatriculaComponent extends Component
{
    public $users, $asignaturas, $asignatura;

    protected $listeners = ['delete'];

    public $createForm=[
        'estudiante' => '',
        'asignatura' => '',  
    ];

    public $editForm=[
        'estudiante' => '',
        'asignatura' => '',  
    ];

    public $rules=[
        'createForm.estudiante' => 'required',
        'createForm.asignatura' => 'required',
    ];

    public function mount()
    {
        $this->getAsignaturas();
        $this->getUsers();
    }

    public function getAsignaturas()
    {
        $this->asignaturas = Asignatura::where('maestro_id', Auth::user()->id)->get();
    }

    public function getUsers()
    {
        $this->users = User::role('Estudiante')->orderBy('name')->get();
    }

    public function save()
    {
        $this->validate();

        $user = User::find($this->createForm['estudiante']);

        $user->asignaturas()->attach($this->createForm['asignatura']);

        $this->reset('createForm');

        $this->emit('saved');
    }
  
    public function render()
    {
        return view('livewire.matricula-component');
    }
}
