<?php

namespace App\Http\Livewire;

use App\Models\Grado;
use Livewire\Component;
use Livewire\WithPagination;

class GradoComponent extends Component
{
    use WithPagination;
    protected $queryString =['search' => ['except' => '']];
    public $search = '';
    public $perPage = '10';

    public $grado;

    protected $listeners = ['delete'];

    public $createForm=[
        'grado' => null,
        'nivel' => null,
        'seccion' => null,
        'jornada' => null,
        'modalidad' => null,       
    ];

    public $editForm=[
        'open' => false,
        'grado' => null,
        'nivel' => null,
        'seccion' => null,
        'jornada' => null,
        'modalidad' => null,
    ];

    public $rules=[
        'createForm.grado' => 'required',
        'createForm.nivel' => 'required',
        'createForm.seccion' => 'required',
        'createForm.jornada' => 'required',
        'createForm.modalidad' => 'required',
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function save()
    {
        $this->validate();
        Grado::create($this->createForm);
        $this->reset('createForm');
        $this->emit('gradoCreated');
    }

    public function edit(Grado $grado)
    {
        $this->grado = $grado;
        $this->editForm['open'] = true;
        $this->editForm['grado'] = $grado->grado;
        $this->editForm['nivel'] = $grado->nivel;
        $this->editForm['seccion'] = $grado->seccion;
        $this->editForm['jornada'] = $grado->jornada;
        $this->editForm['modalidad'] = $grado->modalidad;
        
    }

    public function update()
    {
       $this->validate([
        'editForm.grado' => 'required',
        'editForm.nivel' => 'required',
        'editForm.seccion' => 'required',
        'editForm.jornada' => 'required',
        'editForm.modalidad' => 'required',
       ]); 

       $this->grado->update($this->editForm);
       
       $this->reset('editForm');
    }

    public function delete(Grado $grado)
    {
        if(count($grado->users) > 0){
            session()->flash('flash.banner', '¡No se puede eliminar el grado porque tiene estudiantes asignados!');
            session()->flash('flash.bannerStyle', 'danger');
            return redirect()->route('admin.grados');
        }
        $grado->delete();
    }

    public function render()
    {
        return view('livewire.grado-component', [
            'grados' => Grado::where('grado', 'LIKE', "%{$this->search}%" )
            ->orWhere('nivel', 'LIKE', "%{$this->search}%")
            ->orWhere('seccion', 'LIKE', "%{$this->search}%")
            ->orWhere('jornada', 'LIKE', "%{$this->search}%")
            ->orWhere('modalidad', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage)
        ]);
    }
}
