<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FiestaRioja - <?php echo $__env->yieldContent('titulo'); ?></title>
    
    <link rel="icon" href="<?php echo e(asset('images/logos/LOG_TEXT_AMARILLO.png')); ?>" type="image/png">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        fiesta: {
                            green: '#14532d',
                            yellow: '#facc15',
                        }
                    }
                },
            },
        };
    </script>
</head>

<body class="bg-green-950 flex flex-col min-h-screen text-amber-50 font-sans selection:bg-yellow-400 selection:text-green-950">

    <nav x-data="{ mobileMenuOpen: false, profileDropdownOpen: false }" class="bg-green-950 sticky top-0 z-50 border-b border-yellow-400/50 shadow-md backdrop-blur-md bg-opacity-95">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center">

                <div class="flex flex-1 items-center justify-start">
                    <div class="flex sm:hidden mr-2">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-yellow-400 hover:text-white hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-yellow-400 transition-colors">
                            <span class="sr-only">Abrir menú principal</span>
                            <svg x-show="!mobileMenuOpen" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <svg x-show="mobileMenuOpen" style="display: none;" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="shrink-0">
                        <a href="<?php echo e(route('index')); ?>" class="group flex items-center gap-2">
                            <img class="h-10 w-auto group-hover:scale-105 transition-transform drop-shadow-md" src="<?php echo e(asset('images/logos/LOG_TEXT_AMARILLO.png')); ?>" alt="FiestaRioja Logo" />
                        </a>
                    </div>
                </div>

                <div class="hidden sm:flex items-center justify-center space-x-1 lg:space-x-4 shrink-0 px-2">
                    <a href="<?php echo e(route('index')); ?>" class="<?php echo e(request()->routeIs('index') ? 'bg-yellow-400 text-green-950 shadow-sm' : 'text-amber-50/90 hover:bg-green-800 hover:text-white'); ?> px-4 py-2 rounded-lg text-sm font-semibold transition-all">
                        Inicio
                    </a>
                    <a href="<?php echo e(route('calendar')); ?>" class="<?php echo e(request()->routeIs('calendar') ? 'bg-yellow-400 text-green-950 shadow-sm' : 'text-amber-50/90 hover:bg-green-800 hover:text-white'); ?> px-4 py-2 rounded-lg text-sm font-semibold transition-all">
                        Calendario
                    </a>
                    <a href="<?php echo e(route('list')); ?>" class="<?php echo e(request()->routeIs('list') ? 'bg-yellow-400 text-green-950 shadow-sm' : 'text-amber-50/90 hover:bg-green-800 hover:text-white'); ?> px-4 py-2 rounded-lg text-sm font-semibold transition-all">
                        Pueblos
                    </a>
                </div>

                <div class="flex flex-1 items-center justify-end">
                    <div class="relative ml-3 shrink-0">
                        <?php if(auth()->guard()->check()): ?>
                            <button @click="profileDropdownOpen = !profileDropdownOpen" @click.away="profileDropdownOpen = false" type="button" class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 focus:ring-offset-green-950 transition-all">
                                <span class="sr-only">Abrir menú de usuario</span>
                                <div class="relative w-9 h-9 sm:w-10 sm:h-10 rounded-full border-2 border-yellow-400 overflow-hidden hover:scale-105 transition-transform">
                                    <?php if(Auth::user()->avatar): ?>
                                        <img class="w-full h-full object-cover" src="<?php echo e(asset('storage/' . Auth::user()->avatar)); ?>" alt="Avatar de usuario"/>
                                    <?php else: ?>
                                        <img class="w-full h-full object-cover" src="<?php echo e(asset('images/default-profile.jpg')); ?>" alt="Avatar por defecto"/>
                                    <?php endif; ?>
                                </div>
                            </button>

                            <div x-show="profileDropdownOpen" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 style="display: none;"
                                 class="absolute right-0 mt-3 w-56 origin-top-right rounded-xl bg-green-900 border border-green-700 shadow-2xl py-2 z-50 ring-1 ring-black ring-opacity-5">
                                
                                <div class="px-4 py-3 border-b border-green-800/50">
                                    <p class="text-sm font-medium text-green-300">Conectado como</p>
                                    <p class="text-sm font-bold text-amber-50 truncate"><?php echo e(Auth::user()->name); ?></p>
                                </div>

                                <a href="<?php echo e(route('perfil')); ?>" class="group flex items-center px-4 py-2.5 text-sm text-amber-50/90 hover:bg-green-800 hover:text-white transition-colors">
                                    <i class="fa-solid fa-user-circle w-5 text-center mr-3 text-yellow-400 group-hover:scale-110 transition-transform"></i>
                                    Mi Perfil
                                </a>
                                
                                <?php
                                    $admin = DB::table('users')->where('email', Auth::user()->email)->where('role', 'Administrador')->first();
                                ?>
                                
                                <?php if($admin): ?>
                                    <a href="<?php echo e(route('admin')); ?>" class="group flex items-center px-4 py-2.5 text-sm text-amber-50/90 hover:bg-green-800 hover:text-white transition-colors">
                                        <i class="fa-solid fa-shield-halved w-5 text-center mr-3 text-yellow-400 group-hover:scale-110 transition-transform"></i>
                                        Administración
                                    </a>
                                <?php endif; ?>
                                
                                <div class="border-t border-green-800/50 mt-1"></div>
                                
                                <form method="POST" action="<?php echo e(route('logout')); ?>" class="mt-1">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="group flex w-full items-center px-4 py-2.5 text-sm text-red-300 hover:bg-red-900/40 hover:text-red-100 transition-colors">
                                        <i class="fa-solid fa-arrow-right-from-bracket w-5 text-center mr-3 text-red-400 group-hover:-translate-x-1 transition-transform"></i>
                                        Cerrar sesión
                                    </button>
                                </form>
                            </div>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="inline-flex items-center gap-2 bg-yellow-400 text-green-950 hover:bg-yellow-300 hover:shadow-lg px-4 py-2 sm:px-5 sm:py-2.5 rounded-lg text-sm font-bold transition-all hover:-translate-y-0.5">
                                <i class="fa-solid fa-user hidden sm:block"></i>
                                Entrar
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             style="display: none;"
             class="sm:hidden border-t border-green-800 bg-green-950/95 backdrop-blur-md absolute w-full shadow-xl">
            <div class="space-y-1 px-4 pb-4 pt-3">
                <a href="<?php echo e(route('index')); ?>" class="<?php echo e(request()->routeIs('index') ? 'bg-yellow-400 text-green-950' : 'text-amber-50 hover:bg-green-800'); ?> block rounded-md px-3 py-3 text-base font-bold transition-colors">
                    <i class="fa-solid fa-house w-6 text-center mr-2 opacity-80"></i> Inicio
                </a>
                <a href="<?php echo e(route('calendar')); ?>" class="<?php echo e(request()->routeIs('calendar') ? 'bg-yellow-400 text-green-950' : 'text-amber-50 hover:bg-green-800'); ?> block rounded-md px-3 py-3 text-base font-bold transition-colors">
                    <i class="fa-solid fa-calendar-days w-6 text-center mr-2 opacity-80"></i> Calendario
                </a>
                <a href="<?php echo e(route('list')); ?>" class="<?php echo e(request()->routeIs('list') ? 'bg-yellow-400 text-green-950' : 'text-amber-50 hover:bg-green-800'); ?> block rounded-md px-3 py-3 text-base font-bold transition-colors">
                    <i class="fa-solid fa-map-location-dot w-6 text-center mr-2 opacity-80"></i> Pueblos
                </a>
            </div>
        </div>
    </nav>

    <main class="flex-grow w-full">
        <div id="alert-container" class="fixed top-20 inset-x-0 mx-auto w-full max-w-md z-40 px-4 sm:px-0">
            <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer class="bg-green-950 border-t border-green-900 pt-12 pb-8 px-4 sm:px-6 lg:px-8 mt-auto">
        <div class="max-w-7xl mx-auto flex flex-col items-center">
            <div class="mb-8 opacity-80 hover:opacity-100 transition-opacity">
                <img class="h-12 w-auto grayscale" src="<?php echo e(asset('images/logos/LOG_TEXT_AMARILLO.png')); ?>" alt="FiestaRioja Logo" />
            </div>

            <nav class="flex flex-wrap justify-center gap-x-8 gap-y-4 mb-10 text-sm font-medium">
                <a href="#" class="text-green-300 hover:text-yellow-400 transition-colors">Sobre nosotros</a>
                <a href="" class="text-green-300 hover:text-yellow-400 transition-colors">Contacto</a>
                <a href="<?php echo e(route('priv')); ?>" class="text-green-300 hover:text-yellow-400 transition-colors">Políticas de Privacidad</a>
                <a href="#" class="text-green-300 hover:text-yellow-400 transition-colors">Términos de Uso</a>
            </nav>

            <div class="flex justify-center gap-6 mb-10">
                <a href="#" class="w-10 h-10 rounded-full bg-green-900 flex items-center justify-center text-green-400 hover:bg-yellow-400 hover:text-green-950 hover:scale-110 transition-all shadow-sm">
                    <span class="sr-only">Twitter</span>
                    <i class="fa-brands fa-x-twitter text-lg"></i>
                </a>
                <a href="https://www.instagram.com/fiestarioja" target="_blank" class="w-10 h-10 rounded-full bg-green-900 flex items-center justify-center text-green-400 hover:bg-pink-500 hover:text-white hover:scale-110 transition-all shadow-sm">
                    <span class="sr-only">Instagram</span>
                    <i class="fa-brands fa-instagram text-xl"></i>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-green-900 flex items-center justify-center text-green-400 hover:bg-blue-600 hover:text-white hover:scale-110 transition-all shadow-sm">
                    <span class="sr-only">Facebook</span>
                    <i class="fa-brands fa-facebook-f text-lg"></i>
                </a>
            </div>

            <p class="text-xs text-green-500/70 text-center">
                &copy; <?php echo e(date('Y')); ?> FiestaRioja. Todos los derechos reservados.
            </p>
        </div>
    </footer>

    <div x-data="{ showTopBtn: false }" 
         @scroll.window="showTopBtn = (window.pageYOffset > 300) ? true : false"
         class="fixed bottom-8 right-8 z-40">
        
        <button x-show="showTopBtn" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-8"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-8"
                style="display: none;"
                @click="window.scrollTo({top: 0, behavior: 'smooth'})" 
                class="w-12 h-12 bg-yellow-400 text-green-950 rounded-full shadow-lg shadow-yellow-400/20 flex items-center justify-center hover:bg-yellow-300 hover:shadow-yellow-400/40 hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition-all"
                title="Volver arriba">
            <i class="fa-solid fa-arrow-up text-xl"></i>
        </button>
    </div>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 50,
        });
    </script>
</body>
</html><?php /**PATH C:\UniServerZ\www\FIESTARIOJA\fiestarioja\resources\views/layout.blade.php ENDPATH**/ ?>