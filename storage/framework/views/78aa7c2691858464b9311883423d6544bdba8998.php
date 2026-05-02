<?php $__env->startSection('titulo', 'Mi Perfil'); ?>

<?php $__env->startSection('content'); ?>
<!-- Contenedor principal con fondo oscuro -->
<div class="w-full min-h-screen bg-green-950 py-12 px-4 sm:px-6 lg:px-8 font-sans text-gray-100 flex justify-center items-start">
    
    <!-- Tarjeta Principal del Perfil -->
    <div class="w-full max-w-2xl bg-green-900/40 backdrop-blur-md p-8 sm:p-12 rounded-3xl shadow-2xl border border-green-800/50 mt-4 sm:mt-10 animate__animated animate__fadeIn">
        
        <!-- Cabecera y Avatar -->
        <div class="flex flex-col items-center justify-center mb-10">
            <h2 class="text-3xl font-extrabold tracking-tight text-yellow-400 drop-shadow-md mb-8">Mi Perfil</h2>
            
            <div class="relative group">
                <!-- Anillo decorativo animado al hacer hover -->
                <div class="absolute -inset-1 bg-gradient-to-r from-yellow-400 to-green-500 rounded-full blur opacity-25 group-hover:opacity-60 transition duration-500"></div>
                
                <?php if(Auth::user()->avatar): ?>
                    <img id="profilePic" src="<?php echo e(asset('storage/' . Auth::user()->avatar)); ?>" alt="Avatar de <?php echo e(Auth::user()->name); ?>"
                         class="relative object-cover w-40 h-40 rounded-full cursor-pointer border-4 border-green-950 shadow-xl transition-transform duration-300 group-hover:scale-105">
                <?php else: ?>
                    <img id="profilePic" src="<?php echo e(asset('images/default-profile.jpg')); ?>" alt="Avatar por defecto"
                         class="relative object-cover w-40 h-40 rounded-full cursor-pointer border-4 border-green-950 shadow-xl transition-transform duration-300 group-hover:scale-105">
                <?php endif; ?>
                
                <!-- Icono de cámara superpuesto -->
                <div class="absolute bottom-2 right-2 bg-yellow-400 p-2.5 rounded-full text-green-950 shadow-lg pointer-events-none group-hover:scale-110 transition-transform duration-300 border-2 border-green-950">
                    <i class="fa-solid fa-camera"></i>
                </div>
            </div>
            <p class="text-green-300 mt-4 text-sm font-medium">Haz clic en la imagen para cambiarla</p>
        </div>

        <!-- Formulario de Datos del Usuario -->
        <form id="perfilForm" action="<?php echo e(route('edit')); ?>" method="POST" class="w-full flex flex-col gap-5">
            <?php echo csrf_field(); ?>
            
            <h3 class="font-bold text-xl text-yellow-400/90 border-b border-green-800/50 pb-2 mb-2">Datos de usuario</h3>
            
            <!-- Campo de Usuario -->
            <div>
                <label class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Usuario</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-solid fa-user text-green-600"></i>
                    </div>
                    <input id="inputUsu" name="usuario" type="text" placeholder="<?php echo e(auth()->user()->name); ?>" value="<?php echo e(auth()->user()->name); ?>"
                        class="perfil-input block w-full pl-11 pr-10 py-3 rounded-xl bg-green-950/80 border border-transparent text-gray-400 cursor-not-allowed transition-all duration-300 outline-none" disabled>
                    <button type="button" class="btn-clear hidden absolute inset-y-0 right-0 pr-4 flex items-center text-green-600 hover:text-yellow-400 transition-colors">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>

            <!-- Campo de Correo -->
            <div>
                <label class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Correo electrónico</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-solid fa-envelope text-green-600"></i>
                    </div>
                    <input id="inputCorreo" type="email" name="correo" placeholder="<?php echo e(auth()->user()->email); ?>" value="<?php echo e(auth()->user()->email); ?>"
                        class="perfil-input block w-full pl-11 pr-10 py-3 rounded-xl bg-green-950/80 border border-transparent text-gray-400 cursor-not-allowed transition-all duration-300 outline-none" disabled>
                    <button type="button" class="btn-clear hidden absolute inset-y-0 right-0 pr-4 flex items-center text-green-600 hover:text-yellow-400 transition-colors">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>

            <!-- Campo de Contraseña -->
            <div class="password-group hidden transition-all duration-500 opacity-0 transform -translate-y-4">
                <label class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Nueva Contraseña (Opcional)</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-solid fa-lock text-green-600"></i>
                    </div>
                    <input id="inputContrasena" name="contrasena" type="password" placeholder="••••••••"
                        class="perfil-input block w-full pl-11 pr-12 py-3 rounded-xl bg-green-950/80 border border-transparent text-gray-400 cursor-not-allowed transition-all duration-300 outline-none" disabled>
                    <button type="button" class="btn-eye hidden absolute inset-y-0 right-0 pr-4 flex items-center text-green-600 hover:text-yellow-400 transition-colors">
                        <i class="fa-solid fa-eye eye-open"></i>
                        <i class="fa-solid fa-eye-slash eye-closed hidden"></i>
                    </button>
                </div>
            </div>

            <!-- Confirmar Contraseña -->
            <div class="password-group hidden transition-all duration-500 opacity-0 transform -translate-y-4">
                <label class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Confirmar nueva contraseña</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-solid fa-shield-check text-green-600"></i>
                    </div>
                    <input id="confirmarContrasena" name="contrasena_confirmation" type="password" placeholder="••••••••"
                        class="perfil-input block w-full pl-11 pr-12 py-3 rounded-xl bg-green-950/80 border border-transparent text-gray-400 cursor-not-allowed transition-all duration-300 outline-none" disabled>
                    <button type="button" class="btn-eye hidden absolute inset-y-0 right-0 pr-4 flex items-center text-green-600 hover:text-yellow-400 transition-colors">
                        <i class="fa-solid fa-eye eye-open"></i>
                        <i class="fa-solid fa-eye-slash eye-closed hidden"></i>
                    </button>
                </div>
            </div>

            <!-- Controles / Botones -->
            <div class="flex flex-col sm:flex-row items-center gap-4 mt-6 pt-6 border-t border-green-800/50">
                
                <!-- Botón Editar / Cancelar -->
                <button type="button" id="btnToggleEdit" class="mx-auto block group flex justify-center items-center gap-2 w-full sm:w-1/2 rounded-xl bg-green-900 border border-green-700 px-4 py-3.5 text-base font-bold text-yellow-400 hover:bg-green-800 hover:border-yellow-400 transition-all duration-300">
                    <span id="btnToggleText">Editar Perfil</span>
                    <i id="btnToggleIcon" class="fa-solid fa-pen-to-square group-hover:scale-110 transition-transform"></i>
                </button>

                <!-- Botón Guardar -->
                <button type="submit" id="btnGuardar" class="hidden group flex justify-center items-center gap-2 w-full sm:w-1/2 rounded-xl bg-yellow-400 px-4 py-3.5 text-base font-bold text-green-950 shadow-lg shadow-yellow-400/20 hover:bg-yellow-300 hover:shadow-yellow-400/40 hover:-translate-y-0.5 transition-all duration-300">
                    <span>Guardar Cambios</span>
                    <i class="fa-solid fa-floppy-disk group-hover:scale-110 transition-transform"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal para subir imagen (Rehecho con Tailwind sin jQuery) -->
<div id="uploadModal" class="fixed inset-0 flex items-center justify-center bg-black/70 backdrop-blur-sm z-50 opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="bg-green-900 border border-green-800 rounded-3xl p-8 w-full max-w-sm shadow-2xl transform scale-95 transition-transform duration-300" id="modalContent">
        <h3 class="text-2xl font-extrabold text-yellow-400 mb-6 text-center">Actualizar Avatar</h3>
        
        <form id="uploadForm" enctype="multipart/form-data" action="<?php echo e(route('perfil.update-avatar')); ?>" method="POST" class="flex flex-col gap-6">
            <?php echo csrf_field(); ?>
            <div class="relative">
                <input type="file" id="fileInput" name="image" accept="image/*" class="hidden">
                <label for="fileInput" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-green-600 rounded-2xl cursor-pointer bg-green-950/50 hover:bg-green-800/50 hover:border-yellow-400 transition-all group">
                    <i class="fa-solid fa-cloud-arrow-up text-3xl text-green-500 group-hover:text-yellow-400 mb-2 transition-colors"></i>
                    <span class="text-sm font-medium text-green-300 group-hover:text-amber-50" id="fileName">Seleccionar imagen</span>
                </label>
            </div>
            
            <div class="flex justify-between gap-4 mt-2">
                <button type="button" id="cancelBtn" class="w-1/2 py-2.5 rounded-xl font-bold text-green-200 bg-green-950 hover:bg-green-800 hover:text-white transition-colors">
                    Cancelar
                </button>
                <button type="submit" id="submitBtn" class="w-1/2 py-2.5 rounded-xl font-bold text-green-950 bg-yellow-400 hover:bg-yellow-300 shadow-lg transition-colors">
                    Subir
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Scripts unificados (Vanilla JS) -->
<script>
document.addEventListener('DOMContentLoaded', function() {

    // --- LÓGICA DEL MODO EDICIÓN ---
    const btnToggleEdit = document.getElementById('btnToggleEdit');
    const btnToggleText = document.getElementById('btnToggleText');
    const btnToggleIcon = document.getElementById('btnToggleIcon');
    const btnGuardar = document.getElementById('btnGuardar');
    
    const inputs = document.querySelectorAll('.perfil-input');
    const clearBtns = document.querySelectorAll('.btn-clear');
    const eyeBtns = document.querySelectorAll('.btn-eye');
    const passwordGroups = document.querySelectorAll('.password-group');
    
    let isEditing = false;

    btnToggleEdit.addEventListener('click', function(e) {
        e.preventDefault();
        isEditing = !isEditing;

        if (isEditing) {
            // Activar Modo Edición
            btnToggleText.textContent = 'Cancelar Edición';
            btnToggleIcon.className = 'fa-solid fa-xmark group-hover:scale-110 transition-transform';
            btnToggleEdit.classList.replace('text-yellow-400', 'text-red-400');
            btnToggleEdit.classList.replace('hover:border-yellow-400', 'hover:border-red-400');
            
            btnGuardar.classList.remove('hidden');

            // Habilitar inputs y cambiar estilos
            inputs.forEach(input => {
                input.disabled = false;
                input.classList.remove('bg-green-950/80', 'border-transparent', 'text-gray-400', 'cursor-not-allowed');
                input.classList.add('bg-green-950', 'border-green-600', 'text-amber-50', 'focus:border-yellow-400', 'focus:ring-2', 'focus:ring-yellow-400/30');
            });

            // Mostrar campos de contraseña ocultos suavemente
            passwordGroups.forEach(group => {
                group.classList.remove('hidden');
                // Pequeño timeout para permitir que el display:block se aplique antes de animar opacidad
                setTimeout(() => {
                    group.classList.remove('opacity-0', '-translate-y-4');
                    group.classList.add('opacity-100', 'translate-y-0');
                }, 10);
            });

            clearBtns.forEach(btn => btn.classList.remove('hidden'));
            eyeBtns.forEach(btn => btn.classList.remove('hidden'));

        } else {
            // Cancelar Edición
            btnToggleText.textContent = 'Editar Perfil';
            btnToggleIcon.className = 'fa-solid fa-pen-to-square group-hover:scale-110 transition-transform';
            btnToggleEdit.classList.replace('text-red-400', 'text-yellow-400');
            btnToggleEdit.classList.replace('hover:border-red-400', 'hover:border-yellow-400');
            
            btnGuardar.classList.add('hidden');

            // Deshabilitar inputs
            inputs.forEach(input => {
                input.disabled = true;
                input.classList.add('bg-green-950/80', 'border-transparent', 'text-gray-400', 'cursor-not-allowed');
                input.classList.remove('bg-green-950', 'border-green-600', 'text-amber-50', 'focus:border-yellow-400', 'focus:ring-2', 'focus:ring-yellow-400/30');
                
                // Si es contraseña, resetear valor al cancelar
                if(input.type === 'password' || input.name === 'contrasena') {
                    input.value = '';
                }
            });

            // Ocultar contraseñas suavemente
            passwordGroups.forEach(group => {
                group.classList.remove('opacity-100', 'translate-y-0');
                group.classList.add('opacity-0', '-translate-y-4');
                setTimeout(() => {
                    if(!isEditing) group.classList.add('hidden');
                }, 500); // Esperar que termine la transición
            });

            clearBtns.forEach(btn => btn.classList.add('hidden'));
            eyeBtns.forEach(btn => btn.classList.add('hidden'));
        }
    });

    // --- LÓGICA DE BOTONES INTERNOS (X y Ojito) ---
    clearBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const input = this.previousElementSibling;
            input.value = '';
            input.focus();
        });
    });

    eyeBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const input = this.previousElementSibling;
            const eyeOpen = this.querySelector('.eye-open');
            const eyeClosed = this.querySelector('.eye-closed');

            if (input.type === 'password') {
                input.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                input.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        });
    });

    // --- LÓGICA DEL MODAL DE IMAGEN (Vanilla JS) ---
    const profilePic = document.getElementById('profilePic');
    const uploadModal = document.getElementById('uploadModal');
    const modalContent = document.getElementById('modalContent');
    const cancelBtn = document.getElementById('cancelBtn');
    const uploadForm = document.getElementById('uploadForm');
    const fileInput = document.getElementById('fileInput');
    const fileNameDisplay = document.getElementById('fileName');

    // Abrir Modal
    profilePic.addEventListener('click', () => {
        uploadModal.classList.remove('opacity-0', 'pointer-events-none');
        modalContent.classList.remove('scale-95');
        modalContent.classList.add('scale-100');
    });

    // Cerrar Modal
    function closeModal() {
        uploadModal.classList.add('opacity-0', 'pointer-events-none');
        modalContent.classList.remove('scale-100');
        modalContent.classList.add('scale-95');
        // Resetear input
        setTimeout(() => {
            fileInput.value = '';
            fileNameDisplay.textContent = 'Seleccionar imagen';
        }, 300);
    }

    cancelBtn.addEventListener('click', closeModal);
    
    // Cerrar al hacer clic fuera del modal
    uploadModal.addEventListener('click', (e) => {
        if (e.target === uploadModal) closeModal();
    });

    // Mostrar nombre del archivo seleccionado
    fileInput.addEventListener('change', function() {
        if (this.files && this.files.length > 0) {
            fileNameDisplay.textContent = this.files[0].name;
            fileNameDisplay.classList.add('text-yellow-400');
        } else {
            fileNameDisplay.textContent = 'Seleccionar imagen';
            fileNameDisplay.classList.remove('text-yellow-400');
        }
    });

    // Enviar formulario de imagen
    uploadForm.addEventListener('submit', function(e) {
        // Permitimos el envío nativo, pero podemos dar feedback de carga aquí si quisiéramos
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Subiendo...';
        submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
    });

});
</script>

<!-- Si tu perfil.js externo tenía más funciones necesarias, déjalo. Si todo lo que hacía está cubierto arriba, puedes borrar esta línea -->
<!-- <script src="<?php echo e(asset('js/perfil.js')); ?>"></script> -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/FIESTARIOJA/fiestarioja/resources/views/perfil.blade.php ENDPATH**/ ?>