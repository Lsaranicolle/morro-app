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

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                   Nombre
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.name" class="w-full" />
                <x-jet-input-error for="createForm.name" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Correo
                </x-jet-label>
                <x-jet-input type="email" wire:model="createForm.email" class="w-full" />
                <x-jet-input-error for="createForm.email" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Contraseña
                </x-jet-label>
                <x-jet-input type="password" wire:model="createForm.password" class="w-full" />
                <x-jet-input-error for="createForm.password" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Rol
                </x-jet-label>
                <select wire:model="createForm.role"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option value="" selected disabled >Seleccione un Rol</option>

                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="createForm.role" />
            </div>


        </x-slot>

        <x-slot name="actions">
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
                                    ROL
                                </th>


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
                                        {{ $user->roles()->pluck('name')->join('')}}
                                    </td> 
                                    
                                </tr>

                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>