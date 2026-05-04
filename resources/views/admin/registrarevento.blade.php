@extends('admin/admin')
@section('titulo', 'Registrar Evento')

@section('content')
<!-- Tailwind (si no está en el layout admin) -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    /* Suavizado para inputs tipo fecha y archivo */
    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(0.8) sepia(100%) saturate(500%) hue-rotate(10deg);
        cursor: pointer;
    }
    /* Estilo para el scrollbar del textarea */
    textarea::-webkit-scrollbar {
        width: 8px;
    }
    textarea::-webkit-scrollbar-track {
        background: rgba(20, 83, 45, 0.5);
        border-radius: 10px;
    }
    textarea::-webkit-scrollbar-thumb {
        background: #facc15;
        border-radius: 10px;
    }
</style>

<div class="min-h-screen bg-green-950 py-12 px-4 sm:px-6 lg:px-8 flex justify-center items-center">
    
    <!-- Botón Volver -->
    <div class="absolute top-6 left-6 z-20">
        <button onclick="window.history.back()" class="group flex items-center gap-2 px-4 py-2 text-sm font-bold text-amber-50 bg-green-900/50 border border-green-800 rounded-full shadow-md hover:bg-yellow-400 hover:text-green-950 transition-all duration-300">
            <i class="fa-solid fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
            <span>VOLVER</span>
        </button>
    </div>

    <!-- Tarjeta Principal -->
    <div class="w-full max-w-2xl bg-green-900/40 backdrop-blur-md p-8 rounded-3xl shadow-2xl border border-green-800/50 animate__animated animate__fadeIn">
        
        <!-- Cabecera -->
        <div class="text-center mb-8">
            <div class="bg-yellow-400 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-yellow-400/20">
                <i class="fa-solid fa-calendar-plus text-green-950 text-3xl"></i>
            </div>
            <h2 class="text-3xl font-extrabold text-yellow-400 tracking-tight">Nuevo Evento</h2>
            <p class="text-green-200 mt-2">Completa los datos para publicar en el calendario.</p>
        </div>

        <!-- Formulario -->
        <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Nombre del Evento -->
            <div class="group">
                <label for="name" class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Nombre del Evento</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-solid fa-file-signature text-green-600 group-focus-within:text-yellow-400 transition-colors"></i>
                    </div>
                    <input id="name" type="text" name="name" required placeholder="Ej. Fiestas de San Bernabé"
                        class="block w-full pl-11 pr-4 py-3 rounded-xl bg-green-950/50 border border-green-800 text-amber-50 placeholder-green-700 focus:bg-green-950 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/30 transition-all duration-300 outline-none">
                </div>
            </div>

            <!-- Descripción del Evento (NUEVO CAMPO) -->
            <div class="group">
                <label for="description" class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Descripción / Programa</label>
                <div class="relative">
                    <div class="absolute top-3 left-4 pointer-events-none">
                        <i class="fa-solid fa-align-left text-green-600 group-focus-within:text-yellow-400 transition-colors"></i>
                    </div>
                    <textarea id="description" name="description" rows="4" placeholder="Describe los actos principales, horarios o detalles relevantes..."
                        class="block w-full pl-11 pr-4 py-3 rounded-xl bg-green-950/50 border border-green-800 text-amber-50 placeholder-green-700 focus:bg-green-950 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/30 transition-all duration-300 outline-none resize-none"></textarea>
                </div>
            </div>

            <!-- Fechas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Fecha Inicio</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-calendar-day text-green-600"></i>
                        </div>
                        <input type="date" name="dateIni" required
                            class="block w-full pl-11 pr-4 py-3 rounded-xl bg-green-950/50 border border-green-800 text-amber-50 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/30 transition-all duration-300 outline-none">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Fecha Fin</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-calendar-check text-green-600"></i>
                        </div>
                        <input type="date" name="dateFin" required
                            class="block w-full pl-11 pr-4 py-3 rounded-xl bg-green-950/50 border border-green-800 text-amber-50 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/30 transition-all duration-300 outline-none">
                    </div>
                </div>
            </div>

            <!-- Pueblo y Cartel -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Pueblo / Ubicación</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-map-location-dot text-green-600"></i>
                        </div>
                        <select name="pueblo_id" required
                            class="block w-full pl-11 pr-4 py-3 rounded-xl bg-green-950/50 border border-green-800 text-amber-50 focus:bg-green-950 focus:border-yellow-400 transition-all duration-300 outline-none appearance-none">
                            <option value="" class="bg-green-950">Selecciona un pueblo</option>
                            @foreach($pueblos as $pueblo)
                                <option value="{{ $pueblo->id }}" class="bg-green-950">{{ $pueblo->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Imagen del Cartel</label>
                    <div class="relative">
                        <input type="file" name="cartel" accept="image/*,application/pdf"
                            class="block w-full text-sm text-green-200 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-green-800 file:text-amber-50 hover:file:bg-green-700 transition-all cursor-pointer">
                    </div>
                </div>
            </div>

            <!-- Botón de Guardado -->
            <div class="pt-6">
                <button type="submit" class="group flex w-full justify-center items-center gap-3 rounded-xl bg-yellow-400 px-4 py-4 text-lg font-bold text-green-950 shadow-lg shadow-yellow-400/20 hover:bg-yellow-300 hover:-translate-y-1 transition-all duration-300">
                    <i class="fa-solid fa-floppy-disk group-hover:scale-110 transition-transform"></i>
                    <span>GUARDAR EVENTO</span>
                </button>
            </div>

        </form>
    </div>
</div>
@endsection