<?php

namespace App\Http\Livewire;

use App\Models\Grado;
use App\Models\Horario;
use App\Models\SchoolReport;
use Livewire\Component;

class HorariosComponent extends Component
{
    protected $listeners = ['delete'];
    
    public $setContenido = <<<'EOT'
    <figure class="table"><table><tbody><tr><td>LUNES</td><td>MARTES</td><td>MIERCOLES</td><td>JUEVES</td><td>VIERNES</td><td>SABADO</td><td>DOMINGO</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure><p>&nbsp;</p>
    EOT;

    public $grados, $horarios, $horario;

    public $grado_id = "", $content;

    public $editForm=[
        'open' => false,
        'grado_id' => '',   
    ];

    public $rules=[
        'grado_id' => 'required',
        'content' => 'required',
    ];

    public function mount()
    {
        $this->getHorarios();
        $this->getGrados();
    }

    public function getHorarios()
    {
        $this->horarios = Horario::all();
    }

    public function getGrados()
    {
        $this->grados = Grado::all();
    }

    public function save()
    {
        $this->validate();

        Horario::create([
            'content' => $this->content,
            'grado_id' => $this->grado_id,
        ]);

        $this->getHorarios();
        $this->reset('grado_id', 'content');
    }

    public function delete(Horario $horario)
    {
        $horario->delete();
        $this->getHorarios();
    }

    public function render()
    {
        return view('livewire.horarios-component');
    }
}
