<div>
    
    <x-slot name="header">
        <h2 class="text-xl text-white leading-tight">
            Administración de Boletines
        </h2>
    </x-slot>

    <x-jet-form-section submit="save" class="mx-6 my-7">
        <x-slot name="title">
            Agregar una Boletín
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder agregar un nuevo Boletín.
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Usuario
                </x-jet-label>
                <select wire:model="createForm.user_id"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option value="" selected disabled>Seleccione un Estudiante</option>

                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} | {{ $user->apellido }} | {{ $user->identificacion }} | {{ $user->email }}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="createForm.user_id" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Subir Archivo
                </x-jet-label>

                <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">

                    <!-- File Input -->
                    <input wire:model="createForm.file_path" accept=".doc,.docx,.pdf,.txt" type="file" class="mt-1"
                        id="update{{ $rand }}" name="name{{ $rand }}">

                    <!-- Progress Bar -->
                    <div class="mt-2" x-show="isUploading">
                        <progress class="bg-teal-800 rounded-md" max="100" x-bind:value="progress"></progress>
                    </div>
                </div>

                <x-jet-input-error for="createForm.file_path" />

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
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-blueGray-800 to-teal-700 text-white">
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
                                    USUARIO
                                </th>                              
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    GRADO
                                </th>

                                <th scope="col"></th>
                            

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($boletines as $boletin)

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $boletin->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $boletin->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                          <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ $boletin->user->profile_photo_url }}" alt="">
                                          </div>
                                          <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $boletin->user->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $boletin->user->email }}</div>
                                          </div>
                                        </div>
                                    </td>

                                    @if ($boletin->user->grado)
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $boletin->user->grado->grado}}
                                        </td>
                                    @else
                                    <td></td>
                                    @endif  

                                    <td class="whitespace-nowrap text-center text-sm">
                                        <a class="text-red-600 cursor-pointer" 
                                            wire:click="$emit('deleteBoletin', '{{ $boletin->id }}')">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </a>
                                    </td>
                                    
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        {{-- sweetalert2 --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('deleteBoletin', boletinId => {
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
                        Livewire.emitTo('boletines-component', 'delete', boletinId)
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
