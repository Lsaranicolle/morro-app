<header x-data="{ open: false }" class="flex-shrink-0 bg-gradient-to-r from-teal-700 to-blueGray-800 shadow-md sticky top-0">
    <!-- This example requires Tailwind CSS v2.0+ -->

    <div class="mx-4 px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">

            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->

                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Abrir Menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">

                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="block h-6 w-6"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden h-6 w-6"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </button>

            </div>

            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">

                {{-- <div class="flex-shrink-0 flex items-center">

                    <a href="/">
                        <x-jet-application-mark class="block lg:hidden h-8 w-auto" />
                    </a>
                    <a href="/">
                        <x-jet-application-mark class="hidden lg:block h-8 w-auto" />
                    </a>

                </div> --}}

                <div class="hidden sm:block ">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                        <x-jet-nav-link href="{{route('/')}}" :active="request()->routeIs('/')">Inicio</x-jet-nav-link>

                        <x-jet-nav-link href="{{route('institucion')}}" :active="request()->routeIs('institucion')">Institución</x-jet-nav-link>

                        <x-jet-nav-link href="{{route('blog')}}" :active="request()->routeIs('blog')">Blog</x-jet-nav-link>

                        <x-jet-nav-link href="{{route('info')}}" :active="request()->routeIs('info')">Contacto</x-jet-nav-link>

                        

                    </div>
                </div>
            </div>
            

            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                <!-- Profile dropdown -->
                <div class="ml-3 relative">                    

                    @auth
                        {{-- CERRAR SESIÓN --}}
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">

                                <button
                                    class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>

                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Administrar cuenta') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Perfil') }}
                                </x-jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>

                    @else
                        {{-- INICIAR SESIÓN --}}
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">

                                <button
                                    class="flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-white p-2">


                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewBox="0 0 24 24"
                                        class="h-6 w-6 object-cover text-gray-100">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                    
                                </button>

                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Registrate o Inicia Sesión') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('login') }}">
                                    {{ __('Iniciar Sesión') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('register') }}">
                                    {{ __('Registrarse') }}
                                </x-jet-dropdown-link>

                            </x-slot>
                        </x-jet-dropdown>

                    @endauth
                    
                </div>
            </div>

        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

            <x-jet-responsive-nav-link href="{{ route('/') }}" :active="request()->routeIs('/')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('/') }}" :active="request()->routeIs('/')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('/') }}" :active="request()->routeIs('/')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>

        </div>
    </div>

  </header>