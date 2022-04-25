<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">

              
    
        <div class="flex h-screen antialiased text-gray-900 bg-gray-200">
    
            @auth
                <x-aside /> 
            @endauth
            
    
            <div class="flex flex-col flex-1 min-h-screen overflow-x-hidden overflow-y-auto">
                <!-- Navbar -->
                @livewire('navigation-menu')

                <x-jet-banner /> 
                
                @if (isset($header))
                    <div
                        class="mx-6 py-4 px-4 sm:px-6 lg:px-8 mt-6 rounded-lg bg-gradient-to-r from-teal-600 to-teal-800 shadow-sm">
                        <div>
                            {{ $header }}
                        </div>
                    </div>
                @endif
    
                <!-- Main content -->   
                <main>            
                    {{ $slot }}  
                </main>
    
            </div>  
    
        </div>
    
        @stack('modals')
    
        @livewireScripts
    
        @stack('script')
    
        <script>
            Livewire.on('errorSize', mensaje => {
                Swal.fire({
                    title: 'Error!',
                    text: '¿Quieres continuar?',
                    icon: 'error',
                    confirmButtonText: 'Cool'
                })
            });
        </script>
    
    </body>
</html>
