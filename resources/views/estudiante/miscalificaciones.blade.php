<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
              </svg>
            <h2 class="ml-4 font-semibold text-xl text-white leading-tight">
                Tus Calificaciones
            </h2>
        </div>

    </x-slot>

    <x-jet-form-section submit="save" class="mx-6 my-7">
        <x-slot name="title">
            <div class="text-lg font-extralight">
                Tus Entregas Calificadas.
            </div>       
        </x-slot>

        <x-slot name="description">
            <img src="{{ asset('img/notas.png') }}" alt="imgnotas" class="m-10 h-48">
        </x-slot>

        <x-slot name="form">

            @if ($entregas->isNotEmpty())
        
                <div class="col-span-6 sm:col-span-6">

                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-6 mx-auto">
                          <div class="flex flex-wrap -m-4">                      
                            @foreach ($entregas as $entrega)
                            <div class="p-4 lg:w-1/3">
                                <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                                  <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">Tarea | {{$entrega->tarea->titulo}}</h2>
                                  <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">{{$entrega->titulo}}</h1>
                                  <p class="leading-relaxed mb-3">{!!$entrega->contenido!!}</p>
                                  <div class="text-center mt-2 leading-none flex justify-center absolute bottom-0 left-0 w-full py-4">
                                    <span class="text-gray-400 mr-3 inline-flex items-center leading-none text-base pr-3 py-1 border-r-2 border-gray-200">
                                      <svg class="w-5 h-5 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                      </svg>
                                      {{$entrega->nota->nota}}                                     
                                    </span>
                                    <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                      <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                                      </svg>{{$entrega->tarea->tema->asignatura->maestro->name}}
                                    </span>
                                  </div>
                                </div>
                              </div>
                            @endforeach  

                          </div>
                        </div>
                      </section>
                </div>
            @else
                <p>NO TIENE CALIFICACIONES EN ESTE MOMENTO</p>
            @endif
        </x-slot>

    </x-jet-form-section>

</x-app-layout>
