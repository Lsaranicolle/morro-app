<?php

namespace App\Http\Livewire;

use App\Models\SchoolReport;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class BoletinesComponent extends Component
{
    use WithFileUploads;

    public $boletines, $boletin, $users, $rand;

    protected $listeners = ['delete'];

    public $createForm=[
        'name' => null,
        'user_id' => '',
        'file_path' => null,
    ];

    public $editForm=[
        'open' => false,
        'name' => null,
        'user_id' => null,  
        'file_path' => null, 
    ];

    public $rules=[
        'createForm.user_id' => 'required',
        'createForm.file_path' => 'required|file|max:4096',
    ];

    public function mount()
    {
        $this->getBoletines();
        $this->getEstudiantes();
        $this->rand = rand();
    }

    public function getEstudiantes()
    {
        $this->users = User::role('Estudiante')->get();
    }

    public function getBoletines()
    {
        $this->boletines = SchoolReport::all();
    }

    public function save()
    {
        $this->validate();

        $name = $this->createForm['file_path']->getClientOriginalName();
        $file = $this->createForm['file_path']->store('boletines');

        $boletin = SchoolReport::create([
            'name' => $name,
            'file_path' => $file,
            'user_id' => $this->createForm['user_id'],
        ]);

        $this->reset(['createForm']);

        $this->rand = rand();

        $this->getBoletines();
        $this->getEstudiantes();
    }

    public function delete(SchoolReport $schoolReport)
    {
        Storage::delete([$schoolReport->file_path]);
        $schoolReport->delete();
        $this->getBoletines();
        $this->getEstudiantes();
    }

    public function render()
    {
        return view('livewire.boletines-component');
    }
}
