<?php if($eventos->isEmpty()): ?>
    <p class="text-center text-4xl text-green-950 mb-5">No se encontro el evento.</p>
<?php else: ?>
    <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('festivos.festivos', ['event' => $events], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/FIESTARIOJA/fiestarioja/resources/views/festivos/lista.blade.php ENDPATH**/ ?>