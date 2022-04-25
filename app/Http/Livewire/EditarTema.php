<?php

namespace App\Http\Livewire;

use App\Models\Tarea;
use App\Models\Tema;
use Livewire\Component;

class EditarTema extends Component
{
    public $tema, $tarea;

    protected $listeners = ['delete'];

    public $createForm = [
        'titulo' => null,
        'descripcion' => null,
        'file' => null,
        'editable' => null,
        'tema_id' => null,
    ];

    public $editForm = [
        'open' => false,
        'titulo' => null,
        'descripcion' => null,
        'file' => null,
        'editable' => null,
        'tema_id' => null,
    ];

    public $rules = [
        'createForm.titulo' => 'required',
        'createForm.descripcion' => 'required',
        'createForm.file' => 'required',
        'createForm.editable' => 'required',
    ];

    protected $validationAttributes = [
        'createForm.titulo' => 'titulo',
        'createForm.descripcion' => 'descripción',
        'createForm.file' => 'archivo',
        'createForm.editable' => 'editable',
    ];

    public function mount(Tema $tema)
    {
        $this->tema = $tema;
    }

    public function save()
    {
        $this->validate();

        Tarea::create([
            'titulo' => $this->createForm['titulo'],
            'descripcion' => $this->createForm['descripcion'],
            'file' => $this->createForm['file'],
            'editable' => $this->createForm['editable'],
            'tema_id' => $this->tema->id,
        ]);

        $this->reset('createForm');
        
        $this->tema = $this->tema->fresh();      
    }

    public function edit(Tarea $tarea)
    {
        $this->resetValidation();

        $this->tarea = $tarea;

        $this->editForm['open'] = true;

        $this->editForm['titulo'] = $tarea->titulo;
        $this->editForm['descripcion'] = $tarea->descripcion;
        $this->editForm['file'] = $tarea->file;
        $this->editForm['editable'] = $tarea->editable;
        $this->editForm['tema_id'] = $tarea->tema_id;
    }

    public function update()
    {
        $this->validate([
            'editForm.titulo' => 'required',
            'editForm.descripcion' => 'required',
            'editForm.file' => 'required',
            'editForm.editable' => 'required',
            'editForm.tema_id' => 'required',
           ]); 
    
           $this->tarea->update($this->editForm);
           
           $this->reset('editForm');
           $this->tema = $this->tema->fresh(); 
    }

    public function delete(Tarea $tarea)
    {
        $tarea->delete();
        $this->tema = $this->tema->fresh(); 
    }

    public function render()
    {
        return view('livewire.editar-tema');
    }
}
