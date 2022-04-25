<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                <path
                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg>
            <h2 class="ml-4 font-semibold text-xl text-white leading-tight">
                Mis Asignaturas
            </h2>
        </div>

    </x-slot>

    @if ($asignaturas->isNotEmpty())

        <div class="grid grid-cols-6 gap-6 p-6">
            @foreach ($asignaturas as $asignatura)
                <div class="col-span-6 sm:col-span-3 rounded-lg bg-white shadow-sm">
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

                            <div class="mt-4 md:mt-auto mb-2 ml-auto">
                                <x-button-enlace href="{{ route('misasignaturas.show', $asignatura->id) }}"
                                    color="orange">
                                    Ingresar
                                </x-button-enlace>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    @else
        <div class="my-7 mx-6 py-7 px-6 bg-gray-700 rounded-lg text-white text-xl">
            ¡ No se encuentra matriculado en un ninguna asignatura !
        </div>
    @endif

</x-app-layout>
