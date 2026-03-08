

<?php $__env->startSection('titulo', 'Contacto'); ?>

<?php $__env->startSection('content'); ?>
<div class="w-full min-h-screen bg-green-950 py-12 px-4 sm:px-6 lg:px-8 font-sans text-gray-100 flex justify-center items-start">
    
    <div class="w-full max-w-5xl bg-green-900/40 backdrop-blur-md p-8 sm:p-12 rounded-3xl shadow-2xl border border-green-800/50 mt-4 sm:mt-10 animate__animated animate__fadeIn">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <div class="space-y-8">
                <div>
                    <h2 class="text-3xl font-extrabold tracking-tight text-yellow-400 drop-shadow-md mb-4">¡Hablemos!</h2>
                    <p class="text-green-300 text-lg">¿Tienes alguna sugerencia para FiestaRioja o quieres colaborar con la Asociación?</p>
                </div>

                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-yellow-400 p-3 rounded-xl text-green-950 shadow-lg">
                            <i class="fa-solid fa-location-dot text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-yellow-400/90">Nuestra Sede</h4>
                            <p class="text-gray-300 italic">Calle Mayor 71, Sojuela, La Rioja</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="bg-yellow-400 p-3 rounded-xl text-green-950 shadow-lg">
                            <i class="fa-solid fa-envelope text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-yellow-400/90">Email Directo</h4>
                            <p class="text-gray-300 italic underline">riojafiesta@gmail.com</p>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <h4 class="text-sm font-bold text-green-500 uppercase tracking-widest mb-4">Síguenos en redes</h4>
                    <div class="flex gap-4">
                        <a href="#" class="w-12 h-12 rounded-full bg-green-950 flex items-center justify-center border border-green-800 text-yellow-400 hover:bg-yellow-400 hover:text-green-950 transition-all duration-300 shadow-xl">
                            <i class="fa-brands fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-full bg-green-950 flex items-center justify-center border border-green-800 text-yellow-400 hover:bg-yellow-400 hover:text-green-950 transition-all duration-300 shadow-xl">
                            <i class="fa-brands fa-x-twitter text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-green-950/50 p-6 sm:p-8 rounded-2xl border border-green-800/30">
                <form action="<?php echo e(route('contacto.enviar')); ?>" method="POST" class="flex flex-col gap-5">
                    <?php echo csrf_field(); ?>
                    
                    <div>
                        <label class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Tu Nombre</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-solid fa-user text-green-600"></i>
                            </div>
                            <input name="nombre" type="text" required
                                class="block w-full pl-11 pr-4 py-3 rounded-xl bg-green-900/50 border border-green-700 text-amber-50 placeholder-green-700/50 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 transition-all outline-none" 
                                placeholder="Escribe tu nombre...">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Correo Electrónico</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-solid fa-envelope text-green-600"></i>
                            </div>
                            <input name="email" type="email" required
                                class="block w-full pl-11 pr-4 py-3 rounded-xl bg-green-900/50 border border-green-700 text-amber-50 placeholder-green-700/50 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 transition-all outline-none" 
                                placeholder="tu@email.com">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Tu Mensaje o Sugerencia</label>
                        <textarea name="mensaje" rows="4" required
                            class="block w-full px-4 py-3 rounded-xl bg-green-900/50 border border-green-700 text-amber-50 placeholder-green-700/50 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 transition-all outline-none resize-none" 
                            placeholder="¿En qué podemos ayudarte?"></textarea>
                    </div>

                    <div class="flex items-center gap-2 px-1">
                        <input type="checkbox" required class="w-4 h-4 rounded border-green-700 text-yellow-400 focus:ring-yellow-400 bg-green-900">
                        <span class="text-xs text-green-300">He leído y acepto la <a href="<?php echo e(route('priv')); ?>" class="underline hover:text-yellow-400">Política de Privacidad</a>.</span>
                    </div>

                    <button type="submit" class="group flex justify-center items-center gap-2 w-full rounded-xl bg-yellow-400 px-4 py-4 text-base font-bold text-green-950 shadow-lg shadow-yellow-400/20 hover:bg-yellow-300 hover:shadow-yellow-400/40 hover:-translate-y-0.5 transition-all duration-300">
                        <span>Enviar Mensaje</span>
                        <i class="fa-solid fa-paper-plane group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\UniServerZ\www\FIESTARIOJA\fiestarioja\resources\views/mails/contactus.blade.php ENDPATH**/ ?>