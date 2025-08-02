<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="<?php echo e(asset('images/logos/LOG_TEXT_AMARILLO.png')); ?>" type="image/png">
    <title>FiestaRioja - Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-green-950 flex flex-col justify-center min-h-screen py-12">

<?php if(session('error')): ?>
    <div class="alert flex fixed inset-x-0 top-0 mx-auto mt-4 w-fit max-w-md z-50 w-96 shadow-lg rounded-lg animate__animated animate__fadeInDown">
        <div class="bg-red-600 py-4 px-6 rounded-l-lg flex items-center">
            <i class="fa-solid fa-circle-xmark text-white text-2xl"></i>
        </div>
        <div class="px-4 py-6 bg-white rounded-r-lg flex justify-between items-center w-full border border-l-transparent border-gray-200">
        <div><?php echo e(session('error')); ?></div>
            <button onclick="closeAlert(this)">
                <i class="fa-solid fa-xmark mr-4 ml-4"></i>
            </button>
        </div>
    </div>
<?php endif; ?>


    
    <div class="absolute top-6 left-6">
        <button onclick="window.history.back()" class="px-4 py-2 text-sm font-semibold text-green-950 bg-yellow-400 border-2 border-yellow-400 rounded-md shadow-md hover:bg-yellow-500 focus:outline-none">
            VOLVER
        </button>
    </div>

    
    <div class="flex justify-center items-center px-6 lg:px-8">
        <div class="w-full max-w-md lg:max-w-xl">
            <img class="mx-auto max-h-40 sm:max-h-64 w-auto" src="<?php echo e(asset('images/logos/LOG_TEXT_AMARILLO.png')); ?>" alt="<?php echo e(__('eskutik.login_logo_alt')); ?>">

            <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-yellow-400">
                Iniciar sesión en tu cuenta
            </h2>

            <div class="flex mt-7 border bg-yellow-200 relative">
                <button type="button" id="usuarioBtn" class="px-4 py-2 w-1/2 text-green-950 font-semibold hover:bg-pink-200 relative">
                    <p class="relative z-10">Usuario</p>
                </button>
                <button type="button" id="centroBtn" class="px-4 py-2 w-1/2 text-green-950 font-semibold hover:bg-pink-200 relative">
                    <p class="relative z-10">Centro</p>
                </button>
                <div id="indicator" class="absolute w-1/2 h-10 bg-yellow-400 transition-all duration-300"></div>
            </div>

            <!-- Formulario para Usuario -->
            <div id="usuarioForm" class="mt-10">
                <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label for="emailUsuario" class="block text-sm font-medium text-yellow-400">
                            Email de la cuenta:
                        </label>
                        <div class="mt-2">
                            <input id="emailUsuario" type="email" name="email" required autocomplete="email" class="block w-full rounded-md bg-amber-50 border-2 border-yellow-400 px-3 py-1.5">
                        </div>
                    </div>
                    <div>
                        <label for="passwordUsuario" class="block text-sm font-medium text-yellow-400">
                            Contraseña de la cuenta:
                        </label>
                        <div class="mt-2">
                            <input id="passwordUsuario" type="password" name="password" required autocomplete="current-password" class="block w-full rounded-md bg-amber-50 border-2 border-yellow-400 px-3 py-1.5">
                        </div>
                    </div>
                    <p class="text-amber-50 text-right">Si todavía no tienes cuenta, <a href="<?php echo e(route('register')); ?>" class="text-yellow-400 underline hover:text-yellow-200">registrate aquí.</a></p>
                    <div>
                        <button type="submit" class="w-full rounded-md bg-yellow-400 px-3 py-1.5 text-sm font-semibold text-green-950 hover:bg-yellow-500">
                            INICIAR SESIÓN
                        </button>
                    </div>
                </form>
            </div>

            <!-- Formulario para Centro -->
            <div id="centroForm" class="mt-10 hidden">
                <form method="POST" action="" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label for="codigoCentro" class="block text-sm font-medium text-yellow-400">
                            <?php echo e(__('eskutik.login_center_label_center')); ?>

                        </label>
                        <div class="mt-2">
                            <select id="codigoCentro" name="codigoCentro" required class="block w-full rounded-md bg-white border-2 border-teal-400 px-3 py-1.5">
                                <option value="" disabled selected><?php echo e(__('eskutik.login_center_option_select')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="codigo" class="block text-sm font-medium text-gray-900">
                            <?php echo e(__('eskutik.login_center_label_code')); ?>

                        </label>
                        <div class="mt-2">
                            <input id="codigo" type="password" name="codigo" required class="block w-full rounded-md bg-white border-2 border-teal-400 px-3 py-1.5">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="w-full rounded-md bg-pink-500 px-3 py-1.5 text-sm font-semibold text-white hover:bg-pink-200">
                            <?php echo e(__('eskutik.login_button')); ?>

                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091
                     1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982
                     1.566zM8 5c.535 0 .954.462.9.995l-.35
                     3.507a.552.552 0 0 1-1.1 0L7.1
                     5.995A.905.905 0 0 1 8 5zm.002
                     6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const usuarioBtn = document.getElementById('usuarioBtn');
            const centroBtn = document.getElementById('centroBtn');
            const usuarioForm = document.getElementById('usuarioForm');
            const centroForm = document.getElementById('centroForm');
            const indicator = document.getElementById('indicator');

            usuarioBtn.addEventListener('click', function() {
                usuarioForm.classList.remove('hidden');
                centroForm.classList.add('hidden');
                moveIndicator(usuarioBtn);
            });

            centroBtn.addEventListener('click', function() {
                usuarioForm.classList.add('hidden');
                centroForm.classList.remove('hidden');
                moveIndicator(centroBtn);
            });

            function moveIndicator(button) {
                indicator.style.transform = `translateX(${button.offsetLeft}px)`;
            }

            moveIndicator(usuarioBtn);
        });
    </script>
</body>
</html>

<script>
    function closeAlert(button) {
        const alert = button.closest('.alert');
        if (alert) {
            alert.classList.remove('animate__fadeInDown');
            alert.classList.add('animate__fadeOutUp');
            setTimeout(() => alert.remove(), 800);
        }
    }

     setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.remove('animate__fadeInDown');
                alert.classList.add('animate__fadeOutUp');
                setTimeout(() => alert.remove(), 800);
            }
        }, 5000);
</script>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/fiestarioja/fiestarioja/resources/views/auth/login.blade.php ENDPATH**/ ?>