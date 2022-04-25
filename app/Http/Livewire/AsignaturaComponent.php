<?php

namespace App\Http\Livewire;

use App\Models\Asignatura;
use App\Models\Grado;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AsignaturaComponent extends Component
{
    use WithFileUploads;

    use WithPagination;

    protected $queryString =['search' => ['except' => '']];
    public $search = '';
    public $perPage = '10';

    public $users, $grados, $asignatura, $rand=1, $editImagen;

    protected $listeners = ['delete'];

    public $createForm = [
        'nombre' => null,
        'descripcion' => null,
        'grado_id' => '',
        'maestro_id' => '',
        'imagen' => null,
    ];

    public $editForm = [
        'open' => false,
        'nombre' => null,
        'descripcion' => null,
        'grado_id' => '',
        'maestro_id' => '',
        'imagen' => null,
    ];

    public $rules = [
        'createForm.nombre' => 'required|unique:asignaturas,nombre',
        'createForm.descripcion' => 'required',
        'createForm.grado_id' => 'required',
        'createForm.maestro_id' => 'required',
        'createForm.imagen' => 'required|image|max:2048',
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->getGrados();
        $this->getUsers();
        $this->rand++;
    }

    public function getGrados()
    {
        $this->grados = Grado::all();
    }

    public function getUsers()
    {
        $this->users = User::role('Profesor')->get();
    }

    public function save()
    {
        $this->validate();

        $image = $this->createForm['imagen']->store('imagenes');

        $this->createForm['imagen'] = $image;

        Asignatura::create($this->createForm);

        $this->rand++;

        $this->reset('createForm');
    }

    public function edit(Asignatura $asignatura)
    {
        $this->reset(['editImagen']);

        $this->resetValidation();

        $this->asignatura = $asignatura;

        $this->editForm['open'] = true;

        $this->editForm['nombre'] = $asignatura->nombre;
        $this->editForm['descripcion'] = $asignatura->descripcion;
        $this->editForm['grado_id'] = $asignatura->grado_id;
        $this->editForm['maestro_id'] = $asignatura->maestro_id;
        $this->editForm['imagen'] = $asignatura->imagen;
    }

    public function update()
    {

        $rules = [
            'editForm.nombre' => 'required',
            'editForm.descripcion' => 'required',
            'editForm.grado_id' => 'required',
            'editForm.maestro_id' => 'required',
        ];

        if ($this->editImagen) {
            $rules['editImagen'] = 'required|image|max:2048';
        }

        $this->validate($rules);

        if ($this->editImagen) {
            Storage::delete($this->editForm['imagen']);
            $this->editForm['imagen'] = $this->editImagen->store('imagenes');
        }

        $this->asignatura->update([
            'nombre' => $this->editForm['nombre'],
            'descripcion' => $this->editForm['descripcion'],
            'imagen' => $this->editForm['imagen'],
            'grado_id' => $this->editForm['grado_id'],
            'maestro_id' => $this->editForm['maestro_id'],
        ]);

        $this->reset(['editForm', 'editImagen']);
    }

    public function delete(Asignatura $asignatura)
    {
        Storage::delete([$asignatura->image]);
        $asignatura->delete();
    }

    public function render()
    {
        return view('livewire.asignatura-component', [
            'asignaturas' => Asignatura::where('nombre', 'LIKE', "%{$this->search}%" )
            ->orWhere('descripcion', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage)
        ]);
    }
}
