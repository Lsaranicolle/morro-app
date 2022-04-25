<?php

namespace App\Http\Livewire;

use App\Models\Asignatura;
use App\Models\Entrega;
use App\Models\Nota;
use App\Models\Tema;
use Livewire\Component;

class EntregasMaestroComponent extends Component
{

    public $temas, $asignatura, $nota, $selectentrega, $open = false;

    protected $rules = [
        'nota' => 'required|numeric|min:0|max:10',
    ];

    public function mount(Asignatura $asignatura)
    {
        $this->asignatura = $asignatura;
    }

    public function editNota(Entrega $entrega)
    {
        if ($entrega->nota) {
            $this->nota = $entrega->nota->nota;
        }
        $this->selectentrega = $entrega;      
        $this->open = true;
    }

    public function asignarNota()
    {
        $this->validate();

        if ($this->selectentrega->nota) {
            $nota = $this->selectentrega->nota;
            $nota->update([
                'nota' => $this->nota,
                'entrega_id' => $this->selectentrega->id,
            ]);
        
        } else {
            Nota::create([
                'nota' => $this->nota,
                'entrega_id' => $this->selectentrega->id,
            ]);
        }

        $this->reset(['nota', 'open', 'selectentrega']);

        $this->asignatura = $this->asignatura->fresh();
    }

    public function render()
    {
        return view('livewire.entregas-maestro-component');
    }
}
