<div>
    <x-slot name="header">
        <h2 class="text-xl text-white leading-tight">
            Administración de Asignaturas
        </h2>
    </x-slot>

    @if ($misentregas->isEmpty())

        <x-jet-form-section submit="save" class="mx-6 my-7">
            <x-slot name="title">
                {{ $tarea->titulo }}
            </x-slot>

            <x-slot name="description">
                {{ $tarea->descripcion }}
            </x-slot>

            <x-slot name="form">

                <div class="col-span-6 sm:col-span-6">
                    <x-jet-label>
                        Titulo
                    </x-jet-label>
                    <x-jet-input type="text" wire:model="createForm.titulo" class="w-full" />
                    <x-jet-input-error for="createForm.titulo" />
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

                @if ($tarea->file == 1)
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
                @endif

            </x-slot>

            <x-slot name="actions">
                <x-jet-button>
                    AGREGAR
                </x-jet-button>
            </x-slot>

        </x-jet-form-section>
    @endif


    @if ($misentregas->isNotEmpty())
        <div
            class="mx-6 py-3 px-3 sm:px-6 lg:px-8 mt-6 rounded-t-md bg-gradient-to-r from-blueGray-500 to-white shadow-sm">
            <div>
                <h2 class="text-xl text-white leading-tight">
                    ENTREGA REALIZADA
                </h2>
            </div>
        </div>
        <div class="mx-6 mb-6 py-3 px-4 sm:px-6 lg:px-8 rounded-b-md bg-white shadow-sm">
            <div>
                <h2 class="mb-3 text-lg text-black font-semibold leading-tight">{{ $tarea->titulo }}</h2>
                <hr>
                <div class="my-3 text-gray-700">
                    {{ $tarea->descripcion }}
                </div>
                <hr>
                @foreach ($misentregas as $entrega)
                    <div class="bg-blueGray-100 border-2 rounded-lg shadow-lg p-4 my-3 grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-3">
                            <h3 class="text-xl">{{ $entrega->titulo }}</h3>
                            {!! $entrega->contenido !!}
                        </div>

                        <div class="text-sm text-gray-900 col-span-6 sm:col-span-2">
                            <ul role="list" class="border border-gray-200 bg-white rounded-md divide-y divide-gray-200">
                                @foreach ($entrega->archivos as $archivo)
                                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                        <div class="w-0 flex-1 flex items-center">
                                            <!-- Heroicon name: solid/paper-clip -->
                                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="ml-2 flex-1 w-0 truncate"> {{ $archivo->name }} </span>
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            <a href="{{ Storage::url($archivo->file_path) }}"
                                                class="font-medium text-indigo-600 hover:text-indigo-500"
                                                download="{{ $archivo->name }}"> Descargar </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        

                        @if ($tarea->editable == 1)
                            <div class="flex items-center justify-center col-span-6 sm:col-span-1">
                                <a class="transform transition motion-reduce:transform-none hover:scale-125 duration-300 m-2 p-2 bg-orange-300 text-white rounded-md"
                                    wire:click="edit('{{ $entrega->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                            </div>
                        @endif

                        
                    </div>
                    @livewire('comentario-component', ['entrega' => $entrega], key('comentarios'.$entrega->id))
                @endforeach
            </div>
        </div>
    @else
        <div class="mx-6 py-3 px-4 sm:px-6 lg:px-8 mt-6 rounded-md bg-gradient-to-r from-red-800 to-gray-400 shadow-sm">
            <div>
                <h2 class="text-xl text-white leading-tight">
                    NO A REALIZADO NINGUNA ENTREGA
                </h2>
            </div>
        </div>
    @endif


    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            ENTREGA
        </x-slot>

        <x-slot name="content">

            <div class="mb-6">

                <x-jet-label>
                    Titulo
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.titulo" class="w-full" />
                <x-jet-input-error for="editForm.titulo" />

            </div>

            <div class="mb-4">
                <div wire:ignore>
                    <x-jet-label value="Contenido" />
                    <textarea class="w-full rounded-md" rows="4" wire:model="editContenido" id="editorEdit">
                    </textarea>
                </div>
                <x-jet-input-error for="editContenido" />
            </div>

            @if ($entrega)
                <div class="mb-4">
                    <div class="text-sm text-gray-900">
                        <ul role="list" class="border border-gray-200 bg-white rounded-md divide-y divide-gray-200">
                            @foreach ($entrega->archivos as $archivo)
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        <!-- Heroicon name: solid/paper-clip -->
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="ml-2 flex-1 w-0 truncate"> {{ $archivo->name }} </span>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{ Storage::url($archivo->file_path) }}"
                                            class="font-medium text-indigo-600 hover:text-indigo-500"
                                            download="{{ $archivo->name }}"> Descargar </a>

                                        <a class="ml-3 font-medium text-red-600 hover:text-red-500 cursor-pointer"
                                            wire:click="deleteFile('{{ $archivo->id }}')">Eliminar</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if ($tarea->file == 1)
                <div class="mb-4">
                    <x-jet-label>
                        Subir Archivos
                    </x-jet-label>
                    <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">

                        <!-- File Input -->
                        <input wire:model="file_paths" accept=".doc,.docx,.pdf,.txt" type="file" class="mt-1"
                            id="update{{ $editRand }}" name="name{{ $editRand }}" multiple>

                        <!-- Progress Bar -->
                        <div class="mt-2" x-show="isUploading">
                            <progress class="bg-blue-400 rounded-md" max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>
                </div>
            @endif

        </x-slot>

        <x-slot name="footer">
            <x-update-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Guardar
            </x-update-button>
        </x-slot>
    </x-jet-dialog-modal>

    @push('script')
        <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
        <script>
            var app = {{ Illuminate\Support\Js::from($entrega) }}
            ClassicEditor
                .create(document.querySelector('#editorEdit'))
                .then(function(editor) {
                    editor.setData(app.contenido)
                    editor.model.document.on('change:data', () => {

                        @this.set('editContenido', editor.getData())
                    })
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush

</div>
