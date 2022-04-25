<?php

namespace App\Http\Livewire;

use App\Models\Asignatura;
use App\Models\FileGuide;
use App\Models\Tema;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class TemasComponent extends Component
{
    use WithFileUploads;

    public $asignatura, $contenido, $temas, $rand;
    
    protected $listeners = ['delete'];

    public $file_paths = [];
    
    public $createForm = [
        'nombre' => null,
        'descripcion' => null,
        'asignatura_id' => null,
    ];

    public $editForm = [
        'open' => false,
        'nombre' => null,
        'descripcion' => null,
        'contenido' => null,
        'asignatura_id' => null,
    ];

    public $rules = [
        'createForm.nombre' => 'required',
        'file_paths.*' => 'file|max:4096',
        'createForm.descripcion' => 'required',
        'contenido' => 'required',
    ];

    public function mount()
    {
        $this->rand = rand();
    }

    public function save()
    {
        $this->validate();

        $tema = Tema::create([
            'nombre' => $this->createForm['nombre'],
            'descripcion' => $this->createForm['descripcion'],
            'contenido' => $this->contenido,
            'asignatura_id' => $this->asignatura->id,
        ]);

        foreach ($this->file_paths as $file_path) {

            $name = $file_path->getClientOriginalName();
            $file = $file_path->store('guides');

            FileGuide::create([
                'name' => $name,
                'file_path' => $file,
                'tema_id' => $tema->id,
            ]);
        }

        $this->reset(['createForm', 'contenido']);

        $this->rand = rand();

        session()->flash('flash.banner', '¡Tema creado exitosamente!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('docente.administracion.edit', $this->asignatura->id);
        
    }

    public function delete(Tema $tema)
    { 
        foreach ($tema->fileGuides as $file) {
            Storage::delete($file->file_path);
            $file->delete();
        }
        $tema->delete();
        $this->asignatura = $this->asignatura->fresh();
    }

    public function render()
    {
        return view('livewire.temas-component');
    }
}
