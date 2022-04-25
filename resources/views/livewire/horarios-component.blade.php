<div>

    <x-slot name="header">
        <h2 class="text-xl text-white leading-tight">
            Administración de Horarios
        </h2>
    </x-slot>

    <x-jet-form-section submit="save" class="mx-6 my-7">
        <x-slot name="title">
            Agregar un Horario
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder agregar un nuevo Horario.

            <div class="hidden">
                {{$content}}
            </div>
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Grado
                </x-jet-label>
                <select wire:model="grado_id"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option value="" selected disabled>Seleccione un Grado</option>

                    @foreach ($grados as $grado)
                        <option value="{{ $grado->id }}">{{ $grado->grado }} | {{ $grado->nivel }}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="grado_id" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <div wire:ignore>
                    <x-jet-label>
                        Horario
                    </x-jet-label>
                    <textarea class="w-full rounded-md" rows="6" wire:model="content" id="mieditor">
                    </textarea> 
                </div>
                <x-jet-input-error for="content" />
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
                        <thead class="bg-gradient-to-r from-blueGray-800 to-orange-700 text-white">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    No.
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    GRADO
                                </th>

                                <th scope="col"
                                    class=" py-3 text-center text-xs font-medium uppercase tracking-wider">
                                    ELIMINAR
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($horarios as $horario)

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $horario->id }}
                                    </td>
                                    @if ($horario->grado)
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $horario->grado->grado }} | {{ $horario->grado->nivel }}
                                        </td>
                                    @else
                                    <td></td>
                                    @endif 

                                    <td class=" py-4 whitespace-nowrap text-center text-sm">
                                        <a class="pl-2 hover:text-red-600 cursor-pointer text-md"
                                            wire:click="$emit('deleteHorario', '{{ $horario->id }}')">Eliminar</a>
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
        <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
        <script>
            var setContenido = {{ Illuminate\Support\Js::from($setContenido) }}
            ClassicEditor
                .create(document.querySelector('#mieditor'))
                .then(function(editor) {                    
                    editor.setData(setContenido)
                    editor.model.document.on('change:data', () => {       
                        @this.set('content', editor.getData())
                    })
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
        <script>
            Livewire.on('deleteHorario', horarioId => {
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
                        Livewire.emitTo('horarios-component', 'delete', horarioId)
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
