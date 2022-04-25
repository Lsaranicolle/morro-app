<div>

    <x-slot name="header">
        <h2 class="text-xl text-white leading-tight">
            Administración de Asignaturas
        </h2>
    </x-slot>

    <x-jet-form-section submit="save" class="mx-6 my-7">
        <x-slot name="title">
            Agregar una Asignatura
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder agregar una nueva Asignatura.
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Nombre
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.nombre" class="w-full" />
                <x-jet-input-error for="createForm.nombre" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Descripción
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.descripcion" class="w-full" />
                <x-jet-input-error for="createForm.descripcion" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Curso
                </x-jet-label>
                <select wire:model="createForm.grado_id"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option value="" selected disabled>Seleccione un Curso</option>

                    @foreach ($grados as $grado)
                        <option value="{{ $grado->id }}">{{ $grado->grado }} {{$grado->nivel}}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="createForm.grado_id" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Maestro
                </x-jet-label>
                <select wire:model="createForm.maestro_id"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option value="" selected disabled>Seleccione un Profesor</option>

                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="createForm.maestro_id" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Imagen
                </x-jet-label>


                <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">

                    <!-- File Input -->
                    <input wire:model="createForm.imagen" accept="image/*" type="file" class="mt-1"
                        id="update{{ $rand }}" name="name{{ $rand }}">

                    <!-- Progress Bar -->
                    <div class="mt-2" x-show="isUploading">
                        <progress class="bg-teal-800 rounded-md" max="100" x-bind:value="progress"></progress>
                    </div>
                </div>

                <x-jet-input-error for="createForm.imagen" />

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
                    <div class="flex bg-gradient-to-r from-blueGray-800 to-orange-700 px-2 py-4 sm:px-5">
                        <x-jet-input type="text" wire:model="search" class="placeholder:text-slate-400 bg-white border-2 border-white w-full"
                            placeholder="Buscar una Asignatura - Nombre, Descripción" />
                        <div>
                            <select wire:model="perPage"
                                class="ml-6 bg-orange-800 border-2 border-white focus:border-green-300 text-white focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm"
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
                        <thead class="bg-gradient-to-r from-blueGray-800 to-orange-700 text-white">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    No.
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    NOMBRE
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    DESCRIPCIÓN
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    CURSO
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    MAESTRO
                                </th>

                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($asignaturas as $asignatura)

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $asignatura->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                    src="{{ Storage::url($asignatura->imagen) }}"
                                                    alt="{{ $asignatura->nombre }}">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $asignatura->nombre }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $asignatura->descripcion }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $asignatura->grado->grado }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $asignatura->maestro->name }}
                                    </td>


                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                            wire:click="edit('{{ $asignatura->nombre }}')">Editar</a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                        <a class="pl-2 hover:text-red-600 cursor-pointer text-md"
                                            wire:click="$emit('deleteAsignatura', '{{ $asignatura->nombre }}')">Eliminar</a>
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                    <div class="bg-gray-100 px-4 py-3 border-t border-gray-200 sm:px-6">
                        {{ $asignaturas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar
        </x-slot>

        <x-slot name="content">

            <div class="mb-6">
                @if ($editImagen)
                    <img class="w-full h-64 object-cover object-center rounded-lg"
                        src="{{ $editImagen->temporaryUrl() }}" alt="">
                @else
                    <img class="w-full h-64 object-cover object-center rounded-lg"
                        src="{{ Storage::url($editForm['imagen']) }}" alt="">
                @endif
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Nombre
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.nombre" class="w-full" />
                <x-jet-input-error for="editForm.nombre" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Descripción
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.descripcion" class="w-full" />
                <x-jet-input-error for="editForm.descripcion" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Grado
                </x-jet-label>
                <select wire:model="editForm.grado_id"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option value="" selected disabled>Seleccione un Grado</option>

                    @foreach ($grados as $grado)
                        <option value="{{ $grado->id }}">{{ $grado->grado }}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="editForm.grado_id" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Maestro
                </x-jet-label>
                <select wire:model="editForm.maestro_id"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option value="" selected disabled>Seleccione un Profesor</option>

                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="editForm.maestro_id" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Imagen
                </x-jet-label>

                <input wire:model="editImagen" accept="image/*" type="file" class="mt-1" name=""
                    id="{{ $rand }}">
                <x-jet-input-error for="editImagen" />
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-update-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-update-button>
        </x-slot>
    </x-jet-dialog-modal>

    @push('script')
        {{-- sweetalert2 --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('deleteAsignatura', asignaturaNombre => {

                Swal.fire({
                    title: '¿Estas Seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('asignatura-component', 'delete', asignaturaNombre)
                        Swal.fire(
                            '¡Eliminado!',
                            'Se ha eliminado correctamente.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush

</div>
