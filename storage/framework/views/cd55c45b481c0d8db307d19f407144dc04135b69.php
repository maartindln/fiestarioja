<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>FiestaRioja</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link rel="icon" href="#" type="image/png">
        <script src="https://cdn.tailwindcss.com"></script>
         <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;800&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            inter: ['Inter', 'sans-serif'],
                        },
                    },
                },
            };
        </script>
    </head>

    <nav class="bg-green-950 sticky top-0 z-50 border-b border-yellow-400">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">

        <!-- Botón Menú Móvil -->
        <div class="flex sm:hidden">
            <button id="mobile-menu-button" class="group inline-flex w-12 h-12 text-slate-800 bg-white text-center items-center justify-center rounded shadow-[0_1px_0_theme(colors.slate.950/.04),0_1px_2px_theme(colors.slate.950/.12),inset_0_-2px_0_theme(colors.slate.950/.04)] hover:shadow-[0_1px_0_theme(colors.slate.950/.04),0_4px_8px_theme(colors.slate.950/.12),inset_0_-2px_0_theme(colors.slate.950/.04)] transition" aria-pressed="false" onclick="this.setAttribute('aria-pressed', !(this.getAttribute('aria-pressed') === 'true'))">
                <span class="sr-only">Menu</span>
                    <svg class="w-6 h-6 fill-current pointer-events-none" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <rect class="origin-center -translate-y-[5px] translate-x-[7px] transition-all duration-300 ease-[cubic-bezier(.5,.85,.25,1.1)] group-[[aria-pressed=true]]:translate-x-0 group-[[aria-pressed=true]]:translate-y-0 group-[[aria-pressed=true]]:rotate-[315deg]" y="7" width="9" height="2" rx="1"></rect>
                        <rect class="origin-center transition-all duration-300 ease-[cubic-bezier(.5,.85,.25,1.8)] group-[[aria-pressed=true]]:rotate-45" y="7" width="16" height="2" rx="1"></rect>
                        <rect class="origin-center translate-y-[5px] transition-all duration-300 ease-[cubic-bezier(.5,.85,.25,1.1)] group-[[aria-pressed=true]]:translate-y-0 group-[[aria-pressed=true]]:rotate-[135deg]" y="7" width="9" height="2" rx="1"></rect>
                    </svg>
            </button>
        </div>

        <!-- Logo -->
        <div class="flex items-center">
            <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Logo" />
        </div>

        <!-- Navegación Escritorio -->
        <div class="hidden sm:flex space-x-4">
            <a href="#" class="bg-amber-50 text-black px-3 py-2 rounded-md text-sm font-bold">Inicio</a>
            <a href="#" class="text-amber-50 hover:bg-green-600 px-3 py-2 rounded-md text-sm font-medium">Calendario</a>
            <a href="#" class="text-amber-50 hover:bg-green-600 px-3 py-2 rounded-md text-sm font-medium">Listado</a>
        </div>

        <!-- Perfil -->
       <div class="relative ml-3 group">
        <button id="profile-button" class="flex items-center text-sm rounded-full">
            <a href="<?php echo e(route('login')); ?>"></a>
            <img class="h-8 w-8 rounded-full transition-all duration-300 group-hover:h-10 group-hover:w-10" src="images/default-profile.jpg" alt="User" />
        </button>
        <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20 transition-all origin-top-right duration-150 ease-out">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Perfil</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Administración</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cerrar sesión</a>
        </div>
        </div>
        </div>
    </div>

    <!-- Menú móvil -->
    <div id="mobile-menu" class="sm:hidden hidden px-4 pt-2 pb-3 space-y-1 transition-all duration-300 ease-in-out">
        <a href="#" class="block text-black bg-amber-50 px-3 py-2 rounded-md text-base font-medium">Inicio</a>
        <a href="#" class="block text-amber-50 px-3 py-2 rounded-md text-base font-medium">Calendario</a>
        <a href="#" class="block text-amber-50 px-3 py-2 rounded-md text-base font-medium">Listado</a>
    </div>
    </nav>

    <body class="bg-green-950">
        <?php echo $__env->yieldContent('content'); ?>
    </body>

    <footer class="bg-green-950 text-amber-50 p-10 text-center">
        <!-- Enlaces principales -->
        <nav class="grid grid-flow-col gap-6 mb-6 justify-center">
            <a href="#" class="text-amber-50 hover:underline hover:text-gray-300 transition">About us</a>
            <a href="#" class="text-amber-50 hover:underline hover:text-gray-300 transition">Contact</a>
            <a href="#" class="text-amber-50 hover:underline hover:text-gray-300 transition">Jobs</a>
            <a href="#" class="text-amber-50 hover:underline hover:text-gray-300 transition">Press kit</a>
        </nav>

        <!-- Redes sociales -->
        <div class="flex justify-center gap-6 mb-6">
            <a href="https://www.x.com" class="text-amber-50 hover:text-blue-500 transition">
                <i class="fa-brands fa-twitter text-3xl"></i>
            </a>

            <a href="https://www.instagram.com" class="text-amber-50 hover:text-pink-600 transition">
                <i class="fa-brands fa-instagram text-3xl"></i>
            </a>

            <a href="https://www.facebook.com" class="text-amber-50 hover:text-blue-700 transition">
                <i class="fa-brands fa-facebook-f text-3xl"></i>
            </a>
        </div>

        <!-- Pie de página -->
        <p class="text-sm text-amber-50">&copy; 2025 - All rights reserved by ACME Industries Ltd</p>
    </footer>
    <a href="#" class="back-to-top rounded text-center" id="back-to-top">
        <i class="fa-solid fa-arrow-up"></i>
    </a>

</html>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script>
    const menuBtn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');
    const openIcon = document.getElementById('menu-open-icon');
    const closeIcon = document.getElementById('menu-close-icon');

    const profileBtn = document.getElementById('profile-button');
    const profileDropdown = document.getElementById('profile-dropdown');

    let isDropdownOpen = false;

    menuBtn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        openIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });

    function openDropdown() {
        profileDropdown.classList.remove('hidden');
        profileDropdown.classList.add('block');
        isDropdownOpen = true;
    }

    function closeDropdown() {
        profileDropdown.classList.remove('block');
        profileDropdown.classList.add('hidden');
        isDropdownOpen = false;
    }

    profileBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        if (isDropdownOpen) {
            closeDropdown();
        } else {
            openDropdown();
        }
    });

    document.addEventListener('click', (e) => {
        if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
        closeDropdown();
        }
    });
</script>
<?php /**PATH C:\UniServerZ\www\FIESTARIOJA\fiestarioja\resources\views/layout.blade.php ENDPATH**/ ?>