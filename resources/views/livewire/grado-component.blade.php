<div>

    <x-slot name="header">
        <h2 class="text-xl text-white leading-tight">
            Administración de Grados
        </h2>
    </x-slot>

    @if (session('status'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            {{ session('status') }}
        </div>
        
    @endif

    <x-jet-form-section submit="save" class="mx-6 my-7">
        <x-slot name="title">
            Agregar un Grado
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder agregar un nuevo Grado.
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                   Curso
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.grado" class="w-full" />
                <x-jet-input-error for="createForm.grado" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label value="Seleccione un nivel" />
                <select wire:model="createForm.nivel"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value=null selected disabled >Seleccione un Nivel</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                </select>
                <x-jet-input-error for="createForm.nivel" />
            </div>


            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Sección
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.seccion" class="w-full" />
                <x-jet-input-error for="createForm.seccion" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Jornada
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.jornada" class="w-full" />
                <x-jet-input-error for="createForm.jornada" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Modalidad
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.modalidad" class="w-full" />
                <x-jet-input-error for="createForm.modalidad" />
            </div>



        </x-slot>
        <x-jet-action-message class="mr-3 px-4 py-2 bg-green-500 text-white rounded-md" on="gradoCreated">
            Grado creado con éxito.
        </x-jet-action-message>
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
                            placeholder="Buscar un Curso - Nombre, Nivel, Sección, Jornada, Modalidad" />
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
                                    CURSO
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    NIVEL
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    SECCION
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    JORNADA
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    MODALIDAD
                                </th>

                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($grados as $grado)

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $grado->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $grado->grado }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $grado->nivel }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $grado->seccion }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $grado->jornada }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $grado->modalidad }}
                                    </td>


                                    <td class="px-6 py-4 text-center text-sm font-medium">
                                        <a class=" hover:bg-teal-600 cursor-pointer py-2 px-3 bg-teal-500 rounded-md text-white"
                                            wire:click="edit('{{ $grado->id }}')">Editar</a>
                                    </td>

                                    <td class="px-6 py-4 text-center text-sm">
                                        <a class=" hover:bg-orange-600 cursor-pointer py-2 px-3 bg-orange-500 rounded-md text-white"
                                            wire:click="$emit('deleteGrado', '{{ $grado->id }}')">Eliminar</a>
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                    <div class="bg-gray-100 px-4 py-3 border-t border-gray-200 sm:px-6">
                        {{ $grados->links() }}
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
                <x-jet-label>
                   Grado
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.grado" class="w-full" />
                <x-jet-input-error for="editForm.grado" />
            </div>

            <div class="mb-6">
                <x-jet-label value="Seleccione un nivel" />
                <select wire:model="editForm.nivel"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value=null selected disabled >Seleccione un Nivel</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                </select>
                <x-jet-input-error for="editForm.nivel" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Sección
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.seccion" class="w-full" />
                <x-jet-input-error for="editForm.seccion" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Jornada
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.jornada" class="w-full" />
                <x-jet-input-error for="editForm.jornada" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Modalidad
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.modalidad" class="w-full" />
                <x-jet-input-error for="editForm.modalidad" />
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
            Livewire.on('deleteGrado', gradoId => {

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
                        Livewire.emitTo('grado-component', 'delete', gradoId)
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