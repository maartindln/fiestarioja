@extends('layout')

@section('titulo', 'Contacto - FiestaRioja')

@section('content')
<div class="w-full min-h-screen bg-green-950 py-12 px-4 sm:px-6 lg:px-8 font-sans text-gray-100 flex justify-center items-start">

    <div class="w-full max-w-5xl bg-green-900/40 backdrop-blur-md p-6 sm:p-12 rounded-3xl shadow-2xl border border-green-800/50 mt-4 animate__animated animate__fadeIn">

        {{-- Encabezado --}}
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-yellow-400 drop-shadow-md mb-2">Contacta con Nosotros</h2>
            <p class="text-green-400 text-xs tracking-widest uppercase">¿Tienes alguna duda o quieres anunciar tu evento?</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            {{-- Columna 1: Información de contacto --}}
            <div class="space-y-8">
                <div>
                    <h3 class="text-xl font-bold text-yellow-400 mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-circle-info text-green-500 text-sm"></i> Información de interés
                    </h3>
                    <p class="text-gray-300 leading-relaxed mb-6">
                        Estamos aquí para ayudarte. Si eres un organizador y quieres que tu fiesta aparezca en <strong>FiestaRioja</strong>, o si simplemente tienes una sugerencia, no dudes en escribirnos.
                    </p>
                </div>

                <div class="space-y-4">
                    <div class="flex items-start gap-4 p-4 bg-green-950/40 rounded-2xl border border-green-800/30">
                        <i class="fa-solid fa-envelope text-yellow-400 mt-1"></i>
                        <div>
                            <p class="text-xs font-bold text-green-400 uppercase tracking-tighter">Email Directo</p>
                            <p class="text-gray-200">riojafiesta@gmail.com</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 bg-green-950/40 rounded-2xl border border-green-800/30">
                        <i class="fa-brands fa-instagram text-yellow-400 mt-1"></i>
                        <div>
                            <p class="text-xs font-bold text-green-400 uppercase tracking-tighter">Instagram</p>
                            <p class="text-gray-200">@fiestarioja</p>
                        </div>
                    </div>
                </div>

                {{-- Redes Sociales --}}
                <div class="pt-6 border-t border-green-800/50">
                    <p class="text-xs font-bold text-green-300 mb-4 uppercase tracking-widest">Nuestras Redes</p>
                    <div class="flex gap-4">
                        <a href="https://www.instagram.com/fiestarioja/" class="w-10 h-10 rounded-full bg-green-800/50 flex items-center justify-center hover:bg-yellow-400 hover:text-green-950 transition-all duration-300">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-green-800/50 flex items-center justify-center hover:bg-yellow-400 hover:text-green-950 transition-all duration-300">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Columna 2: Formulario --}}
            <div class="bg-green-950/20 p-6 sm:p-8 rounded-3xl border border-green-700/30">
                <form action="#" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-green-400 uppercase mb-2 ml-1">Nombre Completo</label>
                        <input type="text" name="nombre" required 
                            class="w-full bg-green-900/50 border border-green-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400/50 focus:border-yellow-400 transition-all"
                            placeholder="Ej. Juan Pérez">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-green-400 uppercase mb-2 ml-1">Correo Electrónico</label>
                        <input type="email" name="email" required 
                            class="w-full bg-green-900/50 border border-green-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400/50 focus:border-yellow-400 transition-all"
                            placeholder="tu@email.com">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-green-400 uppercase mb-2 ml-1">Asunto</label>
                        <select name="asunto" 
                            class="w-full bg-green-900/50 border border-green-700/50 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400/50 transition-all">
                            <option value="info">Información General</option>
                            <option value="evento">Anunciar un Evento</option>
                            <option value="error">Reportar un Error</option>
                            <option value="otro">Otro Motivo</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-green-400 uppercase mb-2 ml-1">Mensaje</label>
                        <textarea name="mensaje" rows="4" required 
                            class="w-full bg-green-900/50 border border-green-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400/50 focus:border-yellow-400 transition-all"
                            placeholder="Escribe aquí tu consulta..."></textarea>
                    </div>

                    <button type="submit" 
                        class="w-full bg-yellow-400 hover:bg-yellow-300 text-green-950 font-bold py-4 rounded-xl shadow-lg shadow-yellow-400/10 transition-all duration-300 flex justify-center items-center gap-2 uppercase tracking-widest text-sm">
                        <i class="fa-solid fa-paper-plane"></i> Enviar Mensaje
                    </button>
                </form>
            </div>

        </div>

        {{-- Botón Volver --}}
        <div class="mt-16 flex justify-center border-t border-green-800/30 pt-10">
            <a href="{{ url('/') }}" class="group flex justify-center items-center gap-2 w-full sm:w-1/2 rounded-xl bg-green-800/40 px-4 py-3 text-sm font-bold text-yellow-400 border border-yellow-400/20 hover:bg-yellow-400 hover:text-green-950 transition-all duration-300">
                <i class="fa-solid fa-chevron-left group-hover:-translate-x-1 transition-transform"></i>
                Volver a FiestaRioja
            </a>
        </div>
    </div>
</div>

<style>
    /* Estilos coherentes con la página legal */
    strong { color: #facc15; font-weight: 600; }
    input, textarea, select { font-size: 0.95rem; }
    /* Mejorar el aspecto del select */
    select option { background-color: #064e3b; color: white; }
</style>
@endsection