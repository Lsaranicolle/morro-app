<x-app-layout>

    <section class="text-white body-font relative m-6">
        <div class="absolute inset-0 bg-gray-300 rounded-lg">
          <iframe class="rounded-lg" width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" title="map" scrolling="no" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=es&amp;q=+(El%20Morro,%20Yopal,%20Casanare)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
        </div>
        
        <div class="container px-5 py-24 mx-auto flex rounded-lg">
          <div class="lg:w-1/3 md:w-1/2 bg-gradient-to-r from-teal-700 to-teal-900 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
            <h2 class="text-white text-lg mb-1 font-medium title-font">Buzón</h2>
            <p class="leading-relaxed mb-5 text-white">Completa el siguiente formulario junto con tu queja o reclamo</p>
            <div class="relative mb-4">
              <label for="email" class="leading-7 text-sm text-white">Correo Electrónico</label>
              <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
              <label for="message" class="leading-7 text-sm text-white">Mensaje</label>
              <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
            </div>
            <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Enviar</button>
            <p class="text-xs text-white mt-3">Buzon de quejas o reclamos de la plataforma web Antonio Nariño.</p>
          </div>
        </div>
      </section>

</x-app-layout>
