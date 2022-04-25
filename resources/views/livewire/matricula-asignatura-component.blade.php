<div>

    <x-slot name="header">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-7 h-7 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            <div class="ml-4 text-lg text-white leading-7 font-semibold">Usuarios Matriculados en {{ $asignatura->nombre }}
            </div>
            <x-button-enlace color="teal" class="ml-auto"
                href="{{ route('docente.administracion.edit', $asignatura->id) }}">
                Volver
            </x-button-enlace>
        </div>
    </x-slot>
 
    <div class="mx-6 mt-6 rounded-lg bg-white shadow-sm">
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
               
                <div class="mt-auto flex items-center justify-end px-4 py-3 -my-4 -mx-6 bg-gray-200 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <x-jet-action-message class="mr-12" on="matriculado">
                        ¡Se matriculo el Usuario con éxito!
                    </x-jet-action-message>
                    <x-jet-action-message class="mr-12" on="eliminado">
                        ¡Se elimino el Usuario de la Asignatura con éxito!
                    </x-jet-action-message> 
                    Usuarios Matriculados: {{$asignatura->users->count()}}       
                </div>
            </div>
        </article>
    </div>

    <div class="flex flex-col my-7 mx-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <div class="flex bg-gradient-to-r from-blueGray-800 to-gray-500 px-3 py-2 border-gray-200 sm:px-6">
                        <input wire:model="search"
                            class="form-input rounded-md shadow-sm mt-1 block w-full transition duration-150 ease-in-out"
                            type="text" placeholder="Buscar...">
                        <div>
                            <select wire:model="perPage"
                                class="form-input rounded-md shadow-sm mt-1 block ml-6 text-gray-500 transition duration-150 ease-in-out"
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
                        <thead class="bg-gradient-to-r from-blueGray-800 to-gray-500 text-white">
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
                                    APELLIDO
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    IDENTIFICACIÓN
                                </th>                           
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    CORREO
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    ESTADO
                                </th>
                                <th>
                                   
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
                                        {{ $user->apellido }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $user->identificacion }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if ($user->asignaturas()->find($asignatura->id))
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-green-100 text-green-800">
                                            MATRICULADO
                                        </span>
                                        @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-red-100 text-red-800">
                                            NO MATRICULADO
                                        </span>
                                        @endif
                                    </td>
                                  
                                       @if ($user->asignaturas()->find($asignatura->id))

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">
                                                <x-button
                                                color="red"
                                                wire:loading.attr="disabled"
                                                wire:target="desmatricular({{ $user->id }})"
                                                wire:click="desmatricular({{ $user->id }})">ELMINAR</x-button>
                                            </td>
                                       @else
                                            
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">                                              
                                                <x-button
                                                color="green"
                                                wire:loading.attr="disabled"
                                                wire:target="matricular({{ $user->id }})"
                                                wire:click="matricular({{ $user->id }})">MATRICULAR</x-button>
                                            </td>
                                       @endif
                                
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
      
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            {{ $users->links() }}
                        </div>
                </div>
            </div>
        </div>
    </div>

</div>
