<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FiestaRioja - Iniciar Sesión</title>
    
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('images/logos/LOG_TEXT_AMARILLO.png')); ?>" type="image/png">
    
    <!-- Fuentes e Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active{
            -webkit-box-shadow: 0 0 0 30px #14532d inset !important;
            -webkit-text-fill-color: #fef3c7 !important;
            transition: background-color 5000s ease-in-out 0s;
        }
    </style>
</head>
<body class="bg-green-950 font-sans text-gray-100 min-h-screen flex flex-col justify-center relative overflow-x-hidden selection:bg-yellow-400 selection:text-green-950 py-12">

    <!-- Alertas Flash -->
    <div id="alert-container" class="fixed top-4 inset-x-0 mx-auto w-full max-w-md z-50 flex flex-col gap-3 px-4 sm:px-0">
        <?php if(session('error')): ?>
            <div class="alert flex w-full shadow-2xl rounded-xl overflow-hidden animate__animated animate__fadeInDown border border-red-500/30">
                <div class="bg-red-600 w-16 flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-circle-xmark text-white text-2xl"></i>
                </div>
                <div class="p-4 bg-red-900/95 backdrop-blur-md flex justify-between items-center w-full">
                    <div class="text-red-50 font-medium"><?php echo e(session('error')); ?></div>
                    <button onclick="closeAlert(this)" class="text-red-400 hover:text-white transition-colors ml-4 focus:outline-none">
                        <i class="fa-solid fa-xmark text-xl"></i>
                    </button>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Botón Volver -->
    <div class="absolute top-6 left-6 z-20">
        <button onclick="window.history.back()" class="group flex items-center gap-2 px-4 py-2 text-sm font-bold text-amber-50 bg-green-900/50 border border-green-800 rounded-full shadow-md hover:bg-yellow-400 hover:text-green-950 hover:border-yellow-400 focus:outline-none transition-all duration-300">
            <i class="fa-solid fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
            <span class="hidden sm:block">VOLVER</span>
        </button>
    </div>

    <!-- Contenedor Principal -->
    <div class="flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 w-full z-10">
        
        <!-- Tarjeta del Formulario -->
        <div class="w-full max-w-md bg-green-900/40 backdrop-blur-sm p-8 sm:p-10 rounded-3xl shadow-2xl border border-green-800/50">
            
            <!-- Cabecera -->
            <div class="text-center mb-8">
                <img class="mx-auto h-28 sm:h-36 w-auto hover:scale-105 transition-transform duration-500 drop-shadow-lg mb-6" src="<?php echo e(asset('images/logos/LOG_TEXT_AMARILLO.png')); ?>" alt="Logo FiestaRioja">
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-yellow-400 drop-shadow-md">
                    Bienvenido de nuevo
                </h2>
                <p class="text-green-200 mt-2 text-sm">Inicia sesión para continuar</p>
            </div>

            <!-- Formulario de Inicio de Sesión Único -->
            <div id="usuarioForm">
                <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-5">
                    <?php echo csrf_field(); ?>
                    <!-- Email -->
                    <div>
                        <label for="emailUsuario" class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">
                            Email de la cuenta
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-solid fa-envelope text-green-600"></i>
                            </div>
                            <input id="emailUsuario" type="email" name="email" required autocomplete="email"
                                class="block w-full pl-11 pr-4 py-3 rounded-xl bg-green-950/50 border border-green-800 text-amber-50 placeholder-green-700 focus:bg-green-950 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/30 transition-all duration-300 outline-none"
                                placeholder="tu@correo.com">
                        </div>
                    </div>

                    <!-- Contraseña -->
                    <div>
                        <label for="passwordUsuario" class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">
                            Contraseña
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-solid fa-lock text-green-600"></i>
                            </div>
                            <input id="passwordUsuario" type="password" name="password" required autocomplete="current-password"
                                class="block w-full pl-11 pr-4 py-3 rounded-xl bg-green-950/50 border border-green-800 text-amber-50 placeholder-green-700 focus:bg-green-950 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/30 transition-all duration-300 outline-none"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Botón Submit -->
                    <div class="pt-4">
                        <button type="submit" class="group flex w-full justify-center items-center gap-2 rounded-xl bg-yellow-400 px-4 py-3.5 text-base font-bold text-green-950 shadow-lg shadow-yellow-400/20 hover:bg-yellow-300 hover:shadow-yellow-400/40 hover:-translate-y-0.5 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-400 transition-all duration-300">
                            <span>INICIAR SESIÓN</span>
                            <i class="fa-solid fa-arrow-right-to-bracket group-hover:translate-x-1 transition-transform"></i>
                        </button>
                    </div>

                    <!-- Link Registro -->
                    <div class="mt-6 text-center text-sm text-green-300">
                        ¿No tienes cuenta? 
                        <a href="<?php echo e(route('register')); ?>" class="font-bold text-yellow-400 hover:text-yellow-300 hover:underline transition-all">
                            Regístrate aquí
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lógica de las alertas (Cierre manual)
            window.closeAlert = function(button) {
                const alert = button.closest('.alert');
                if (alert) {
                    alert.classList.remove('animate__fadeInDown');
                    alert.classList.add('animate__fadeOutUp');
                    setTimeout(() => alert.remove(), 800);
                }
            };

            // Autocerrar alertas a los 5 segundos
            setTimeout(() => {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    if(alert) {
                        alert.classList.remove('animate__fadeInDown');
                        alert.classList.add('animate__fadeOutUp');
                        setTimeout(() => alert.remove(), 800);
                    }
                });
            }, 5000);
        });
    </script>
</body>
</html><?php /**PATH C:\UniServerZ\www\FIESTARIOJA\fiestarioja\resources\views/auth/login.blade.php ENDPATH**/ ?>