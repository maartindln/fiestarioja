<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="images/png/logo.png" type="image/png">
    <title>Regístrate</title>
</head>
<body class="bg-green-950 flex flex-col justify-center min-h-screen py-10">
    @if (session('success'))
    <div class="alert flex fixed inset-x-0 top-0 mx-auto mt-4 w-fit max-w-md z-50 w-96 shadow-lg rounded-lg animate__animated animate__fadeInDown">
        <div class="bg-green-600 py-4 px-6 rounded-l-lg flex items-center">
            <i class="fa-solid fa-circle-check text-white text-2xl"></i>
        </div>
        <div class="px-4 py-6 bg-white rounded-r-lg flex justify-between items-center w-full border border-l-transparent border-gray-200">
        <div>{{ session('success') }}</div>
            <button onclick="closeAlert(this)">
                <i class="fa-solid fa-xmark mr-4 ml-4"></i>
            </button>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="alert flex fixed inset-x-0 top-0 mx-auto mt-4 w-fit max-w-md z-50 w-96 shadow-lg rounded-lg animate__animated animate__fadeInDown">
        <div class="bg-red-600 py-4 px-6 rounded-l-lg flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-white fill-current" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path></svg>
        </div>
        <div class="px-4 py-6 bg-white rounded-r-lg flex justify-between items-center w-full border border-l-transparent border-gray-200">
        <div>{{ session('error') }}</div>
            <button onclick="closeAlert(this)">
                <i class="fa-solid fa-xmark mr-4 ml-4"></i>
            </button>
        </div>
    </div>
@endif
    <div class="absolute top-6 left-6">
        <button onclick="window.history.back()" class="px-4 py-2 text-sm font-semibold text-green-950 bg-yellow-400 border-2 border-yellow-400 rounded-md shadow-md hover:bg-yellow-500 focus:outline-none">
            VOLVER
        </button>
    </div>
    <div class="flex justify-center items-center px-6 lg:px-8">
        <div class="sm:w-full sm:max-w-sm mx-auto w-full px-5">
            <img class="mx-auto h-64 w-auto" src="images/png/logo.png" alt="Logo">
            <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-yellow-400">Registra un usuario</h2>
            <div class="mt-10">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-yellow-400">Nombre</label>
                        <div class="mt-2">
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                class="block w-full rounded-md bg-white border-2 border-yellow-400 px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-yellow-400">Correo electrónico</label>
                        <div class="mt-2">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                                class="block w-full rounded-md bg-amber-50 border-2 border-yellow-400 px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-yellow-400">Contraseña</label>
                        <div class="mt-2">
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                class="block w-full rounded-md bg-amber-50 border-2 border-yellow-400 px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400">
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="password-confirm" class="block text-sm font-medium text-yellow-400">Confirmar contraseña</label>
                        <div class="mt-2">
                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                                class="block w-full rounded-md bg-amber-50 border-2 border-yellow-400 px-3 py-1.5 text-base text-yellow-400 placeholder:text-gray-400">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-yellow-400 px-3 py-1.5 text-sm font-semibold text-green-950 shadow-xs hover:bg-yellow-500 focus-visible:outline-2 focus-visible:outline-indigo-600">
                            REGISTRAR
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
