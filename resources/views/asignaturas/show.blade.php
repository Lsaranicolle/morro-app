<x-app-layout>

    <div class="mx-6 mt-6 rounded-lg bg-white shadow-sm border-2 border-green-500">
        <article class="md:flex">
            <figure>
                <img class="rounded-l-lg h-36 w-full md:w-56 object-cover object-center"
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
                    class="mt-auto flex items-center justify-end px-4 py-3 -my-4 -mx-6 bg-gray-100 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <x-button-enlace color="green" href="{{ route('misasignaturas.index') }}">
                        Volver
                    </x-button-enlace>
                </div>
            </div>
        </article>
    </div>

    @foreach ($asignatura->temas as $tema)
        <div
            class="mx-6 py-3 px-4 sm:px-6 lg:px-8 mt-6 rounded-t-md bg-gradient-to-r from-blueGray-500 to-white shadow-sm">
            <div>
                <h2 class="text-xl text-white leading-tight">
                    {{ $tema->nombre }}
                </h2>
            </div>
        </div>
        <div class="mx-6 py-3 px-4 sm:px-64 lg:px-4 rounded-b-md bg-white shadow-sm">
            <div>
                <h2 class="mb-3 pr-4 py-3 text-base text-black leading-tight">
                    {{ $tema->descripcion }}
                </h2>
                <hr>
                <div class="my-3 pr-4 py-3 text-gray-700">
                    {!! $tema->contenido !!}
                </div>
                <hr>
                <div class="my-3 text-gray-700">
                    @foreach ($tema->fileGuides as $file)
                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                            <div class="w-0 flex-1 flex items-center">
                                <!-- Heroicon name: solid/paper-clip -->
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2 flex-1 w-0 truncate"> {{ $file->name }} </span>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <a href="{{ Storage::url($file->file_path) }}"
                                    class="font-medium text-indigo-600 hover:text-indigo-500"
                                    download="{{ $file->name }}"> Descargar </a>
                            </div>
                        </li>
                    @endforeach
                </div>

                <hr>




                <div class="mt-3 text-gray-700">
                    @foreach ($tema->tareas as $tarea)
                        <div class="bg-blueGray-100 border-2 rounded-lg shadow-lg p-4 mb-3 grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <h3 class="text-xl">{{ $tarea->titulo }}</h3>
                                <p>{{ $tarea->descripcion }}</p>

                            </div>
                            <div class="col-span-6 sm:col-span-2">

                                @switch($tarea->file)
                                    @case(1)
                                        <div class="bg-green-500 rounded-lg shadow-lg m-2 py-1 px-3 text-white">
                                            Subir Archivos Permitido.
                                        </div>
                                    @break

                                    @case(2)
                                        <div class="bg-red-500 rounded-lg shadow-lg m-2 py-1 px-3 text-white">
                                            No Se Permite Subir Archivos.
                                        </div>
                                    @break

                                    @default
                                @endswitch


                                @switch($tarea->editable)
                                    @case(1)
                                        <div class="bg-green-500 rounded-lg shadow-lg m-2 py-1 px-3 text-white">
                                            La entrega se puede editar.
                                        </div>
                                    @break

                                    @case(2)
                                        <div class="bg-red-500 rounded-lg shadow-lg m-2 py-1 px-3 text-white">
                                            No se puede editar la entrega.
                                        </div>
                                    @break

                                    @default
                                @endswitch

                            </div>

                            <div class="flex items-center justify-center col-span-6 sm:col-span-1">
                                <a class="transform transition motion-reduce:transform-none hover:scale-125 duration-300 m-2 p-2 bg-orange-300 text-white rounded-md"
                                    href="{{ route('entrega.create', $tarea) }}">
                                    Realizar Entrega
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    @endforeach
</x-app-layout>
