<?php $__env->startSection('titulo', 'Usuarios'); ?>
<?php $__env->startSection('content'); ?>
<div class="p-6">
    <div class="max-w-7xl mx-auto">
        <div class="mb-6">
            <div class="text-sm text-gray-500 uppercase tracking-wide">Eventos</div>
            <h2 class="text-2xl font-bold text-gray-900">Organiza los eventos que hay programados</h2>
        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <h5 class="text-lg font-semibold text-gray-800">Registrados</h5>
                <p class="text-sm text-gray-500">Estos son los eventos</p>
            </div>

            <div class="p-6 overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">ID</th>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">Pueblo</th>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">Nombre</th>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">Fecha inicio</th>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">Fecha fin</th>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">Cartel</th>
                            <th class="px-4 py-2 text-center text-gray-700 font-semibold border">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="user-<?php echo e($event->id); ?>" class="hover:bg-gray-50">
                                <td class="px-4 py-2 text-center border"><?php echo e($event->id); ?></td>
                                <td class="px-4 py-2 text-center border" id="user-name-<?php echo e($event->id); ?>">
                                    <span><?php echo e($event->pueblo->name); ?></span>
                                </td>
                                <td class="px-4 py-2 text-center border" id="user-email-<?php echo e($event->id); ?>">
                                    <span><?php echo e($event->name); ?></span>
                                </td>
                                <td class="px-4 py-2 text-center border">
                                    <span><?php echo e($event->dateIni); ?></span>
                                </td>
                                <td class="px-4 py-2 text-center border">
                                    <span><?php echo e($event->dateFin); ?></span>
                                </td>
                                <td class="px-4 py-2 text-center border">
                                    <a href="<?php echo e(asset('storage/carteles/' . $event->cartel)); ?>" target="_blank" class="text-blue-600 underline">
                                        <span><?php echo e($event->cartel); ?></span>
                                    </a>
                                </td>
                                <td class="px-4 py-2 text-center border">
                                    <div class="flex justify-center gap-4" id="icons-<?php echo e($event->id); ?>">
                                        <button onclick="toggleEditFields(<?php echo e($event->id); ?>)" class="text-blue-600 hover:text-blue-800 transition">
                                            <i class="fa-solid fa-pen-to-square animate__animated fs-5"
                                                onmouseover="this.classList.add('animate__swing');"
                                                onanimationend="this.classList.remove('animate__swing');"></i>
                                        </button>
                                        <button onclick="confirmDelete(<?php echo e($event->id); ?>)" class="text-red-600 hover:text-red-800 transition">
                                            <i class="fa-solid fa-trash animate__animated fs-5"
                                                onmouseover="this.classList.add('animate__swing');"
                                                onanimationend="this.classList.remove('animate__swing');"></i>
                                        </button>
                                    </div>
                                    <form id="delete-form-<?php echo e($event->id); ?>" action="<?php echo e(route('delete-event', $event->id)); ?>" method="POST" class="hidden">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                    </form>

                                    <!-- Guardar cambios -->
                                    <button class="hidden mt-2 px-3 py-1 bg-green-600 text-white rounded text-sm hover:bg-green-700"
                                        id="save-<?php echo e($event->id); ?>" onclick="saveChanges(<?php echo e($event->id); ?>)">
                                        Guardar
                                    </button>

                                    <!-- Formulario oculto -->
                                    <form id="update-form-<?php echo e($event->id); ?>" action="<?php echo e(route('users.update', $event->id)); ?>" method="POST" class="hidden">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="name" id="hidden-name-<?php echo e($event->id); ?>" value="<?php echo e($event->name); ?>">
                                        <input type="hidden" name="email" id="hidden-email-<?php echo e($event->id); ?>" value="<?php echo e($event->email); ?>">
                                        <input type="hidden" name="role" id="hidden-role-<?php echo e($event->id); ?>" value="<?php echo e($event->role); ?>">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(itemId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Esta acción no se puede deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            buttonsStyling: false,
            customClass: {
                confirmButton: 'bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded mr-2',
                cancelButton:'bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + itemId).submit();
            } else {
                Swal.fire({
                    title: 'Cancelado',
                    text: 'La acción ha sido cancelada',
                    icon: 'error',
                    confirmButtonText: 'Entendido',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded'
                    }
                });
            }
        });
    }

    function toggleEditFields(userId) {
        const nameCell = document.getElementById('user-name-' + userId);
        const emailCell = document.getElementById('user-email-' + userId);
        const roleCell = document.getElementById('user-role-' + userId);
        const iconsDiv = document.getElementById('icons-' + userId);
        const saveButton = document.getElementById('save-' + userId);

        const nameSpan = nameCell.querySelector('span');
        const emailSpan = emailCell.querySelector('span');
        const roleSpan = roleCell.querySelector('span');

        const nameInput = nameCell.querySelector('input');
        const emailInput = emailCell.querySelector('input');
        const roleSelect = roleCell.querySelector('select');

        // Alternar entre mostrar inputs/select y spans
        if (nameInput.style.display === "none" && emailInput.style.display === "none" && roleSelect.style.display ===
                "none") {
            // Mostrar inputs y select, ocultar spans
            nameInput.style.display = "inline-block";
            emailInput.style.display = "inline-block";
            roleSelect.style.display = "inline-block";
            nameSpan.style.display = "none";
            emailSpan.style.display = "none";
            roleSpan.style.display = "none";

            iconsDiv.style.display = "none";
            saveButton.style.display = "inline-block";
        } else {
            // Ocultar inputs y select, mostrar spans
            nameInput.style.display = "none";
            emailInput.style.display = "none";
            roleSelect.style.display = "none";
            nameSpan.style.display = "inline-block";
            emailSpan.style.display = "inline-block";
            roleSpan.style.display = "inline-block";

            iconsDiv.style.display = "flex";
            saveButton.style.display = "none";
        }
    }

    function saveChanges(userId) {
        // Obtener los valores de los inputs y select
        const nameInput = document.getElementById('edit-name-' + userId);
        const emailInput = document.getElementById('edit-email-' + userId);
        const roleSelect = document.getElementById('edit-role-' + userId);

        // Actualizar los campos ocultos en el formulario
        document.getElementById('hidden-name-' + userId).value = nameInput.value;
        document.getElementById('hidden-email-' + userId).value = emailInput.value;
        document.getElementById('hidden-role-' + userId).value = roleSelect.value;

        // Enviar el formulario tradicional para actualizar el usuario
        document.getElementById('update-form-' + userId).submit();
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/FIESTARIOJA/fiestarioja/resources/views/admin/allevents.blade.php ENDPATH**/ ?>