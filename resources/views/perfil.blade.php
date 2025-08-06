@extends('layout')
@section('titulo', 'Perfil')
@section('content')
    <div class="bg-white flex flex-col items-center justify-center min-h-screen p-4 bg-inherit">
        <!-- Icono de perfil -->
        <div class="flex justify-center mt-28 mb-5">
            @if (Auth::user()->avatar)
                <img id="profilePic" src="{{ asset('storage/' . Auth::user()->avatar) }}"
                    alt="Avatar de {{ Auth::user()->name }}"
                    class="img-fluid w-60 h-60 rounded-full cursor-pointer transition duration-300 ease-in-out hover:scale-110 hover:shadow-2xl">
            @else
                <img id="profilePic" src="{{ asset('images/default-profile.jpg') }}" alt="Avatar por defecto"
                    class="img-fluid w-36 h-36 rounded-full cursor-pointer">
            @endif
        </div>

        <!-- Modal para subir imagen -->
        <div id="uploadModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
            <div class="bg-white rounded-lg p-6 w-96">
                <h3 class="text-xl font-semibold mb-4">{{ __('emotions.subirIP') }}</h3>
                <form id="uploadForm" enctype="multipart/form-data" action="{{ route('perfil.update-avatar') }}"
                    method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="fileInput"
                            class="block text-sm font-medium text-gray-700"></label>{{ __('emotions.seleccionaUna') }}</label>
                        <input type="file" id="fileInput" name="image" accept="image/*"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500">
                    </div>
                    <div class="flex justify-between items-center">
                        <button type="button" id="cancelBtn"
                            class="px-4 py-2 bg-gray-300 text-black rounded-md hover:bg-gray-400">
                            {{ __('emotions.cancelar') }}
                        </button>
                        <button type="submit" id="submitBtn"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            {{ __('emotions.subirI') }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
        <div class="rounded-3xl bg-center p-5 w-full md:w-1/3"
            style="background-image: url('{{ asset('img/curved-lines-generated-elaborate-gray.svg') }}');">
            <div class="flex border border-5 bg-white">
                <button type="button" id="editar"
                    class="px-4 py-2 w-1/2 text-black font-semibold hover:bg-gray-300">{{ __('emotions.editarU') }}</button>
                <button type="button" id="personalizar"
                    class="px-4 py-2 w-1/2 text-black font-semibold hover:bg-gray-300">{{ __('emotions.personalizarE') }}</button>
                <div id="indicator" class="absolute w-1/2 h-10 bg-gray-500 opacity-30 transition-all duration-300"></div>
            </div>
            <div id="usuario" class="w-full animate__animated animate__fadeIn">
                <form action="{{ route('edit') }}" method="POST" class="w-full flex flex-col items-center">
                    @csrf
                    <!-- Campo de Usuario -->
                    <p class="font-bold text-2xl text-black m-5">{{ __('emotions.datosUsu') }}</p>
                    <div class="w-full max-w-md mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ __('emotions.usuario') }}</label>
                        <div class="relative mt-1">
                            <input id="inputUsu" name="usuario" type="text" placeholder="{{ auth()->user()->name }}"
                                class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 bg-gray-200 cursor-not-allowed"
                                disabled>
                            <button type="button" id="xUsuario"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Campo de Correo -->
                    <div class="w-full max-w-md mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ __('emotions.correo') }}</label>
                        <div class="relative mt-1">
                            <input id="inputCorreo" type="email" name="correo" placeholder="{{ auth()->user()->email }}"
                                class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 bg-gray-200 cursor-not-allowed"
                                disabled>
                            <button type="button" id="xCorreo"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Campo de Contraseña -->
                    <div class="w-full max-w-md mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ __('emotions.contrasena') }}</label>
                        <div class="relative mt-1">
                            <input id="inputContraseña" name="contrasena" type="password" placeholder="**********"
                                class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 bg-gray-200 cursor-not-allowed"
                                disabled>
                            <span class="absolute inset-y-0 right-2 flex items-center cursor-pointer text-gray-400">
                                <i id="ojo" class="fa-solid fa-eye"></i>
                                <i id="ojoOculto" class="fa-solid fa-eye-slash hidden"></i>
                            </span>
                        </div>
                    </div>

                    <div class="w-full max-w-md mb-4">
                        <label
                            class="block text-sm font-medium text-gray-700">{{ __('emotions.confirmarContrasena1') }}</label>
                        <div class="relative mt-1">
                            <input id="confirmarContrasena" name="contrasena_confirmation" type="password"
                                placeholder="**********"
                                class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 bg-gray-200 cursor-not-allowed"
                                disabled>
                            <span class="absolute inset-y-0 right-2 flex items-center cursor-pointer text-gray-400">
                                <i id="ojoConfirmar" class="fa-solid fa-eye"></i>
                                <i id="ojoOcultoConfirmar" class="fa-solid fa-eye-slash hidden"></i>
                            </span>
                        </div>
                    </div>


                    <button
                        class="editar flex my-4 px-4 py-2 bg-white text-black border border-black font-semibold rounded-md hover:bg-gray-300"
                        data-state="editar">
                        <span id="boton-text">{{ __('emotions.editar') }}</span>
                        <svg id="edit-icon" class="h-6 w-6 text-slate-900" viewBox="0 0 24 24" stroke="currentColor"
                            fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                            <line x1="16" y1="5" x2="19" y2="8" />
                        </svg>

                        <svg id="close-icon" class="h-6 w-6 text-slate-900" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div id="gu" class="flex justify-center hidden">
                        <button
                            class="mt-4 px-4 py-2 bg-black text-white border border-black font-semibold rounded-md hover:bg-gray-300">
                            {{ __('emotions.guardarCambios') }}
                        </button>
                    </div>
            </div>
            </form>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const editarButton = document.querySelector('.editar');
        const inputs = document.querySelectorAll('input[disabled]');
        const editIcon = document.getElementById('edit-icon');
        const closeIcon = document.getElementById('close-icon');
        const botonText = document.getElementById('boton-text');

        editarButton.addEventListener('click', function(event) {
            event.preventDefault();

            const currentState = editarButton.getAttribute('data-state') || 'editar';
            const newState = currentState === 'editar' ? 'dejarDeEditar' : 'editar';

            if (newState === 'dejarDeEditar') {
                inputs.forEach(input => {
                    input.disabled = false;
                    input.classList.remove('bg-gray-200', 'cursor-not-allowed');
                });
                editIcon.style.display = "none";
                closeIcon.style.display = "block";
                document.getElementById('gu').classList.remove('hidden');
            } else {
                inputs.forEach(input => {
                    input.disabled = true;
                    input.classList.add('bg-gray-200', 'cursor-not-allowed');
                });
                editIcon.style.display = "block";
                closeIcon.style.display = "none";
                document.getElementById('gu').classList.add('hidden');
            }

            botonText.textContent = newState === 'editar' ? 'Editar' : 'Cancelar edición';
            editarButton.setAttribute('data-state', newState);
        });
        });
</script>
<script src="{{ asset('js/perfil.js') }}"></script>
<script>
    const editarBtn = document.getElementById('editar');
    const personalizarBtn = document.getElementById('personalizar');
    const indicator = document.getElementById('indicator');

    function moveIndicatorToButton(button) {

        const rect = button.getBoundingClientRect();

        indicator.style.left = `${rect.left}px`;
        indicator.style.width = `${rect.width}px`;
    }

    editarBtn.addEventListener('click', () => moveIndicatorToButton(editarBtn));
    personalizarBtn.addEventListener('click', () => moveIndicatorToButton(personalizarBtn));

    moveIndicatorToButton(editarBtn);
</script>
@endsection
