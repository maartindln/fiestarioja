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
    <div class="absolute top-6 left-6">
        <button onclick="window.history.back()" class="px-4 py-2 text-sm font-semibold text-green-950 bg-yellow-400 border-2 border-yellow-400 rounded-md shadow-md hover:bg-yellow-500 focus:outline-none">
            VOLVER
        </button>
    </div>
    <div class="flex justify-center items-center px-6 lg:px-8">
        <div class="sm:w-full sm:max-w-sm mx-auto">
            <img class="mx-auto h-64 w-auto" src="images/png/logo.png" alt="Logo">
            <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-yellow-400">Registra un usuario</h2>
            <div class="mt-10">
                <form method="POST" action="<?php echo e(route('register')); ?>" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label for="name" class="block text-sm font-medium text-yellow-400">Nombre</label>
                        <div class="mt-2">
                            <input id="name" type="text" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus
                                class="block w-full rounded-md bg-white border-2 border-yellow-400 px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-yellow-400">Correo electrónico</label>
                        <div class="mt-2">
                            <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email"
                                class="block w-full rounded-md bg-amber-50 border-2 border-yellow-400 px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-yellow-400">Contraseña</label>
                        <div class="mt-2">
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                class="block w-full rounded-md bg-amber-50 border-2 border-yellow-400 px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php /**PATH C:\UniServerZ\www\FIESTARIOJA\fiestarioja\resources\views/auth/register.blade.php ENDPATH**/ ?>