<div>

    <x-slot name="header">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-7 h-7 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            <div class="ml-4 text-lg text-white leading-7 font-semibold">Revision de Entregas en {{ $asignatura->nombre }}
            </div>
            <x-button-enlace color="teal" class="ml-auto"
                href="{{ route('docente.administracion.edit', $asignatura->id) }}">
                Volver
            </x-button-enlace>
        </div>
    </x-slot>



    @foreach ($asignatura->temas as $tema)
        <div x-data="{ expanded: false }">
            <div
                class="mx-6 py-3 px-3 sm:px-6 lg:px-8 mt-6 rounded-t-md bg-gradient-to-r from-blueGray-500 to-white shadow-sm">
                <div class="flex">
                    <h2 class="text-xl text-white leading-tight">
                        {{ $tema->nombre }}
                    </h2>
                    <button @click="expanded = ! expanded" class="ml-auto">Desplegar Contenido</button>

                </div>
            </div>
            <div x-show="expanded" x-collapse class="mx-6 py-3 px-4 sm:px-6 lg:px-8 rounded-b-md bg-white shadow-sm">
                @foreach ($tema->tareas as $tarea)
                    <div>
                        <h2 class="text-lg text-black leading-tight">{{ $tarea->titulo }}</h2>
                        <hr>
                        @foreach ($tarea->entregas as $entrega)
                            <div
                                class="bg-blueGray-100 border-2 rounded-lg shadow-lg p-4 mt-3 mb-5 grid grid-cols-7 gap-6">

                                <div class="col-span-6 sm:col-span-1">
                                    <div class="h-10 w-10">
                                        <img class="h-10 w-10 rounded-full"
                                            src="{{ $entrega->user->profile_photo_url }}" alt="">
                                    </div>
                                    <div class="mt-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $entrega->user->name }}
                                        </div>
                                        <div class="text-sm text-gray-500">{{ $entrega->user->email }}</div>
                                    </div>
                                </div>

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

                                <div class="col-span-6 sm:col-span-1 text-right">
                                    @if ($entrega->nota)
                                        <p class="bg-gray-200 border-0 py-1 px-3 rounded text-base font-semibold mt-4 md:mt-0 mb-3">
                                            Nota: {{ $entrega->nota->nota }}</p>
                                        <a class="bg-blue-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0 cursor-pointer"
                                            wire:click="editNota('{{ $entrega->id }}')">Editar Nota
                                        </a>
                                    @else
                                        <a class="bg-orange-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0 cursor-pointer"
                                            wire:click="editNota('{{ $entrega->id }}')">Asignar Nota
                                        </a>
                                    @endif

                                </div>
                               
                            </div>
                            
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach


    <x-jet-dialog-modal wire:model="open" maxWidth="5xl">
        <x-slot name="title">
            ENTREGA | NOTA
        </x-slot>

        <x-slot name="content">

            <div class="mb-6">

                @if ($selectentrega)

                    <div class="mb-2">
                        <div class="flex items-center max-w-6xl">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="{{ $selectentrega->user->profile_photo_url }}" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $selectentrega->user->name }}</div>
                                <div class="text-sm text-gray-500">{{ $selectentrega->user->email }}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="my-3">
                        <h3 class="text-xl">{{ $selectentrega->titulo }}</h3>
                        {!! $selectentrega->contenido !!}
                    </div>
                    <hr>
                    <div class="my-3">
                        <div class="text-sm text-gray-900">
                            <ul role="list" class="border border-gray-200 bg-white rounded-md divide-y divide-gray-200">
                                @foreach ($selectentrega->archivos as $archivo)
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
                    </div>

                @endif
            </div>

            <div class="mb-4">
                <x-jet-label>
                    Nota
                </x-jet-label>
                <x-jet-input type="number" wire:model="nota" class="w-full" step="0.1" min="0" max="10" />
                <x-jet-input-error for="nota" />
            </div>
            <div class="mb-4">
            @livewire('comentario-component', ['entrega' => $entrega], key('comentarios'.$entrega->id))
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-update-button wire:click="asignarNota" wire:loading.attr="disabled" wire:target="asignarNota">
                Asignar Nota
            </x-update-button>
        </x-slot>
    </x-jet-dialog-modal>


</div>
