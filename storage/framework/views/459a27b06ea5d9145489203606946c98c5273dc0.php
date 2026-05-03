<div x-data="{ open: false }" class="w-full">

    <!-- Fila del pueblo (Toda la fila es clickable) -->
    <div @click="open = true" class="group w-full bg-white px-4 py-4 sm:px-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md hover:border-green-500/50 hover:bg-yellow-500/10 transition-all duration-300 flex justify-between items-center cursor-pointer mb-2">

        <div class="flex items-center gap-4 sm:gap-6">
            <!-- Imagen con efecto zoom al pasar el ratón -->
            <div class="overflow-hidden rounded-lg shadow-sm hidden md:block w-20 h-20 sm:w-28 sm:h-28 shrink-0 bg-gray-100">
                <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                     src="<?php echo e($pueblo->image ?? asset('images/placeholder.png')); ?>"
                     alt="<?php echo e($pueblo->name); ?>">
            </div>

            <div class="flex flex-col justify-center">
                <h2 class="sm:text-3xl text-xl font-bold text-green-950 mb-1 group-hover:text-green-800 transition-colors"><?php echo e($pueblo->name); ?></h2>
                <h3 class="sm:text-lg text-sm text-gray-600 font-medium">
                    <span class="inline-block w-2 h-2 rounded-full <?php echo e($pueblo->events->count() > 0 ? 'bg-green-500' : 'bg-gray-400'); ?> mr-1"></span>
                    <?php echo e($pueblo->events->count()); ?> eventos programados
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
                <h2 class="text-amber-50 text-3xl sm:text-4xl font-extrabold mb-3"><?php echo e($pueblo->name); ?></h2>
                <p class="text-gray-300 text-base sm:text-lg leading-relaxed"><?php echo e($pueblo->description ?? 'Descripción del pueblo no disponible en este momento.'); ?></p>
            </div>

            <!-- Carrusel Alpine.js -->
            <div x-data="{
                    currentImage: 0,
                    images: <?php echo e($pueblo->image ? (is_string($pueblo->image) ? json_encode([$pueblo->image]) : json_encode($pueblo->image)) : '[]'); ?>

                }"
                class="relative mb-8 rounded-xl overflow-hidden shadow-lg bg-green-900/50 group">

                <img :src="images.length > 0 ? images[currentImage] : '<?php echo e(asset('images/placeholder.png')); ?>'"
                     class="w-full h-64 sm:h-80 object-cover transition-all duration-300">

                <!-- Controles del carrusel (solo se muestran si hay más de 1 imagen) -->
                <template x-if="images.length > 1">
                    <div>
                        <button @click="currentImage = (currentImage === 0 ? (images.length - 1) : currentImage - 1)"
                            class="absolute top-1/2 left-3 transform -translate-y-1/2 bg-black/40 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-black/70 backdrop-blur-sm transition opacity-0 group-hover:opacity-100">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        </button>

                        <button @click="currentImage = (currentImage === images.length - 1 ? 0 : currentImage + 1)"
                            class="absolute top-1/2 right-3 transform -translate-y-1/2 bg-black/40 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-black/70 backdrop-blur-sm transition opacity-0 group-hover:opacity-100">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>

                        <!-- Indicadores (Puntitos) -->
                        <div class="absolute bottom-3 left-1/2 transform -translate-x-1/2 flex space-x-2 bg-black/30 px-3 py-1.5 rounded-full backdrop-blur-sm">
                            <template x-for="(img, index) in images" :key="index">
                                <button @click="currentImage = index"
                                        :class="{'bg-yellow-400 w-4': currentImage === index, 'bg-white/50 w-2 hover:bg-white': currentImage !== index}"
                                        class="h-2 rounded-full transition-all duration-300"></button>
                            </template>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Sección Eventos -->
            <div class="mb-8">
                <h3 class="text-yellow-400 font-bold mb-4 text-2xl border-b border-green-800 pb-2">Eventos Destacados</h3>

                <?php if($pueblo->events->count()): ?>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                        <?php $__currentLoopData = $pueblo->events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(asset('storage/carteles/' . $event->cartel)); ?>" target="_blank" class="block h-full">
                            <div class="h-full p-5 bg-green-900/60 rounded-xl hover:bg-green-800 transition-colors flex flex-col border border-green-800/50 hover:border-yellow-500/50 shadow-sm hover:shadow-md">
                                <div class="flex flex-wrap items-center gap-2 sm:gap-4 text-green-950 font-medium text-sm sm:text-base mb-3">
                                    <div class="px-3 py-1 bg-yellow-400 rounded-md shadow-sm">
                                        <span class="font-bold">Ini:</span> <?php echo e($event->dateIni); ?>

                                    </div>
                                    <i class="fa-solid fa-arrow-right text-yellow-400 flex items-center justify-center"></i>
                                    <div class="px-3 py-1 bg-yellow-400 rounded-md shadow-sm">
                                        <span class="font-bold">Fin:</span> <?php echo e($event->dateFin); ?>

                                    </div>
                                </div>
                                <div class="mt-auto text-amber-50 font-bold text-2xl sm:text-3xl tracking-wide">
                                    <?php echo e($event->name); ?>

                                </div>
                            </div>
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <div class="w-full bg-green-900/40 border border-green-800 rounded-xl p-6 text-center">
                        <p class="text-amber-50/70 text-lg font-medium">
                            No hay eventos programados en este momento para este pueblo.
                        </p>
                    </div>
                <?php endif; ?>
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
                        src="https://www.google.com/maps?q=<?php echo e($pueblo->latitude); ?>,<?php echo e($pueblo->longitude); ?>&z=15&output=embed">
                    </iframe>
                </div>
            </div>

        </div>
    </div>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/fiestarioja/fiestarioja/resources/views/pueblos/pueblos.blade.php ENDPATH**/ ?>