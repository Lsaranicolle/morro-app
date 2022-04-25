<?php

namespace App\Http\Livewire;

use App\Models\Entrega;
use App\Models\File;
use App\Models\Tarea;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use phpDocumentor\Reflection\Types\This;

class EntregaComponent extends Component
{
    use WithFileUploads;

    protected $listeners = ['render'];

    public $tarea, $contenido, $user_id, $misentregas, $rand = 1, $editRand = 2;

    public $entrega, $editContenido;

    public $file_paths = [];

    public $createForm = [
        'titulo' => null,
        'name' => null,
    ];

    public $editForm = [
        'open' => false,
        'titulo' => null,
    ];

    public $rules = [
        'createForm.titulo' => 'required',
        'file_paths.*' => 'file|max:4096',
        'contenido' => 'required',
    ];

    public function mount(Tarea $tarea)
    {       
        $this->tarea = $tarea;
        $this->misentregas = $this->tarea->entregas->where('user_id', auth()->user()->id);
        $this->rand = rand();
    }

    public function save()
    {
        $this->validate();

        $user_id = $this->user_id = auth()->user()->id;

        $entrega = Entrega::create([
            'titulo' => $this->createForm['titulo'],
            'tarea_id' => $this->tarea->id,
            'user_id' => $user_id,
            'contenido' => $this->contenido,
        ]);

        foreach ($this->file_paths as $file_path) {

            $name = $file_path->getClientOriginalName();
            $file = $file_path->store('entregas');

            File::create([
                'name' => $name,
                'file_path' => $file,
                'entrega_id' => $entrega->id,
            ]);
        }

        $this->reset(['createForm', 'contenido', 'editContenido']);

        $this->rand = rand();

        session()->flash('flash.banner', '¡Se realizo la entrega con exito!');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('entrega.create', $this->tarea);

        // $this->tarea = $this->tarea->fresh();

        // $this->misentregas = $this->tarea->entregas->where('user_id', auth()->user()->id);
    }

    public function edit(Entrega $entrega)
    {
        $this->entrega = $entrega;

        $this->editForm['open'] = true;

        $this->editForm['titulo'] = $entrega->titulo;

        $this->editContenido = $entrega->contenido;

        $this->editRand++;
    }

    public function update()
    {
        $this->validate([
            'editForm.titulo' => 'required',
            'editContenido' => 'required',
        ]);

        $user_id = $this->user_id = auth()->user()->id;

        $this->entrega->update([
            'titulo' => $this->editForm['titulo'],
            'tarea_id' => $this->tarea->id,
            'user_id' => $user_id,
            'contenido' => $this->editContenido,
        ]);

        foreach ($this->file_paths as $file_path) {

            $name = $file_path->getClientOriginalName();
            $file = $file_path->store('entregas');

            File::create([
                'name' => $name,
                'file_path' => $file,
                'entrega_id' => $this->entrega->id,
            ]);
        }

        $this->editRand++;

        $this->reset('editForm', 'editContenido', 'file_paths');

        $this->misentregas = $this->misentregas->fresh();
    }

    public function deleteFile(File $file)
    {
        Storage::delete([$file->file_path]);
        $file->delete();
        $this->misentregas = $this->misentregas->fresh();
    }

    public function render()
    {
        return view('livewire.entrega-component');
    }
}
