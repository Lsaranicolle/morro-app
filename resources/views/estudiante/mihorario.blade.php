<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <h2 class="ml-4 font-semibold text-xl text-white leading-tight">
                Mi Horario
            </h2>
        </div>

    </x-slot>

    <x-jet-form-section submit="save" class="mx-6 my-7">
        <x-slot name="title">
            <div class="my-7 mx-6 py-4 px-6 bg-gray-700 rounded-lg text-white text-xl">
                Tu Horario
            </div>
        </x-slot>

        <x-slot name="description">
            <img src="{{ asset('img/calendario.png') }}" alt="imgcalendario" class="m-10 h-48">
        </x-slot>

        <x-slot name="form">
                @if ($user->grado->horario)
                    <div class="col-span-6 sm:col-span-6">
                        <h2 class="sm:text-3xl text-2xl font-medium text-gray-900 mb-4">
                            Horario | {{ $user->grado->grado }}
                        </h2>
                        <textarea class="w-full rounded-md" rows="6" id="editorhorario">
                        </textarea>
                    </div>
                @else
                    <p>NO TIENE HORARIO ESTABLECIDO</p>
                @endif
   
        </x-slot>

    </x-jet-form-section>


    @push('script')
        <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
        <script>
            var horario = {{ Illuminate\Support\Js::from($user->grado->horario) }}
            ClassicEditor
                .create(document.querySelector('#editorhorario'))
                .then(function(editor) {

                    const toolbarElement = editor.ui.view.toolbar.element;

                    affectsData = 'false';
                    editor.isReadOnly = 'true';
                    toolbarElement.style.display = 'none';
                    editor.setData(horario.content);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush

</x-app-layout>
