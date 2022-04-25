<aside class="flex-shrink-0 hidden w-56 bg-gradient-to-r from-teal-800 to-teal-700 shadow-sm md:block">
  
    <div class="flex flex-col h-full">

      <div class="flex items-center justify-center w-full h-16 shadow">
        <p class="text-white text-lg">Antonio Nariño</p>
      </div>

      <!-- Sidebar links -->
      <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto"> 

        @role('Estudiante')
        <x-aside-link href="{{route('misasignaturas.index')}}" :active="request()->routeIs('misasignaturas.index')">
          <x-slot name="path">
            <path d="M12 14l9-5-9-5-9 5 9 5z" />
            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />     
          </x-slot>   
          Mis Asignaturas
        </x-aside-link>
        @endrole

        @role('Estudiante')
        <x-aside-link href="{{route('mihorario')}}" :active="request()->routeIs('mihorario')">
          <x-slot name="path">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </x-slot>   
          Mi Horario
        </x-aside-link>
        @endrole

        @role('Estudiante')
        <x-aside-link href="{{route('misnotas')}}" :active="request()->routeIs('misnotas')">
          <x-slot name="path">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
          </x-slot>   
          Mis Calificaciones
        </x-aside-link>
        @endrole

        @role('Estudiante')
        <x-aside-link href="{{route('misboletines')}}" :active="request()->routeIs('misboletines')">
          <x-slot name="path">
            <path d="M12 14l9-5-9-5-9 5 9 5z" />
            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
          </x-slot>   
          Mis Boletines
        </x-aside-link>
        @endrole

        @hasanyrole('Profesor|Administrador')
        <x-aside-link href="{{route('admin.estudiantes')}}" :active="request()->routeIs('admin.estudiantes')">
            <x-slot name="path">
              <path d="M12 14l9-5-9-5-9 5 9 5z" />
              <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />          
            </x-slot>   
            Estudiantes
          </x-aside-link>
          @endrole

          @hasanyrole('Profesor|Administrador')
          <x-aside-link href="{{route('admin.maestros')}}" :active="request()->routeIs('admin.maestros')">
            <x-slot name="path">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </x-slot>   
            Maestros
          </x-aside-link>
          @endrole

          @hasanyrole('Profesor|Administrador')
          <x-aside-link href="{{route('admin.asignaturas')}}" :active="request()->routeIs('admin.asignaturas')">
            <x-slot name="path">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
            </x-slot>   
            Asignaturas
          </x-aside-link>
          @endrole

          @role('Administrador')
          <x-aside-link href="{{route('admin.grados')}}" :active="request()->routeIs('admin.grados')">
            <x-slot name="path">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
            </x-slot>   
            Grados
          </x-aside-link>
          @endrole

          @role('Administrador')
          <x-aside-link href="{{route('admin.horarios')}}" :active="request()->routeIs('admin.horarios')">
            <x-slot name="path">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
            </x-slot>   
            Horarios
          </x-aside-link>
          @endrole

          @hasanyrole('Profesor|Administrador')
          <x-aside-link href="{{route('admin.boletines')}}" :active="request()->routeIs('admin.boletines')">
            <x-slot name="path">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </x-slot>   
            Boletines
          </x-aside-link>
          @endrole

          @role('Administrador')
          <x-aside-link href="{{route('admin.usuarios')}}" :active="request()->routeIs('admin.usuarios')">
            <x-slot name="path">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </x-slot>   
            Usuarios
          </x-aside-link>
          @endrole

          @role('Profesor')
          <x-aside-link href="{{route('docente.administracion.index')}}" :active="request()->routeIs('administracion.index')">
            <x-slot name="path">
              <path d="M12 14l9-5-9-5-9 5 9 5z" />
              <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />     
            </x-slot>   
            Administración
          </x-aside-link>
          @endrole
         
    

        {{-- <x-aside-dropdown>
          <x-slot name="path">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
          </x-slot>

          Gestion

          <x-slot name="content">
            <x-aside-dropdown-link href="{{ route('login') }}">
              Usuarios
            </x-aside-dropdown-link>
            <x-aside-dropdown-link href="{{ route('login') }}">
              Roles
            </x-aside-dropdown-link>
            <x-aside-dropdown-link href="{{ route('login') }}">
              Registros
            </x-aside-dropdown-link>
           
          </x-slot>
        </x-aside-dropdown> --}}

      </nav>

      <!-- Sidebar footer -->
      <div class="flex-shrink-0 px-2 py-4 space-y-2">
        <a href="#" class="flex items-center justify-center w-full px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
          <span aria-hidden="true">
            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
          </span>
          <span>Inicio</span>
        </a>
      </div>
    </div>
  </aside>