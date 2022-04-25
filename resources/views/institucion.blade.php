<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Institución
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>

    <section class="text-gray-600 body-font overflow-hidden">
        <div class="p-32 py-24 mx-6 bg-white shadow-xl sm:rounded-lg">
          <div class="flex flex-wrap -m-12">
            <div class="p-12 md:w-1/2 flex flex-col items-start">
              <span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">MISIÓN</span>
              
              <p class="leading-relaxed mb-8 mt-4">Formar personas íntegras, respetuosas del medio ambiente, capaces de viviren sociedad, de liderar, emprender y transformar el entorno mejorando lacalidad de vida de su familia y comunidad mediante procesos en las diferentesáreas del conocimiento.</p>
              <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
                <a class="text-indigo-500 inline-flex items-center">Ver mas
                  <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                  </svg>
                </a>                 
              </div>
              <a class="inline-flex items-center">
                <img alt="blog" src="{{asset('img/mision.jpg')}}" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                <span class="flex-grow flex flex-col pl-4">
                  <span class="title-font font-medium text-gray-900">Misión</span>                  
                </span>
              </a>
            </div>
            <div class="p-12 md:w-1/2 flex flex-col items-start">
              <span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">VISIÓN</span>
              
              <p class="leading-relaxed mb-8 mt-4">Para el 2018 buscamos posicionarnos como una de las mejores institucioneseducativas agropecuarias de Casanare con altos estándares de calidad, queparticipe en procesos de investigación, transferencia de tecnologías yconocimientos que contribuyan al desarrollo de su comunidad local y regional.</p>
              <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
                <a class="text-indigo-500 inline-flex items-center">Ver mas
                  <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
              <a class="inline-flex items-center">
                <img alt="blog" src="{{asset('img/vision.jpg')}}" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                <span class="flex-grow flex flex-col pl-4">
                  <span class="title-font font-medium text-gray-900">Visión</span>               
                </span>
              </a>
            </div>
          </div>
        </div>
      </section>

</x-app-layout>
