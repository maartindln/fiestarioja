<?php if($pueblos->isEmpty()): ?>
    <p class="text-center text-4xl text-green-950 mb-5">No se encontro el pueblo.</p>
<?php else: ?>
    <?php $__currentLoopData = $pueblos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pueblo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('pueblos.pueblos', ['pueblo' => $pueblo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/fiestarioja/fiestarioja/resources/views/pueblos/lista.blade.php ENDPATH**/ ?>