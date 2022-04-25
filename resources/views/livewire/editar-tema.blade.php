<div>

    <x-slot name="header">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-7 h-7 text-white">
                <path
                    d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01">
                </path>
            </svg>
            <div class="ml-4 text-lg text-white leading-7 font-semibold">{{ $tema->nombre }}
            </div>
            <x-button-enlace color="teal" class="ml-auto"
                href="{{ route('docente.administracion.edit', $tema->asignatura->id) }}">
                Volver
            </x-button-enlace>
        </div>
    </x-slot>

    <x-jet-form-section submit="save" class="mx-6 my-7">
        <x-slot name="title">
            Agregar una Tarea
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder agregar una nueva Tarea.
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Titulo
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.titulo" class="w-full" />
                <x-jet-input-error for="createForm.titulo" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <x-jet-label>
                    Descripción
                </x-jet-label>
                {{-- <x-jet-input type="text" wire:model="createForm.descripcion" class="w-full h-20" /> --}}
                <textarea wire:model="createForm.descripcion" cols="30" rows="10" class="w-full h-20 rounded-md">                  
                </textarea>
                <x-jet-input-error for="createForm.descripcion" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Permitir Subir Archivos
                </x-jet-label>
                <x-jet-input type="radio" wire:model="createForm.file" name="type" value="1" class="my-3" />
                SI
                <x-jet-input type="radio" wire:model="createForm.file" name="type" value="2" class="my-3 ml-6" />
                NO
                <x-jet-input-error for="createForm.tipo" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Permitir Editar la Entrega
                </x-jet-label>
                <x-jet-input type="radio" wire:model="createForm.editable" name="editable" value="1"
                    class="my-3" />
                SI
                <x-jet-input type="radio" wire:model="createForm.editable" name="editable" value="2"
                    class="my-3 ml-6" />
                NO
                <x-jet-input-error for="createForm.tipo" />
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-jet-button>
                AGREGAR
            </x-jet-button>
        </x-slot>

    </x-jet-form-section>

    <div class="mx-6 py-3 px-2 sm:px-6 lg:px-4 mt-6 rounded-t-md bg-gradient-to-r from-blueGray-500 to-white shadow-sm">
        <div>
            <h2 class="text-xl text-white leading-tight">
                {{ $tema->nombre }}
            </h2>
        </div>
    </div>
    <div class="mx-6 mb-6 py-3 px-4 sm:px-6 lg:px-8 rounded-b-md bg-white shadow-sm">
        <div>
            <h2 class="mb-3 text-base text-black leading-tight">
                {{ $tema->descripcion }}
            </h2>
            <hr>
            <div class="mt-3 text-gray-700">
                @foreach ($tema->tareas as $tarea)
                    <div class="bg-blueGray-100 border-2 rounded-lg shadow-lg p-4 mb-6 grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <h3 class="text-xl">{{ $tarea->titulo }}</h3>
                            <p>{{ $tarea->descripcion }}</p>

                        </div>
                        <div class="col-span-6 sm:col-span-2">

                            @switch($tarea->file)
                                @case(1)
                                    <div class="bg-green-400 rounded-lg shadow-lg m-2 px-3 py-2 text-white">
                                        Subir Archivos Permitido.
                                    </div>
                                @break

                                @case(2)
                                    <div class="bg-red-400 rounded-lg shadow-lg m-2 px-3 py-2 text-white">
                                        No Se Permite Subir Archivos.
                                    </div>
                                @break

                                @default
                            @endswitch


                            @switch($tarea->editable)
                                @case(1)
                                    <div class="bg-green-400 rounded-lg shadow-lg m-2 px-3 py-2 text-white">
                                        La entrega se puede editar.
                                    </div>
                                @break

                                @case(2)
                                    <div class="bg-orange-400 rounded-lg shadow-lg m-2 px-3 py-2 text-white">
                                        No se puede editar la entrega.
                                    </div>
                                @break

                                @default
                            @endswitch

                        </div>
                        <div class="flex items-center justify-end col-span-6 sm:col-span-1">
                            <a class="m-2 p-2 bg-blueGray-500 text-white rounded-md cursor-pointer"
                                wire:click="edit('{{ $tarea->id }}')">Editar</a>
                            <a class="m-2 p-2 bg-red-500 text-white rounded-md cursor-pointer" 
                            wire:click="$emit('deleteTarea', '{{ $tarea->id }}')">Eliminar</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>


    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar
        </x-slot>

        <x-slot name="content">

            <div class="mb-6">
                <x-jet-label>
                    Titulo
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.titulo" class="w-full" />
                <x-jet-input-error for="editForm.titulo" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Descripción
                </x-jet-label>
                <x-jet-input type="textarea" wire:model="editForm.descripcion" class="w-full h-20" />
                
                <x-jet-input-error for="editForm.descripcion" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Permitir Subir Archivos
                </x-jet-label>
                <x-jet-input type="radio" wire:model="editForm.file" name="type" value="1" class="my-3" />
                SI
                <x-jet-input type="radio" wire:model="editForm.file" name="type" value="2" class="my-3 ml-6" />
                NO
                <x-jet-input-error for="editForm.tipo" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Permitir Editar la Entrega
                </x-jet-label>
                <x-jet-input type="radio" wire:model="editForm.editable" name="editable" value="1"
                    class="my-3" />
                SI
                <x-jet-input type="radio" wire:model="editForm.editable" name="editable" value="2"
                    class="my-3 ml-6" />
                NO
                <x-jet-input-error for="editForm.tipo" />
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
            Livewire.on('deleteTarea', tareaId => {

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
                        Livewire.emitTo('editar-tema', 'delete', tareaId)
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
