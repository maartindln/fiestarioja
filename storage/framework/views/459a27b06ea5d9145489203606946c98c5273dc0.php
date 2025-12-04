<div x-data="{ open: false }">
    <div class="w-full px-2 text-green-950 group hover:bg-yellow-500/20 rounded flex justify-between items-center cursor-pointer pb-4 border-b border-gray-300">
        <img class="sm:w-[8rem] md:block hidden group-hover:animate-pulse" src="<?php echo e($pueblo->image ?? asset('images/placeholder.png')); ?>" alt="<?php echo e($pueblo->name); ?>">
        <h2 class="sm:text-4xl text-xl"><?php echo e($pueblo->name); ?></h2>
        <h3 class="sm:text-2xl text-xl">?????</h3>
        <div class="flex items-center gap-1 bg-green-950 p-2 rounded">
            <i class="fa-solid fa-plus text-xl text-amber-50 sm:block hidden"></i>
            <a @click="open = true" class="text-amber-50 font-semibold sm:text-xl sm:block hidden cursor-pointer">Ver más</a>
        </div>
    </div>

<!-- Ventana modal -->
<div x-show="open" x-transition class="fixed inset-0 bg-black/50 flex justify-center items-center z-50 overflow-auto">
        <div class="bg-green-950 p-6 rounded-xl shadow-xl w-full max-w-4xl relative mt-auto">
            <button @click="open = false" class="absolute top-4 right-4 text-green-950 bg-yellow-400 rounded-full w-8 h-8 flex items-center justify-center hover:bg-yellow-500">X</button>
            <h2 class="text-amber-50 text-3xl font-bold mb-2"><?php echo e($pueblo->name); ?></h2>
            <p class="text-amber-50 mb-4"><?php echo e($pueblo->description ?? 'Descripción del pueblo aquí.'); ?></p>
            <div x-data="{currentImage: 0,images: <?php echo e($pueblo->image ? json_encode($pueblo->image) : '[]'); ?>}" class="relative mb-4">
                <img
                    :src="images.length > 0 ? images[currentImage] : '<?php echo e(asset('images/placeholder.png')); ?>'"
                    class="bg-amber-50 w-full h-64 object-cover rounded">
                <button @click="currentImage = (currentImage === 0 ? (images.length - 1) : currentImage - 1)"
                    class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-green-950/50 text-white px-3 py-2 rounded-full hover:bg-green-950 transition">
                    ‹
                </button>
                <button @click="currentImage = (currentImage === images.length - 1 ? 0 : currentImage + 1)"
                    class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-green-950/50 text-white px-3 py-2 rounded-full hover:bg-green-950 transition">
                    ›
                </button>
                <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-1">
                    <template x-for="(img, index) in images.length > 0 ? images : ['placeholder']" :key="index">
                        <div
                            :class="{'bg-green-950': currentImage === index, 'bg-gray-400': currentImage !== index}"
                            class="w-2 h-2 rounded-full"
                        ></div>
                    </template>
                </div>
            </div>
            <div class="mt-4">
                <h3 class="text-amber-50 font-bold mb-2 text-lg">Cómo llegar:</h3>
                <div class="flex flex-wrap gap-2">
                    <a href="<?php echo e($pueblo->pdf_autobus ?? '#'); ?>" target="_blank" class="px-4 py-2 bg-yellow-400 text-green-950 rounded hover:bg-yellow-500 transition">Autobús</a>
                    <a href="<?php echo e($pueblo->pdf_coche ?? '#'); ?>" target="_blank" class="px-4 py-2 bg-yellow-400 text-green-950 rounded hover:bg-yellow-500 transition">Coche</a>
                </div>
            </div>
            <div class="mt-6">
                <iframe
                    width="100%"
                    height="400"
                    style="border:0"
                    loading="lazy"
                    allowfullscreen
                    src="https://www.google.com/maps?q=<?php echo e($pueblo->latitude); ?>,<?php echo e($pueblo->longitude); ?>&z=15&output=embed">
                </iframe>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/fiestarioja/fiestarioja/resources/views/pueblos/pueblos.blade.php ENDPATH**/ ?>