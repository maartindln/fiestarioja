@extends('admin/admin')
@section('titulo', 'Registrar Pueblo')
@section('content')

<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-green-950 py-12 px-4 flex justify-center items-center">
    
    <!-- Botón Volver -->
    <div class="absolute top-6 left-6">
        <button onclick="window.history.back()" class="group flex items-center gap-2 px-4 py-2 text-sm font-bold text-amber-50 bg-green-900/50 border border-green-800 rounded-full hover:bg-yellow-400 hover:text-green-950 transition-all duration-300">
            <i class="fa-solid fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
            <span>VOLVER</span>
        </button>
    </div>

    <!-- Tarjeta del Formulario -->
    <div class="w-full max-w-2xl bg-green-900/40 backdrop-blur-md p-8 rounded-3xl shadow-2xl border border-green-800/50">
        
        <div class="text-center mb-10">
            <div class="bg-yellow-400 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-yellow-400/20">
                <i class="fa-solid fa-city text-green-950 text-3xl"></i>
            </div>
            <h2 class="text-3xl font-extrabold text-yellow-400">Nuevo Pueblo</h2>
            <p class="text-green-200 mt-2">Registra una nueva ubicación en el sistema.</p>
        </div>

        <form method="POST" action="{{ route('pueblos.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Nombre -->
            <div>
                <label class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Nombre del Pueblo</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fa-solid fa-signature text-green-600"></i>
                    </div>
                    <input type="text" name="name" required placeholder="Ej. Logroño"
                        class="block w-full pl-11 pr-4 py-3 rounded-xl bg-green-950/50 border border-green-800 text-amber-50 placeholder-green-700 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/30 transition-all outline-none">
                </div>
            </div>

            <!-- Coordenadas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Latitud</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-location-crosshairs text-green-600"></i>
                        </div>
                        <input type="text" name="latitude" required placeholder="42.46"
                            class="block w-full pl-11 pr-4 py-3 rounded-xl bg-green-950/50 border border-green-800 text-amber-50 outline-none focus:border-yellow-400 transition-all">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Longitud</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-location-dot text-green-600"></i>
                        </div>
                        <input type="text" name="longitude" required placeholder="-2.44"
                            class="block w-full pl-11 pr-4 py-3 rounded-xl bg-green-950/50 border border-green-800 text-amber-50 outline-none focus:border-yellow-400 transition-all">
                    </div>
                </div>
            </div>

            <!-- Imagen -->
            <div>
                <label class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Imagen Principal</label>
                <input type="file" name="image" accept="image/*"
                    class="block w-full text-sm text-green-200 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-green-800 file:text-amber-50 hover:file:bg-green-700 cursor-pointer transition-all">
            </div>

            <!-- Cómo llegar -->
            <div>
                <label class="block text-sm font-semibold text-yellow-400/90 ml-1 mb-1">Cómo llegar (Descripción)</label>
                <textarea name="como_llegar" rows="3" placeholder="Instrucciones o ruta..."
                    class="block w-full p-4 rounded-xl bg-green-950/50 border border-green-800 text-amber-50 outline-none focus:border-yellow-400 transition-all"></textarea>
            </div>

            <button type="submit" class="group flex w-full justify-center items-center gap-3 rounded-xl bg-yellow-400 px-4 py-4 text-lg font-bold text-green-950 shadow-lg hover:bg-yellow-300 hover:-translate-y-1 transition-all duration-300">
                <i class="fa-solid fa-cloud-arrow-up group-hover:scale-110 transition-transform"></i>
                <span>REGISTRAR PUEBLO</span>
            </button>
        </form>
    </div>
</div>
@endsection