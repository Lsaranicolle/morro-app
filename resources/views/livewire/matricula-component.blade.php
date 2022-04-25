<div>

    <x-slot name="header">
        <h2 class="text-xl text-white leading-tight">
                Matricula Rapida | Estudiantes y Asignaturas
        </h2>
    </x-slot>

    <x-jet-form-section submit="save" class="mx-6 my-7">
        <x-slot name="title">
            Registrar una Asignatura a un Estudiante
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder agregar una Asignatura a un Estudiante.
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Estudiantes
                </x-jet-label>
                <select wire:model="createForm.estudiante"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option value="" selected disabled >Seleccione un Estudiante</option>

                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} {{ $user->apellido }} | {{ $user->email }} | {{ $user->identificacion }}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="createForm.estudiante" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Asignaturas
                </x-jet-label>
                <select wire:model="createForm.asignatura"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option value="" selected disabled >Seleccione una Asignaruta</option>

                    @foreach ($asignaturas as $asignatura)
                        <option value="{{ $asignatura->id }}">{{ $asignatura->nombre }}</option>
                    @endforeach

                </select>
                <x-jet-input-error for="createForm.asignatura" />
            </div>


        </x-slot>

        <x-slot name="actions">
            <x-jet-button>
                Matricular
            </x-jet-button>
        </x-slot>


    </x-jet-form-section>

    <x-jet-action-message class="my-7 mx-6 py-3 px-6 bg-white shadow-lg rounded-lg text-xl" on="saved">
        ¡Se matriculo el Usuario con éxito!
    </x-jet-action-message>

</div>