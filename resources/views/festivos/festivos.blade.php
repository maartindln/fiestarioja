<div x-data="{ open: false }" class="w-full">

    <!-- Fila del evento (Toda la fila es clickable) -->
    <div @click="open = true" class="group w-full bg-white px-4 py-4 sm:px-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md hover:border-green-500/50 hover:bg-yellow-400/80 transition-all duration-300 flex justify-between items-center cursor-pointer mb-2">

        <div class="flex items-center gap-4 sm:gap-6">
            <!-- Imagen con efecto zoom al pasar el ratón -->
            <div class="overflow-hidden rounded-lg shadow-sm hidden md:block w-20 h-20 sm:w-28 sm:h-28 shrink-0 bg-gray-100">
                <i class="fa-solid fa-party-horn"></i>
            </div>
            <div class="flex flex-col justify-center">
                <h2 class="sm:text-3xl text-xl font-bold text-green-950 mb-1 group-hover:text-green-800 transition-colors">{{ $evento->name }}</h2>
                <h2 class="sm:text-2xl text-xl font-bold text-green-950 mb-1 group-hover:text-green-800 transition-colors">{{ $evento->pueblo->name }}</h2>
                <h3 class="sm:text-lg text-sm text-green-950 font-medium flex items-center gap-2 leading-none">
                    <span>{{ $evento->dateIni }}</span>
                    <i class="fa-solid fa-arrow-right text-400 flex items-center justify-center"></i>
                    <span>{{ $evento->dateFin }}</span>
                </h3>
            </div>
        </div>

        <!-- Botón Ver más -->
        <div class="flex items-center gap-2 bg-green-950 text-amber-50 px-4 py-2 sm:px-5 sm:py-2.5 rounded-lg group-hover:bg-green-800 transition-colors shrink-0">
            <i class="fa-solid fa-plus text-sm sm:text-base hidden sm:block"></i>
            <span class="font-semibold text-sm sm:text-base hidden sm:block">Ver más</span>
            <i class="fa-solid fa-chevron-right sm:hidden text-lg"></i>
        </div>
    </div>

    <!-- Ventana modal -->
    <!-- Usamos x-cloak o style="display: none;" para que no parpadee al cargar la página -->
    <div x-show="open" style="display: none;" x-transition.opacity.duration.300ms class="fixed inset-0 bg-black/60 backdrop-blur-sm flex justify-center items-center z-50 p-4 sm:p-6">

        <!-- Contenedor interior con Scroll -->
        <div @click.away="open = false" x-transition.scale.origin.bottom.duration.300ms class="bg-green-950 p-6 sm:p-8 rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto relative flex flex-col scrollbar-hide">

            <!-- Botón de Cerrar Flotante -->
            <button @click="open = false" class="sticky top-0 float-right ml-auto -mt-2 -mr-2 mb-4 text-green-950 bg-yellow-400 rounded-full w-10 h-10 flex items-center justify-center hover:bg-yellow-300 hover:scale-105 transition-all shadow-lg z-10 text-xl font-bold">
                ✕
            </button>

            <!-- Cabecera -->
            <div class="mb-6">
                <h2 class="text-amber-50 text-3xl sm:text-4xl font-extrabold mb-3">{{ $evento->name }}</h2>
                <h3 class="text-amber-50 text-3xl sm:text-3xl font-extrabold mb-3">{{ $evento->pueblo->name }}</h3>
                <p class="text-gray-300 text-base sm:text-lg leading-relaxed flex items-center gap-2 mb-3">
                    <span>{{ $evento->dateIni }}</span>
                    <i class="fa-solid fa-arrow-right text-yellow-400"></i>
                    <span>{{ $evento->dateFin }}</span>
                </p>
                <p class="text-gray-300 text-base sm:text-lg leading-relaxed mb-3">{{ $evento->description ?? 'Descripción del evento no disponible en este momento.' }}</p>
                <a href="{{ asset('storage/carteles/' . $evento->cartel) }}" target="_blank" class="inline-block">
                    <span class="bg-yellow-400 text-green-950 font-semibold px-4 py-2 rounded-lg shadow hover:bg-yellow-300 transition flex items-center gap-2">
                        <i class="fa-solid fa-image"></i>
                        Ver cartel
                    </span>
                </a>
            </div>
            <!-- Sección Mapa -->
            <div>
                <h3 class="text-yellow-400 font-bold mb-4 text-2xl border-b border-green-800 pb-2">Cómo llegar</h3>
                <div class="rounded-xl overflow-hidden shadow-lg border border-green-800 bg-green-900">
                    <iframe
                        width="100%"
                        height="350"
                        style="border:0"
                        loading="lazy"
                        allowfullscreen
                        src="https://www.google.com/maps?q={{ $evento->pueblo->latitude }},{{ $evento->pueblo->longitude }}&z=15&output=embed">
                    </iframe>
                </div>
            </div>

        </div>
    </div>
</div>
