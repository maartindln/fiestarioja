<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="images/png/logo.png" type="image/png">
    <title>Regístrate</title>
</head>
<body class="bg-gray-50 flex flex-col justify-center min-h-screen py-10">
    <div class="absolute top-6 left-6">
        <button onclick="window.history.back()" class="px-4 py-2 text-sm font-semibold text-pink-500 bg-white border-2 border-pink-500 rounded-md shadow-md hover:bg-pink-200 focus:outline-none">
            Atrás
        </button>
    </div>
    <div class="flex justify-center items-center px-6 lg:px-8">
        <div class="sm:w-full sm:max-w-sm mx-auto">
            <img class="mx-auto h-64 w-auto" src="images/png/logo.png" alt="Logo">
            <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Registra un usuario</h2>
            <div class="mt-10">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-900">Nombre</label>
                        <div class="mt-2">
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                class="block w-full rounded-md bg-white border-2 border-teal-400 px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900">Correo electrónico</label>
                        <div class="mt-2">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                                class="block w-full rounded-md bg-white border-2 border-teal-400 px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-900">Contraseña</label>
                        <div class="mt-2">
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                class="block w-full rounded-md bg-white border-2 border-teal-400 px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400">
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="password-confirm" class="block text-sm font-medium text-gray-900">Confirmar contraseña</label>
                        <div class="mt-2">
                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                                class="block w-full rounded-md bg-white border-2 border-teal-400 px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-pink-500 px-3 py-1.5 text-sm font-semibold text-white shadow-xs hover:bg-pink-200 focus-visible:outline-2 focus-visible:outline-indigo-600">
                            Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
