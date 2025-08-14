<?php $__env->startSection('titulo', 'Perfil'); ?>
<?php $__env->startSection('content'); ?>
    <div class="bg-white flex flex-col items-center justify-center min-h-screen p-4 bg-inherit">
        <!-- Icono de perfil -->
        <div class="flex justify-center mt-5">
            <?php if(Auth::user()->avatar): ?>
                <img id="profilePic" src="<?php echo e(asset('storage/' . Auth::user()->avatar)); ?>"
                    alt="Avatar de <?php echo e(Auth::user()->name); ?>"
                    class="img-fluid w-40 h-40 rounded-full cursor-pointer transition duration-300 ease-in-out hover:scale-110 hover:shadow-2xl">
            <?php else: ?>
                <img id="profilePic" src="<?php echo e(asset('images/default-profile.jpg')); ?>" alt="Avatar por defecto"
                    class="img-fluid w-36 h-36 rounded-full cursor-pointer">
            <?php endif; ?>
        </div>

        <!-- Modal para subir imagen -->
        <div id="uploadModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
            <div class="bg-white rounded-lg p-6 w-96">
                <h3 class="text-xl font-semibold mb-4">Subir imagen</h3>
                <form id="uploadForm" enctype="multipart/form-data" action="<?php echo e(route('perfil.update-avatar')); ?>"
                    method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-4">
                        <label for="fileInput"
                            class="block text-sm font-medium text-gray-700"></label>Selecciona una </label>
                        <input type="file" id="fileInput" name="image" accept="image/*"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500">
                    </div>
                    <div class="flex justify-between items-center">
                        <button type="button" id="cancelBtn"
                            class="px-4 py-2 bg-gray-300 text-black rounded-md hover:bg-gray-400">
                            Cancelar
                        </button>
                        <button type="submit" id="submitBtn"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Subir imagen
                        </button>
                    </div>
                </form>

            </div>
        </div>
            <div id="usuario" class="w-full animate__animated animate__fadeIn">
                <form action="<?php echo e(route('edit')); ?>" method="POST" class="w-full flex flex-col items-center">
                    <?php echo csrf_field(); ?>
                    <!-- Campo de Usuario -->
                    <p class="font-bold text-2xl text-yellow-400 m-5">Datos de usuario</p>
                    <div class="w-full max-w-md mb-4">
                        <label class="block text-sm font-medium text-yellow-400">Usuario</label>
                        <div class="relative mt-1">
                            <input id="inputUsu" name="usuario" type="text" placeholder="<?php echo e(auth()->user()->name); ?>"
                                class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 bg-gray-200 cursor-not-allowed"
                                disabled>
                            <button type="button" id="xUsuario"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Campo de Correo -->
                    <div class="w-full max-w-md mb-4">
                        <label class="block text-sm font-medium text-yellow-400">Correo</label>
                        <div class="relative mt-1">
                            <input id="inputCorreo" type="email" name="correo" placeholder="<?php echo e(auth()->user()->email); ?>"
                                class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 bg-gray-200 cursor-not-allowed"
                                disabled>
                            <button type="button" id="xCorreo"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Campo de Contraseña -->
                    <div class="w-full max-w-md mb-4">
                        <label class="block text-sm font-medium text-yellow-400">Contraseña</label>
                        <div class="relative mt-1">
                            <input id="inputContraseña" name="contrasena" type="password" placeholder="**********"
                                class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 bg-gray-200 cursor-not-allowed"
                                disabled>
                            <span class="absolute inset-y-0 right-2 flex items-center cursor-pointer text-gray-400">
                                <i id="ojo" class="fa-solid fa-eye"></i>
                                <i id="ojoOculto" class="fa-solid fa-eye-slash hidden"></i>
                            </span>
                        </div>
                    </div>

                    <div class="w-full max-w-md mb-4">
                        <label
                            class="block text-sm font-medium text-yellow-400">Confirmar contraseña</label>
                        <div class="relative mt-1">
                            <input id="confirmarContrasena" name="contrasena_confirmation" type="password"
                                placeholder="**********"
                                class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 bg-gray-200 cursor-not-allowed"
                                disabled>
                            <span class="absolute inset-y-0 right-2 flex items-center cursor-pointer text-gray-400">
                                <i id="ojoConfirmar" class="fa-solid fa-eye"></i>
                                <i id="ojoOcultoConfirmar" class="fa-solid fa-eye-slash hidden"></i>
                            </span>
                        </div>
                    </div>


                    <button
                        class="editar flex my-4 px-4 py-2 bg-yellow-400 text-green-950  font-semibold rounded-md hover:bg-yellow-500"
                        data-state="editar">
                        <span id="boton-text">Editar</span>
                        <div class="text-center">
                            <i id="edit-icon" class="fa-solid fa-pen-to-square h-6 w-6 inline-block"></i>
                        </div>

                        <svg id="close-icon" class="h-6 w-6 text-slate-900" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div id="gu" class="flex justify-center hidden">
                        <button type="submit"
                            class="mt-4 px-4 py-2 bg-black text-white font-semibold rounded-md hover:bg-gray-300">
                            Guardar cambios
                        </button>
                    </div>
            </div>
            </form>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const editarButton = document.querySelector('.editar');
        const inputs = document.querySelectorAll('input[disabled]');
        const editIcon = document.getElementById('edit-icon');
        const closeIcon = document.getElementById('close-icon');
        const botonText = document.getElementById('boton-text');

        editarButton.addEventListener('click', function(event) {
            event.preventDefault();

            const currentState = editarButton.getAttribute('data-state') || 'editar';
            const newState = currentState === 'editar' ? 'dejarDeEditar' : 'editar';

            if (newState === 'dejarDeEditar') {
                inputs.forEach(input => {
                    input.disabled = false;
                    input.classList.remove('bg-gray-200', 'cursor-not-allowed');
                });
                editIcon.style.display = "none";
                closeIcon.style.display = "block";
                document.getElementById('gu').classList.remove('hidden');
            } else {
                inputs.forEach(input => {
                    input.disabled = true;
                    input.classList.add('bg-gray-200', 'cursor-not-allowed');
                });
                editIcon.style.display = "block";
                closeIcon.style.display = "none";
                document.getElementById('gu').classList.add('hidden');
            }

            botonText.textContent = newState === 'editar' ? 'Editar' : 'Cancelar edición';
            editarButton.setAttribute('data-state', newState);
        });
        });
</script>
<script src="<?php echo e(asset('js/perfil.js')); ?>"></script>
<script>
$('#profilePic').on('click', function() {
    $('#uploadModal').removeClass('hidden');
});

$('#cancelBtn').on('click', function() {
    $('#uploadModal').addClass('hidden');
});

$('#uploadForm').on('submit', function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    console.log('Imagen subida:', formData.get('image'));

$('#uploadModal').addClass('hidden');
    document.getElementById("uploadForm").submit();
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/fiestarioja/fiestarioja/resources/views/perfil.blade.php ENDPATH**/ ?>