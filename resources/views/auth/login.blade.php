<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="images/png/logo.png" type="image/png">
    <title>{{ __('eskutik.login_title') }}</title>
</head>
<body class="bg-gray-50 flex flex-col justify-center min-h-screen py-12">

    @if (session('error'))
    <div class="alert alert-error d-flex align-items-center" role="alert"
        style="position: fixed; top: 14%; left: 50%; transform: translate(-50%, -50%);
               width: 60%; max-width: 600px; margin: 0; z-index: 1050;
               justify-content: center; text-align: center; border-radius: 15px; padding: 10px;
               background-color: #f8d7da; color: #721c24; display: flex; align-items: center;">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Error"
             style="margin-right: 10px;">
            <use xlink:href="#exclamation-triangle-fill" />
        </svg>
        <div style="padding: 0;">
            {{ session('error') }}
        </div>
    </div>
@endif


    {{-- Botón "Atrás" --}}
    <div class="absolute top-6 left-6">
        <button onclick="window.history.back()" class="px-4 py-2 text-sm font-semibold text-pink-500 bg-white border-2 border-pink-500 rounded-md shadow-md hover:bg-pink-200 focus:outline-none">
            {{ __('eskutik.login_back') }}
        </button>
    </div>

    {{-- Contenido principal del login --}}
    <div class="flex justify-center items-center px-6 lg:px-8">
        <div class="w-full max-w-md lg:max-w-xl">
            <img class="mx-auto max-h-40 sm:max-h-64 w-auto" src="images/png/logo.png" alt="{{ __('eskutik.login_logo_alt') }}">

            <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">
                {{ __('eskutik.login_heading') }}
            </h2>

            <div class="flex mt-7 border bg-white relative">
                <button type="button" id="usuarioBtn" class="px-4 py-2 w-1/2 text-black font-semibold hover:bg-pink-200 relative">
                    <p class="relative z-10">{{ __('eskutik.login_tab_user') }}</p>
                </button>
                <button type="button" id="centroBtn" class="px-4 py-2 w-1/2 text-black font-semibold hover:bg-pink-200 relative">
                    <p class="relative z-10">{{ __('eskutik.login_tab_center') }}</p>
                </button>
                <div id="indicator" class="absolute w-1/2 h-10 bg-pink-300 transition-all duration-300"></div>
            </div>

            <!-- Formulario para Usuario -->
            <div id="usuarioForm" class="mt-10">
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="emailUsuario" class="block text-sm font-medium text-gray-900">
                            {{ __('eskutik.login_label_mail') }}
                        </label>
                        <div class="mt-2">
                            <input id="emailUsuario" type="email" name="email" required autocomplete="email" class="block w-full rounded-md bg-white border-2 border-teal-400 px-3 py-1.5">
                        </div>
                    </div>
                    <div>
                        <label for="passwordUsuario" class="block text-sm font-medium text-gray-900">
                            {{ __('eskutik.login_label_password') }}
                        </label>
                        <div class="mt-2">
                            <input id="passwordUsuario" type="password" name="password" required autocomplete="current-password" class="block w-full rounded-md bg-white border-2 border-teal-400 px-3 py-1.5">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="w-full rounded-md bg-pink-500 px-3 py-1.5 text-sm font-semibold text-white hover:bg-pink-200">
                            {{ __('eskutik.login_button') }}
                        </button>
                    </div>
                </form>
            </div>

            <!-- Formulario para Centro -->
            <div id="centroForm" class="mt-10 hidden">
                <form method="POST" action="{{ route('validar.centro') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="codigoCentro" class="block text-sm font-medium text-gray-900">
                            {{ __('eskutik.login_center_label_center') }}
                        </label>
                        <div class="mt-2">
                            <select id="codigoCentro" name="codigoCentro" required class="block w-full rounded-md bg-white border-2 border-teal-400 px-3 py-1.5">
                                <option value="" disabled selected>{{ __('eskutik.login_center_option_select') }}</option>
                                @foreach ($centros as $centro)
                                    <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="codigo" class="block text-sm font-medium text-gray-900">
                            {{ __('eskutik.login_center_label_code') }}
                        </label>
                        <div class="mt-2">
                            <input id="codigo" type="password" name="codigo" required class="block w-full rounded-md bg-white border-2 border-teal-400 px-3 py-1.5">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="w-full rounded-md bg-pink-500 px-3 py-1.5 text-sm font-semibold text-white hover:bg-pink-200">
                            {{ __('eskutik.login_button') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Íconos SVG para la alerta de error --}}
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
