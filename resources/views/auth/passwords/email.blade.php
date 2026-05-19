<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FiestaRioja - Recuperar Contraseña</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('images/logos/LOG_TEXT_AMARILLO.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px #14532d inset !important;
            -webkit-text-fill-color: #fef3c7 !important;
            transition: background-color 5000s ease-in-out 0s;
        }
    </style>
</head>
<body class="bg-green-950 font-sans text-gray-100 min-h-screen flex flex-col justify-center relative overflow-x-hidden selection:bg-yellow-400 selection:text-green-950 py-12">

    @include('alerts')

    <!-- Botón Volver -->
    <div class="absolute top-6 left-6 z-20">
        <button onclick="window.history.back()" class="group flex items-center gap-2 px-4 py-2 text-sm font-bold text-amber-50 bg-green-900/50 border border-green-800 rounded-full shadow-md hover:bg-yellow-400 hover:text-green-950 hover:border-yellow-400 focus:outline-none transition-all duration-300">
            <i class="fa-solid fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
            <span class="hidden sm:block">VOLVER</span>
        </button>
    </div>

    <div class="flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 w-full z-10">
        <div class="w-full max-w-md bg-green-900/40 backdrop-blur-sm p-8 sm:p-10 rounded-3xl shadow-2xl border border-green-800/50">

            <!-- Cabecera -->
            <div class="text-center mb-8">
                <img class="mx-auto h-28 sm:h-36 w-auto hover:scale-105 transition-transform duration-500 drop-shadow-lg mb-6"
                    src="{{ asset('images/logos/LOG_TEXT_AMARILLO.png') }}" alt="Logo FiestaRioja">
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-yellow-400 drop-shadow-md">
                    Recuperar contraseña
                </h2>
                <p class="text-green-200 mt-2 text-sm">Te enviaremos un enlace para restablecerla</p>
            </div>

            <!-- Formulario -->
            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">
                        Email de la cuenta
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-envelope text-green-600"></i>
                        </div>
                        <input id="email" type="email" name="email" required autocomplete="email" autofocus
                            value="{{ old('email') }}"
                            class="block w-full pl-11 pr-4 py-3 rounded-xl bg-green-950/50 border @error('email') border-red-500 @else border-green-800 @enderror text-amber-50 placeholder-green-700 focus:bg-green-950 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/30 transition-all duration-300 outline-none"
                            placeholder="tu@correo.com">
                    </div>
                    @error('email')
                        <p class="mt-1 ml-1 text-xs text-red-400 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="group flex w-full justify-center items-center gap-2 rounded-xl bg-yellow-400 px-4 py-3.5 text-base font-bold text-green-950 shadow-lg shadow-yellow-400/20 hover:bg-yellow-300 hover:shadow-yellow-400/40 hover:-translate-y-0.5 transition-all duration-300">
                        <span>ENVIAR ENLACE</span>
                        <i class="fa-solid fa-paper-plane group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                    </button>
                </div>

                <div class="mt-6 text-center text-sm text-green-300">
                    ¿Recuerdas tu contraseña?
                    <a href="{{ route('login') }}" class="font-bold text-yellow-400 hover:text-yellow-300 hover:underline transition-all">
                        Inicia sesión
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
