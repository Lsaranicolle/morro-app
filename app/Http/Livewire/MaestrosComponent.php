<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class MaestrosComponent extends Component
{
    public $maestros;

    public function mount()
    {
        $this->getMaestros();
    }

    public function getMaestros()
    {
        $this->maestros = User::role('Profesor')->get();
    }

    public function render()
    {
        return view('livewire.maestros-component');
    }
}
