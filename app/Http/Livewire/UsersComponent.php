<?php

namespace App\Http\Livewire;

use App\Models\Grado;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\This;
use Spatie\Permission\Models\Role;

class UsersComponent extends Component
{
    use WithPagination;

    protected $queryString =['search' => ['except' => '']];
    public $search = '';
    public $perPage = '10';
    public $roles, $grados, $user;
    public $open = false;
    public $estado = 1;
    public $rolesUser = [];

    protected $listeners = ['delete', 'changeStatus'];

    public $createForm = [
        'name' => null,
        'apellido' => null,
        'identificacion' => null,
        'password' => null,
        'confirm_password' => null,
        'estado' => false,
        'email' => null,
        'grado_id' => null,
        'roles' => [],
    ];

    public $editForm = [
        'name' => null,
        'apellido' => null,
        'identificacion' => null,
        'email' => null,
        'estado' => null,
        'grado_id' => null,
    ];

    public $rulesCrate = [
        'createForm.name' => 'required|string|max:255',
        'createForm.apellido' => 'required|string|max:255',
        'createForm.identificacion' => 'required|string|max:255',
        'createForm.email' => 'required|string|email|max:255',
        'createForm.estado' => 'required|boolean',
        'createForm.password' => 'required|string|min:6|confirmed',
        'createForm.grado_id' => 'required',
        'createForm.roles' => 'required',
    ];

    public $rulesEdit = [
        'editForm.name' => 'required|string|max:255',
        'editForm.apellido' => 'required|string|max:255',
        'editForm.identificacion' => 'required|string|max:255',
        'editForm.email' => 'required|string|email|max:255',
        'editForm.estado' => 'required|boolean',
        'editForm.grado_id' => 'required',
        'rolesUser' => 'required',
    
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.apellido' => 'apellido',
        'createForm.identificacion' => 'identificacion',
        'createForm.email' => 'correo electronico',
        'createForm.estado' => 'estado',
        'createForm.password' => 'contraseña',
        'createForm.confirm_password' => 'confirmar contraseña',
        'createForm.roles' => 'rol',
        'createForm.grado_id' => 'grado',

        'editForm.name' => 'nombre',
        'editForm.apellido' => 'apellido',
        'editForm.identificacion' => 'identificacion',
        'editForm.email' => 'correo electronico',
        'editForm.estado' => 'estado',
        'rolesUser' => 'rol',
        'editForm.grado_id' => 'grado',
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->getRoles();
        $this->getGrados();
    }

    public function getRoles()
    {
        $this->roles = Role::all();
    }

    public function getGrados()
    {
        $this->grados = Grado::all();
    }

    public function save()
    {
        $this->validate($this->rulesCrate);
        $this->createForm['password'] = Hash::make($this->createForm['password']);
        $user = User::create($this->createForm);
        $user->syncRoles($this->createForm['roles']);
        $this->reset('createForm');
        $this->emit('userCreated');
    }

    public function edit(User $user)
    {
        $this->open = true;
        $this->resetValidation();
        $this->user = $user;
        $this->editForm = $user->toArray();
        $this->rolesUser = $user->roles->pluck('id');
    }

    public function update()
    {
        $this->validate($this->rulesEdit);
        $this->user->update($this->editForm);
        $this->user->syncRoles($this->rolesUser);
        $this->reset('editForm', 'rolesUser', 'open');
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function changeStatus(User $user)
    {
        $user->update(['estado' => !$user->estado]);
    }

    public function render()
    {
        return view('livewire.users-component', [
        'users' => User::where('name', 'LIKE', "%{$this->search}%" )
        ->orWhere('email', 'LIKE', "%{$this->search}%")
        ->orWhere('identificacion', 'LIKE', "%{$this->search}%")
        ->orderBy('name')
        ->paginate($this->perPage)
    ]);
    }
}
