<?php $__env->startSection('titulo', 'General'); ?>
<?php $__env->startSection('content'); ?>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
               <div class="bg-green-950 rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-3xl font-bold text-yellow-400"><?php echo e($userCount); ?></div>
                            </div>
                            <div class="text-sm font-medium text-yellow-200">Usuarios registrados</div>
                        </div>
                        <div class="text-yellow-400">
                            <i class="fa-solid fa-users text-5xl"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-green-950 rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-3xl font-bold text-yellow-400"><?php echo e($pueblosCount); ?></div>
                            </div>
                            <div class="text-sm font-medium text-yellow-200">Pueblos registrados</div>
                        </div>
                        <div class="text-yellow-400">
                            <i class="fa-solid fa-map text-5xl"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-green-950 rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-3xl font-bold text-yellow-400"><?php echo e($visitCount); ?></div>
                            </div>
                            <div class="text-sm font-medium text-yellow-200">Visitas a la página</div>
                        </div>
                        <div class="text-yellow-400">
                            <i class="fa-solid fa-eye text-5xl"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-green-950 rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-3xl font-bold text-yellow-400"><?php echo e($eventsCount); ?></div>
                            </div>
                            <div class="text-sm font-medium text-yellow-200">Eventos programados</div>
                        </div>
                        <div class="text-yellow-400">
                            <i class="fa-regular fa-calendar-days text-5xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-green-950 rounded-lg shadow p-6 mb-6">
                    <div class="mb-4">
                        <h5 class="text-2xl font-bold text-yellow-400">Eventos</h5>
                        <p class="text-yellow-200">Eventos disponibles en la pagina</p>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-center border border-yellow-200">
                            <thead class="bg-yellow-200 text-green-950">
                                <tr class="px-4 py-2 text-green-950">
                                    <th class="py-2 border border-yellow-400">ID</th>
                                    <th class="border border-yellow-400">Pueblo</th>
                                    <th class="border border-yellow-400">Nombre</th>
                                    <th class="border border-yellow-400">Fecha inicio</th>
                                    <th class="border border-yellow-400">Fecha Fin</th>
                                    <th class="border border-yellow-400">Cartel</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="px-4 hover:bg-yellow-100 text-green-950 bg-amber-50">
                                        <td class="py-2 border border-yellow-400"><?php echo e($event->id); ?></td>
                                        <td class="border border-yellow-400"><?php echo e($event->pueblo->name); ?></td>
                                        <td class="border border-yellow-400"><?php echo e($event->name); ?></td>
                                        <td class="border border-yellow-400"><?php echo e($event->dateIni); ?></td>
                                        <td class="border border-yellow-400"><?php echo e($event->dateFin); ?></td>
                                        <td class="border border-yellow-400">
                                            <a href="<?php echo e(asset('storage/carteles/' . $event->cartel)); ?>" target="_blank" class="text-blue-600 underline">
                                                <?php echo e($event->cartel); ?>

                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <!-- Lista pueblos -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Centros -->
                <div class="bg-green-950 rounded-lg shadow p-6">
                    <div class="mb-4">
                        <h5 class="text-2xl font-bold text-yellow-400">Pueblos</h5>
                        <p class="text-yellow-200">Pueblos registrados en la página</p>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-center border border-yellow-200">
                            <thead class="bg-yellow-200 text-green-950">
                                <tr class="px-4 py-2 text-green-950">
                                    <th class="py-2 border border-yellow-400">ID</th>
                                    <th class="border border-yellow-400">Nombre</th>
                                    <th class="border border-yellow-400">Latitud</th>
                                    <th class="border border-yellow-400">Longitud</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $pueblos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pueblo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="px-4 hover:bg-yellow-100 text-green-950 bg-amber-50">
                                        <td class="py-2 border border-yellow-400"><?php echo e($pueblo->id); ?></td>
                                        <td class="border border-yellow-400"><?php echo e($pueblo->name); ?></td>
                                        <td class="border border-yellow-400"><?php echo e($pueblo->latitude); ?></td>
                                        <td class="border border-yellow-400"><?php echo e($pueblo->longitude); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Usuarios -->
                <div class="bg-green-950 rounded-lg shadow p-6">
                    <div class="mb-4">
                        <h5 class="text-2xl font-bold text-yellow-400">Usuarios</h5>
                        <p class="text-yellow-200">Usuarios registrados en la página</p>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-center border border-gray-200">
                            <thead class="bg-yellow-200 text-green-950">
                                <tr class="px-4 py-2 text-green-950">
                                    <th class="py-2 border border-yellow-400">ID</th>
                                    <th class="border border-yellow-400">Nombre</th>
                                    <th class="border border-yellow-400">Correo</th>
                                    <th class="border border-yellow-400">Rol</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="px-4 hover:bg-yellow-100 text-green-950 bg-amber-50">
                                        <td class="py-2 px-3 border border-yellow-400"><?php echo e($user->id); ?></td>
                                        <td class="border border-yellow-400"><?php echo e($user->name); ?></td>
                                        <td class="border border-yellow-400"><?php echo e($user->email); ?></td>
                                        <td class="border border-yellow-400"><?php echo e($user->role); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/FIESTARIOJA/fiestarioja/resources/views/admin/general.blade.php ENDPATH**/ ?>