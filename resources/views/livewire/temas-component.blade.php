<div>

    <div class="mx-6 mt-6 rounded-lg bg-white shadow-sm">
        <article class="md:flex">
            <figure>
                <img class="rounded-l-lg h-48 w-full md:w-56 object-cover object-center"
                    src="{{ Storage::url($asignatura->imagen) }}" alt="">
            </figure>
            <div class="flex-1 py-4 px-6 flex flex-col">
                <div class="lg:flex justify-between">
                    <div>
                        <h1 class="text-lg font-semibold text-gray-700">{{ $asignatura->nombre }}</h1>
                        <p class="text-gray-400">{{ $asignatura->descripcion }}</p>
                    </div>
                </div>

                <div
                    class="mt-auto flex items-center justify-end px-4 py-3 -my-4 -mx-6 bg-gray-200 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <x-button-enlace color="blueGray" href="{{ route('entregas.usuarios', $asignatura) }}"
                        class="mr-3">
                        Entregas
                    </x-button-enlace>
                    <x-button-enlace color="orange" href="{{ route('matriculas.usuarios', $asignatura) }}">
                        Matriculas
                    </x-button-enlace>
                </div>
            </div>
        </article>
    </div>

    <x-jet-form-section submit="save" class="mx-6 my-7">
        <x-slot name="title">
            Agregar un nuevo Tema
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder agregar un nuevo Tema.
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Titulo
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

            <div class="col-span-6 sm:col-span-6">
                <div wire:ignore>
                    <x-jet-label>
                        Contenido
                    </x-jet-label>
                    <textarea
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        rows="4" wire:model="contenido" x-data x-init="ClassicEditor.create($refs.miEditor)
                        .then(function(editor){
                            editor.model.document.on('change:data', () => {
                                @this.set('contenido', editor.getData())
                            })
                        })
                        .catch( error => {
                            console.error( error );
                        } );" x-ref="miEditor">
                    </textarea>
                </div>
                <x-jet-input-error for="contenido" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Subir Archivos
                </x-jet-label>
                <div x-data="{ isUploading: false, progress: 0 }"
                    x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">

                    <!-- File Input -->
                    <input wire:model="file_paths" accept=".doc,.docx,.pdf,.txt" type="file"
                        class="mt-1" id="update{{ $rand }}" name="name{{ $rand }}"
                        multiple>

                    <!-- Progress Bar -->
                    <div class="mt-2" x-show="isUploading">
                        <progress class="bg-blue-400 rounded-md" max="100" x-bind:value="progress"></progress>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-button>
                AGREGAR
            </x-jet-button>
        </x-slot>

    </x-jet-form-section>

    <!-- This example requires Tailwind CSS v2.0+ -->

    @if ($asignatura->temas->isNotEmpty())
        <div class="flex flex-col my-7 mx-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gradient-to-r from-blueGray-800 to-orange-700 text-white">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        No.
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        TITULO
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        DESCRIPCIÓN
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        CANTIDAD ARCHIVOS
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($asignatura->temas as $tema)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $tema->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $tema->nombre }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $tema->descripcion }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $tema->fileGuides->count() }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                            <a class="hover:text-red-600 cursor-pointer  bg-red-400 px-3 py-1 rounded-md"
                                                wire:click="$emit('deleteTema', '{{ $tema->id }}')">Eliminar</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a class="hover:text-orange-700 cursor-pointer bg-green-300 px-3 py-1 rounded-md"
                                                href="{{ route('tema.edit', $tema) }}">Administrar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="mx-6 mt-6 p-3 rounded-lg bg-white shadow-sm">
            <p>Aun no hay tema, puedes agregar el primer tema con el formulario de arriba.</p>
        </div>

    @endif


    @push('script')
        <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
        {{-- sweetalert2 --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('deleteTema', temaId => {

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
                        Livewire.emitTo('temas-component', 'delete', temaId)
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
