<div>

    <x-slot name="header">
        <h2 class="text-xl text-white leading-tight">
            Administración de Usuarios
        </h2>
    </x-slot>

    <x-jet-form-section submit="save" class="mx-6 my-7">
        <x-slot name="title">
            Agregar un nuevo Usuario
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder agregar una nueva Asignatura.
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                   Nombre
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.name" class="w-full" />
                <x-jet-input-error for="createForm.name" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                   Apellido
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.apellido" class="w-full" />
                <x-jet-input-error for="createForm.apellido" />
            </div>
            
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Identificación
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.identificacion" class="w-full" />
                <x-jet-input-error for="createForm.identificacion" />
            </div>
            
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Correo
                </x-jet-label>
                <x-jet-input type="email" wire:model="createForm.email" class="w-full" />
                <x-jet-input-error for="createForm.email" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Contraseña
                </x-jet-label>
                <x-jet-input type="password" wire:model="createForm.password" class="w-full" />
                <x-jet-input-error for="createForm.password" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Confirmar Contraseña
                </x-jet-label>
                <x-jet-input type="password" wire:model="createForm.password_confirmation" class="w-full" />
                <x-jet-input-error for="createForm.password_confirmation" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Curso | (Opcional)
                </x-jet-label>
                <select wire:model="createForm.grado_id"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option value=null selected disabled >Seleccione un Curso</option>

                    @foreach ($grados as $grado)
                        <option value="{{ $grado->id }}">{{ $grado->grado }} | {{ $grado->nivel }} | {{ $grado->seccion }} | {{ $grado->jornada }}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="createForm.grado_id" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Estado
                </x-jet-label>
                <div class="flex items-center justify-center h-10 my-auto border border-transparent rounded-md" x-data="{ toggle: '0' }">
                    <div class="relative rounded-full w-12 h-6 transition duration-200 ease-linear"
                         :class="[toggle === '1' ? 'bg-green-400' : 'bg-gray-400']">
                      <label for="toggle" 
                             class="absolute left-0 bg-white border-2 mb-2 w-6 h-6 rounded-full transition transform duration-100 ease-linear cursor-pointer"
                             :class="[toggle === '1' ? 'translate-x-full border-green-400' : 'translate-x-0 border-gray-400']"></label>
                      <input type="checkbox" id="toggle" wire:model="createForm.estado" value="1"
                             class="hidden"
                             @click="toggle === '0' ? toggle = '1' : toggle = '0'">

                    </div>
                    <div class="ml-3 text-sm text-gray-600" :class="[toggle === '1' ? 'hidden' : '']">
                      <span class="font-medium">Inactivo</span>
                    </div>
                    <div class="ml-3 text-sm text-gray-600" :class="[toggle === '1' ? '' : 'hidden']">
                      <span class="font-medium">Activo</span>
                    </div>
                  </div>
                <x-jet-input-error for="createForm.estado" />
            </div>
           
            <div class="col-span-6 sm:col-span-6">
                <hr class="my-2">
                <x-jet-label class="mb-2">
                    Rol
                </x-jet-label>             
                <div class="grid grid-cols-4">
                    @foreach ($roles as $role)
                        <div class="flex items-center">
                            <x-jet-checkbox wire:model.defer="createForm.roles" name="{{$role->name}}" value="{{ $role->id }}" />
                            <x-jet-label class="ml-2" value="{{$role->name}}" />
                        </div>
                    @endforeach
                </div>
                <x-jet-input-error for="createForm.roles" />
                
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3 px-4 py-2 bg-green-500 text-white rounded-md" on="userCreated">
                Usuario creado con éxito.
            </x-jet-action-message>
            <x-jet-button>
                AGREGAR
            </x-jet-button>
        </x-slot>


    </x-jet-form-section>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col my-7 mx-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <div class="flex bg-gradient-to-r from-blueGray-800 to-teal-700 px-2 py-4 sm:px-5">
                        <x-jet-input type="text" wire:model="search" class="placeholder:text-slate-400 bg-white border-2 border-white w-full"
                            placeholder="Buscar un Usuario - Nombre, Correo electronico, Identificación" />
                        <div>
                            <select wire:model="perPage"
                                class="ml-6 bg-teal-800 border-2 border-white focus:border-green-300 text-white focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                class="outline-none">
                                <option value="2">2 por página</option>
                                <option value="5">5 por página</option>
                                <option value="10">10 por página</option>
                                <option value="15">15 por página</option>
                                <option value="25">25 por página</option>
                                <option value="50">50 por página</option>
                                <option value="100">100 por página</option>
                            </select>
                        </div>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-blueGray-800 to-teal-700 text-white">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    No.
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    FOTO
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    NOMBRE
                                </th>                              
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    CORREO
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    IDENTIFICACIÓN
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    CURSO
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    NIVEL
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    ROL
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    ESTADO
                                </th>
                                
                                <th></th><th></th><th></th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($users as $user)

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $user->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                          <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}" alt="">
                                          </div>
                                        </div>
                                      </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $user->name }}   
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $user->identificacion }}
                                    </td>

                                    @if ($user->grado)
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $user->grado->grado}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $user->grado->nivel}}
                                        </td>
                                    @else
                                    <td></td>
                                    <td></td>
                                    @endif  

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $user->roles()->pluck('name')->join(' | ')}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if ($user->estado == true)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-green-100 text-green-800">
                                                ACTIVO
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-red-100 text-red-800">
                                                INACTIVO
                                            </span>
                                        @endif
                                    </td>

                                    <td class="pr-3 whitespace-nowrap text-center text-sm">
                                        <a class="text-blueGray-600 cursor-pointer"
                                            title="Editar Usuario"
                                            wire:click="edit('{{ $user->id }}')">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                    </td>

                                    <td class="pr-3 whitespace-nowrap text-center text-sm">
                                        <a class="text-red-600 cursor-pointer"
                                            title="Eliminar Usuario"
                                            wire:click="$emit('deleteUser', '{{ $user->id }}')">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6"></path>
                                            </svg>
                                        </a>
                                    </td>

                                    <td class="pr-3 whitespace-nowrap text-center text-sm">
                                        <a class="text-orange-600 cursor-pointer"
                                            title="Cambiar Estado de Usuario"
                                            wire:click="$emit('statusUser', '{{ $user->id }}')">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                    <div class="bg-gray-100 px-4 py-3 border-t border-gray-200 sm:px-6">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-edit-modal wire:model="open" maxWidth="5xl">
        <x-slot name="title">
            Editar
        </x-slot>

        <x-slot name="content">

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Nombre
                 </x-jet-label>
                 <x-jet-input type="text" wire:model="editForm.name" class="w-full" />
                 <x-jet-input-error for="editForm.name" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Apellido
                 </x-jet-label>
                 <x-jet-input type="text" wire:model="editForm.apellido" class="w-full" />
                 <x-jet-input-error for="editForm.apellido" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Identificación
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.identificacion" class="w-full" />
                <x-jet-input-error for="editForm.identificacion" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Correo
                </x-jet-label>
                <x-jet-input type="email" wire:model="editForm.email" class="w-full" />
                <x-jet-input-error for="editForm.email" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Grado | (Opcional)
                </x-jet-label>
                <select wire:model="editForm.grado_id"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option value=null selected disabled >Seleccione un Grado</option>
                    @foreach ($grados as $grado)
                        <option value="{{ $grado->id }}">{{ $grado->grado }} | {{ $grado->nivel }} | {{ $grado->seccion }} | {{ $grado->jornada }}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="editForm.grado_id" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Estado
                </x-jet-label>
                <div class="flex items-center justify-center h-10 my-auto border border-transparent rounded-md" x-data="{ edit_toggle: '1' }">
                    <div class="relative rounded-full w-12 h-6 transition duration-200 ease-linear"
                         :class="[edit_toggle === '1' ? 'bg-green-400' : 'bg-gray-400']">
                      <label for="edit_toggle" 
                             class="absolute left-0 bg-white border-2 mb-2 w-6 h-6 rounded-full transition transform duration-100 ease-linear cursor-pointer"
                             :class="[edit_toggle === '1' ? 'translate-x-full border-green-400' : 'translate-x-0 border-gray-400']"></label>
                      <input type="checkbox" id="edit_toggle" wire:model="editForm.estado" value="1"
                             class="hidden"
                             @click="edit_toggle === '0' ? edit_toggle = '1' : edit_toggle = '0'">

                    </div>
                    <div class="ml-3 text-sm text-gray-600" :class="[edit_toggle === '1' ? 'hidden' : '']">
                      <span class="font-medium">Inactivo</span>
                    </div>
                    <div class="ml-3 text-sm text-gray-600" :class="[edit_toggle === '1' ? '' : 'hidden']">
                      <span class="font-medium">Activo</span>
                    </div>
                  </div>
                <x-jet-input-error for="editForm.estado" />
            </div>
            
            <div class="col-span-6 sm:col-span-6">
                <hr class="my-2">
                <x-jet-label class="mb-2">
                    Rol
                </x-jet-label>             
                <div class="grid grid-cols-4">
                    @foreach ($roles as $role)
                        <x-jet-label>
                            <x-jet-checkbox wire:model.defer="rolesUser" name="{{$role->name}}" value="{{ $role->id }}"/>
                                {{ $role->name }}
                        </x-jet-label>                      
                    @endforeach
                </div>
                <x-jet-input-error for="rolesUser" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-update-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-update-button>
        </x-slot>
    </x-edit-modal>

    @push('script')
    {{-- sweetalert2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('deleteUser', userId => {
            Swal.fire({
                title: '¿Estas Seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, Eliminar Usuario!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('users-component', 'delete', userId)
                    Swal.fire(
                        '¡Usuario Eliminado!',
                        'Se ha eliminado correctamente.',
                        'success'
                    )
                }
            })
        })

        Livewire.on('statusUser', userId => {
            Swal.fire({
                title: '¿Estas Seguro?',
                text: "¡Cambiaras el estado del usuario!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, Cambiar estado de Usuario!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('users-component', 'changeStatus', userId)
                    Swal.fire(
                        '¡Estado Cambiado!',
                        'Se ha cambiado correctamente.',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush

</div>