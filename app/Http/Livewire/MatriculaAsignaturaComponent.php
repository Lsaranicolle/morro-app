<?php

namespace App\Http\Livewire;

use App\Models\Asignatura;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class MatriculaAsignaturaComponent extends Component
{
    use WithPagination;

    protected $queryString =['search' => ['except' => '']];

    public $search = '';
    public $perPage = '10';

    public $estudiantes, $asignatura, $cant;

    public function mount(Asignatura $asignatura)
    {
        $this->asignatura = $asignatura;
    }

    public function matricular($user)
    {
        $user = User::find($user);
        $user->asignaturas()->attach($this->asignatura->id);
        $this->render();
        $this->asignatura = $this->asignatura->fresh();
        $this->emit('matriculado');
    }

    public function desmatricular($user)
    {   
        $user = User::find($user);
        $user->asignaturas()->detach($this->asignatura->id);
        $this->render();
        $this->asignatura = $this->asignatura->fresh();
        $this->emit('eliminado');
    }

    public function render()
    {
        return view('livewire.matricula-asignatura-component', ['users' => User::where('name', 'LIKE', "%{$this->search}%" )
        ->orWhere('email', 'LIKE', "%{$this->search}%")
        ->role('Estudiante')
        ->paginate($this->perPage)]);
    }

}
