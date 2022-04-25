<div class="my-6">
    <div
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 bg-white shadow-lg rounded-lg border-4 border-gray-400 border-opacity-30">
        <p class="text-base text-green-800 font-semibold tracking-wide uppercase text-center mb-4">COMENTARIOS</p>
        @foreach ($entrega->comentarios()->paginate(6) as $comment)
            <div>
                <div class="header flex justify-between mb-2 text-sm text-gray-500">
                    <div class="whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-xl object-cover"
                                    src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $comment->user->name }}
                                    {{ $comment->user->apellido }}</div>
                                <div class="text-sm text-gray-500">{{ $comment->user->email }}</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        {{ $comment->created_at }}
                    </div>
                </div>
                <div class="mt-2">
                    <p class="text-base text-gray-600 text-justify break-words">{{ $comment->contenido }}</p>
                </div>
            </div>
            <x-section-border class="mt-8 mb-4"></x-section-border>
        @endforeach
        <div class="mb-4">
            {{ $entrega->comentarios()->paginate(6)->links() }}
        </div>
        <x-jet-action-section>
            <x-slot name="title">
                Añadir comentario
            </x-slot>
            <x-slot name="description">
                <p class="text-base text-gray-600 text-justify">
                    Añade un comentario a esta publicación.
                </p>
                <x-jet-validation-errors class="my-4" />

            </x-slot>
            <x-slot name="content">
                <div class="mt-2">
                    <x-jet-label for="comment" value="Comentario" />
                    <div>
                        <div x-data="{
                            content: '', 
                                get characterCount() {
                                    return this.content.length
                                }
                            }">
                            <textarea x-ref="content" x-model="content" class="block mt-1 w-full h-24 rounded-md" wire:model.defer="comment" maxlength="300"></textarea>
                            <p x-ref="characterCount">
                                <span x-text="characterCount"></span> / 300
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <x-button wire:click="storeComment" wire:loading.attr="disabled">
                        Añadir comentario
                    </x-button>
                </div>
            </x-slot>
        </x-jet-action-section>
    </div>
</div>
