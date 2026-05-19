<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FiestaRioja - Restablecer Contraseña</title>

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

    <!-- Contenedor Principal -->
    <div class="flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 w-full z-10">

        <!-- Tarjeta -->
        <div class="w-full max-w-md bg-green-900/40 backdrop-blur-sm p-8 sm:p-10 rounded-3xl shadow-2xl border border-green-800/50">

            <!-- Cabecera -->
            <div class="text-center mb-8">
                <img class="mx-auto h-28 sm:h-36 w-auto hover:scale-105 transition-transform duration-500 drop-shadow-lg mb-6"
                    src="{{ asset('images/logos/LOG_TEXT_AMARILLO.png') }}" alt="Logo FiestaRioja">
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-yellow-400 drop-shadow-md">
                    Restablecer contraseña
                </h2>
                <p class="text-green-200 mt-2 text-sm">Introduce tu nueva contraseña</p>
            </div>

            <!-- Formulario -->
            <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">
                        Email de la cuenta
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-envelope text-green-600"></i>
                        </div>
                        <input id="email" type="email" name="email" required autocomplete="email"
                            value="{{ $email ?? old('email') }}"
                            class="block w-full pl-11 pr-4 py-3 rounded-xl bg-green-950/50 border @error('email') border-red-500 @else border-green-800 @enderror text-amber-50 placeholder-green-700 focus:bg-green-950 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/30 transition-all duration-300 outline-none"
                            placeholder="tu@correo.com">
                    </div>
                    @error('email')
                        <p class="mt-1 ml-1 text-xs text-red-400 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nueva contraseña -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">
                        Nueva contraseña
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-green-600"></i>
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="block w-full pl-11 pr-4 py-3 rounded-xl bg-green-950/50 border @error('password') border-red-500 @else border-green-800 @enderror text-amber-50 placeholder-green-700 focus:bg-green-950 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/30 transition-all duration-300 outline-none"
                            placeholder="••••••••">
                    </div>
                    @error('password')
                        <p class="mt-1 ml-1 text-xs text-red-400 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirmar contraseña -->
                <div>
                    <label for="password-confirm" class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">
                        Confirmar contraseña
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock-open text-green-600"></i>
                        </div>
                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                            class="block w-full pl-11 pr-4 py-3 rounded-xl bg-green-950/50 border border-green-800 text-amber-50 placeholder-green-700 focus:bg-green-950 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/30 transition-all duration-300 outline-none"
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- Botón Submit -->
                <div class="pt-4">
                    <button type="submit"
                        class="group flex w-full justify-center items-center gap-2 rounded-xl bg-yellow-400 px-4 py-3.5 text-base font-bold text-green-950 shadow-lg shadow-yellow-400/20 hover:bg-yellow-300 hover:shadow-yellow-400/40 hover:-translate-y-0.5 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-400 transition-all duration-300">
                        <span>RESTABLECER CONTRASEÑA</span>
                        <i class="fa-solid fa-key group-hover:rotate-12 transition-transform"></i>
