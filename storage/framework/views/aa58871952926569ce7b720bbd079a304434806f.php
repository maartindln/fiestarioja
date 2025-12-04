<div x-data="{ open: false, currentImage: 0, mapInitialized: false, pueblo: <?php echo json_encode($pueblo, 15, 512) ?> }">
    <!-- Tarjeta del pueblo -->
    <div class="w-full px-2 text-green-950 group hover:bg-yellow-500/20 rounded flex justify-between items-center cursor-pointer pb-4 border-b border-gray-300">
        <img class="sm:w-[8rem] md:block hidden group-hover:animate-pulse" :src="pueblo.image ?? '<?php echo e(asset('images/placeholder.png')); ?>'" :alt="pueblo.name">
        <h2 class="sm:text-4xl text-xl" x-text="pueblo.name + ' -'"></h2>
        <h3 class="sm:text-2xl text-xl">gnthn</h3>
        <div class="flex items-center gap-1">
            <i class="fa-solid fa-plus text-xl text-green-950 sm:block hidden"></i>
            <a @click="open = true" class="font-semibold sm:text-xl sm:block hidden cursor-pointer">Ver más</a>
        </div>
    </div>

    <!-- Modal -->
    <div x-show="open" x-transition x-cloak
         x-init="$watch('open', value => {
            if(value && !mapInitialized){
                initMap();
                mapInitialized = true;
            }
         })"
         class="fixed inset-0 bg-black/50 flex justify-center items-center z-50 overflow-auto">

        <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-4xl relative">
            <!-- Cerrar -->
            <button @click="open = false; currentImage = 0" class="absolute top-4 right-4 text-white bg-red-600 rounded-full w-8 h-8 flex items-center justify-center">X</button>

            <!-- Título -->
            <h2 class="text-3xl font-bold mb-2" x-text="pueblo.name"></h2>

            <!-- Descripción -->
            <p class="mb-4" x-text="pueblo.descripcion ?? 'Descripción del pueblo aquí.'"></p>

            <!-- Carrusel -->
            <div class="relative mb-4">
                <img :src="pueblo.imagenes[currentImage] ?? '<?php echo e(asset('images/placeholder.png')); ?>'" class="w-full h-64 object-cover rounded">
                <button @click="currentImage = (currentImage === 0 ? pueblo.imagenes.length - 1 : currentImage - 1)" class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-gray-700/50 text-white px-2 py-1 rounded">‹</button>
                <button @click="currentImage = (currentImage === pueblo.imagenes.length - 1 ? 0 : currentImage + 1)" class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-gray-700/50 text-white px-2 py-1 rounded">›</button>
            </div>

            <!-- Cómo llegar -->
            <div class="mt-4">
                <h3 class="font-bold mb-2 text-lg">Cómo llegar:</h3>
                <div class="flex flex-wrap gap-2">
                    <a :href="pueblo.pdf_autobus ?? '#'" target="_blank" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Autobús</a>
                    <a :href="pueblo.pdf_coche ?? '#'" target="_blank" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Coche</a>
                </div>
            </div>

            <!-- Mapa -->
            <div id="googleMap" class="h-64 w-full rounded mb-4"></div>
        </div>
    </div>
</div>

<script>
function initMap() {
    const mapDiv = document.getElementById('googleMap');
    if(!mapDiv) return;

    const lat = parseFloat(document.querySelector('[x-data]').__x.$data.pueblo.latitude) || 40.4168;
    const lng = parseFloat(document.querySelector('[x-data]').__x.$data.pueblo.longitude) || -3.7038;

    const map = new google.maps.Map(mapDiv, {
        center: { lat: lat, lng: lng },
        zoom: 14,
    });

    new google.maps.Marker({
        position: { lat: lat, lng: lng },
        map: map,
        title: document.querySelector('[x-data]').__x.$data.pueblo.name
    });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY"></script>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/fiestarioja/fiestarioja/resources/views/pueblos/modalPueblos.blade.php ENDPATH**/ ?>